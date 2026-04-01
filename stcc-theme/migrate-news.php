<?php
/**
 * News Migration Script
 *
 * Imports articles from data/news.json into the stcc_news custom post type.
 * Run via WP-CLI: wp eval-file wp-content/themes/stcc-theme/migrate-news.php
 * Or visit: yoursite.com/wp-content/themes/stcc-theme/migrate-news.php?run=1 (while logged in as admin)
 *
 * Safe to run multiple times - skips articles that already exist (matched by slug).
 *
 * @package STCC
 */

// If running via browser, load WordPress
if (!defined('ABSPATH')) {
    // Walk up to find wp-load.php
    $wp_load = dirname(__FILE__);
    for ($i = 0; $i < 5; $i++) {
        $wp_load = dirname($wp_load);
        if (file_exists($wp_load . '/wp-load.php')) {
            require_once $wp_load . '/wp-load.php';
            break;
        }
    }

    if (!defined('ABSPATH')) {
        die('Could not find WordPress. Run this via WP-CLI instead: wp eval-file wp-content/themes/stcc-theme/migrate-news.php');
    }

    // Security check for browser access
    if (!current_user_can('manage_options')) {
        die('You must be logged in as an administrator.');
    }

    if (!isset($_GET['run']) || $_GET['run'] !== '1') {
        die('Add ?run=1 to the URL to execute the migration. This will import news articles from data/news.json.');
    }
}

// Find the news.json file
$json_paths = [
    get_template_directory() . '/../../../data/news.json',  // Theme is in wp-content/themes/
    ABSPATH . 'data/news.json',
    dirname(ABSPATH) . '/data/news.json',
    get_template_directory() . '/data/news.json',            // If copied into theme
];

$json_file = null;
foreach ($json_paths as $path) {
    $real = realpath($path);
    if ($real && file_exists($real)) {
        $json_file = $real;
        break;
    }
}

if (!$json_file) {
    stcc_migrate_log("ERROR: Could not find data/news.json. Copy it to the theme directory or adjust the path.");
    stcc_migrate_log("Searched paths:");
    foreach ($json_paths as $p) {
        stcc_migrate_log("  - $p");
    }
    exit(1);
}

stcc_migrate_log("Found news data at: $json_file");

$json_data = file_get_contents($json_file);
$articles = json_decode($json_data, true);

if (!$articles || !is_array($articles)) {
    stcc_migrate_log("ERROR: Could not parse news.json");
    exit(1);
}

stcc_migrate_log("Found " . count($articles) . " articles to import.\n");

$imported = 0;
$skipped = 0;
$errors = 0;

foreach ($articles as $article) {
    $slug = sanitize_title($article['slug']);

    // Check if already exists
    $existing = get_posts([
        'post_type'   => 'stcc_news',
        'name'        => $slug,
        'numberposts' => 1,
    ]);

    if (!empty($existing)) {
        stcc_migrate_log("SKIP: \"{$article['title']}\" (already exists)");
        $skipped++;
        continue;
    }

    // Parse the date
    $post_date = date('Y-m-d H:i:s', strtotime($article['date']));

    // Fix relative image paths in body content
    $body = $article['body'];
    // Convert ../images/ paths to use the uploads directory or keep as theme paths
    $body = str_replace('src="../images/', 'src="' . get_template_directory_uri() . '/images/', $body);
    $body = str_replace("src='../images/", "src='" . get_template_directory_uri() . "/images/", $body);

    // Create the post
    $post_id = wp_insert_post([
        'post_type'    => 'stcc_news',
        'post_title'   => $article['title'],
        'post_name'    => $slug,
        'post_content' => $body,
        'post_excerpt' => $article['summary'],
        'post_status'  => 'publish',
        'post_date'    => $post_date,
    ]);

    if (is_wp_error($post_id)) {
        stcc_migrate_log("ERROR: Failed to import \"{$article['title']}\": " . $post_id->get_error_message());
        $errors++;
        continue;
    }

    // Set category taxonomy
    if (!empty($article['category'])) {
        wp_set_object_terms($post_id, $article['category'], 'news_category');
    }

    // Set featured image from local file
    if (!empty($article['image'])) {
        $image_path = get_template_directory() . '/' . $article['image'];
        if (!file_exists($image_path)) {
            // Try from the old site root
            $image_path = realpath(get_template_directory() . '/../../../' . $article['image']);
        }

        if ($image_path && file_exists($image_path)) {
            $attachment_id = stcc_import_image($image_path, $post_id, $article['title']);
            if ($attachment_id) {
                set_post_thumbnail($post_id, $attachment_id);
            }
        } else {
            stcc_migrate_log("  WARNING: Featured image not found: {$article['image']}");
        }
    }

    stcc_migrate_log("OK: \"{$article['title']}\" (ID: $post_id)");
    $imported++;
}

stcc_migrate_log("\n--- Migration Complete ---");
stcc_migrate_log("Imported: $imported");
stcc_migrate_log("Skipped:  $skipped");
stcc_migrate_log("Errors:   $errors");

// Flush rewrite rules after import
flush_rewrite_rules();
stcc_migrate_log("Rewrite rules flushed.");

// ─── Helper Functions ───────────────────────────────────────────────────────

function stcc_import_image($file_path, $parent_post_id, $title) {
    if (!file_exists($file_path)) {
        return false;
    }

    $filename = basename($file_path);

    // Check if this image was already imported
    $existing = get_posts([
        'post_type'   => 'attachment',
        'meta_key'    => '_stcc_source_path',
        'meta_value'  => $file_path,
        'numberposts' => 1,
    ]);

    if (!empty($existing)) {
        return $existing[0]->ID;
    }

    $upload_dir = wp_upload_dir();
    $dest_path = $upload_dir['path'] . '/' . $filename;

    // Avoid overwriting
    if (file_exists($dest_path)) {
        $filename = wp_unique_filename($upload_dir['path'], $filename);
        $dest_path = $upload_dir['path'] . '/' . $filename;
    }

    copy($file_path, $dest_path);

    $filetype = wp_check_filetype($filename);
    $attachment = [
        'guid'           => $upload_dir['url'] . '/' . $filename,
        'post_mime_type' => $filetype['type'],
        'post_title'     => sanitize_file_name(pathinfo($filename, PATHINFO_FILENAME)),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ];

    $attachment_id = wp_insert_attachment($attachment, $dest_path, $parent_post_id);

    if (is_wp_error($attachment_id)) {
        return false;
    }

    require_once ABSPATH . 'wp-admin/includes/image.php';
    $metadata = wp_generate_attachment_metadata($attachment_id, $dest_path);
    wp_update_attachment_metadata($attachment_id, $metadata);
    update_post_meta($attachment_id, '_stcc_source_path', $file_path);

    return $attachment_id;
}

function stcc_migrate_log($message) {
    if (defined('WP_CLI') && WP_CLI) {
        WP_CLI::log($message);
    } else {
        echo $message . "<br>\n";
    }
}
