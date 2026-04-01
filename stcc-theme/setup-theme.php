<?php
/**
 * STCC Theme Setup Script
 *
 * Creates the navigation menus, default pages, and team members.
 * Run via WP-CLI: wp eval-file wp-content/themes/stcc-theme/setup-theme.php
 * Or visit: yoursite.com/wp-content/themes/stcc-theme/setup-theme.php?run=1 (logged in as admin)
 *
 * Safe to run multiple times — skips items that already exist.
 *
 * @package STCC
 */

if (!defined('ABSPATH')) {
    $wp_load = dirname(__FILE__);
    for ($i = 0; $i < 5; $i++) {
        $wp_load = dirname($wp_load);
        if (file_exists($wp_load . '/wp-load.php')) {
            require_once $wp_load . '/wp-load.php';
            break;
        }
    }
    if (!defined('ABSPATH')) {
        die('Could not find WordPress. Run via WP-CLI instead.');
    }
    if (!current_user_can('manage_options')) {
        die('Admin access required.');
    }
    if (!isset($_GET['run']) || $_GET['run'] !== '1') {
        die('Add ?run=1 to execute. This will create menus, pages, and team members.');
    }
}

stcc_log("=== STCC Theme Setup ===\n");

// ─── 1. Create Pages ────────────────────────────────────────────────────────

stcc_log("--- Creating Pages ---");

$pages = [
    // [slug, title, template (empty = default), content]
    ['home',                  'Home',                  '',                                      ''],
    ['our-team',              'Our Team',              'page-templates/template-our-team.php',   ''],
    ['volunteer',             'Volunteer',             'page-templates/template-volunteer.php',  ''],
    ['internships',           'Internships',           'page-templates/template-internships.php',''],
    ['donate',                'Donate',                'page-templates/template-donate.php',     ''],
    ['our-mission',           'Our Mission',           '', ''],
    ['our-allies',            'Our Allies',            '', ''],
    ['committees',            'Committees',            '', ''],
    ['financial-disclosure',  'Financial Disclosure',  '', ''],
    ['rescue-rehabilitation', 'Rescue & Rehabilitation','', ''],
    ['education',             'Education',             '', ''],
    ['research',              'Research',              '', ''],
    ['events',                'Events',                '', ''],
    ['patrol-klein-curacao',  'Patrol Klein Curaçao',  '', ''],
    ['vacancies',             'Vacancies',             '', ''],
    ['fibropapillomatosis',   'Fibropapillomatosis',   '', ''],
    ['volunteer-portal',      'Volunteer Portal',      '', ''], // Will be password-protected
];

$page_ids = [];
foreach ($pages as $page_data) {
    list($slug, $title, $template, $content) = $page_data;
    $existing = get_page_by_path($slug);
    if ($existing) {
        $page_ids[$slug] = $existing->ID;
        stcc_log("  SKIP: \"$title\" (exists, ID: {$existing->ID})");
        continue;
    }

    $args = [
        'post_type'   => 'page',
        'post_title'  => $title,
        'post_name'   => $slug,
        'post_status' => 'publish',
        'post_content' => $content,
    ];

    $page_id = wp_insert_post($args);
    if (is_wp_error($page_id)) {
        stcc_log("  ERROR: \"$title\" - " . $page_id->get_error_message());
        continue;
    }

    if ($template) {
        update_post_meta($page_id, '_wp_page_template', $template);
    }

    // Password-protect the volunteer portal
    if ($slug === 'volunteer-portal') {
        wp_update_post([
            'ID'            => $page_id,
            'post_password' => 'stcc2025',
        ]);
        stcc_log("  OK: \"$title\" (ID: $page_id) — password protected with 'stcc2025'");
    } else {
        stcc_log("  OK: \"$title\" (ID: $page_id)");
    }

    $page_ids[$slug] = $page_id;
}

// Set the homepage
$home_page = get_page_by_path('home');
if ($home_page) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_page->ID);
    stcc_log("  Homepage set to \"Home\" page");
}

// ─── 2. Create Navigation Menus ─────────────────────────────────────────────

stcc_log("\n--- Creating Menus ---");

// Primary Navigation
$primary_menu_name = 'Primary Navigation';
$menu_exists = wp_get_nav_menu_object($primary_menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($primary_menu_name);
    stcc_log("  Created menu: $primary_menu_name");

    // Home
    $home_id = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'     => 'Home',
        'menu-item-url'       => home_url('/'),
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
    ]);

    // About Us (parent)
    $about_id = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'     => 'About Us',
        'menu-item-url'       => '#',
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
    ]);

    $about_children = [
        'Our Team'              => 'our-team',
        'Our Mission'           => 'our-mission',
        'Our Allies'            => 'our-allies',
        'Committees'            => 'committees',
        'Financial Disclosure'  => 'financial-disclosure',
    ];
    foreach ($about_children as $title => $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'     => $title,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page->ID,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
                'menu-item-parent-id' => $about_id,
            ]);
        }
    }

    // Our Work (parent)
    $work_id = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'     => 'Our Work',
        'menu-item-url'       => '#',
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
    ]);

    $work_children = [
        'Rescue & Rehabilitation' => 'rescue-rehabilitation',
        'Education'               => 'education',
        'Research'                => 'research',
    ];
    foreach ($work_children as $title => $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'     => $title,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page->ID,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
                'menu-item-parent-id' => $work_id,
            ]);
        }
    }

    // Get Involved (parent)
    $involved_id = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'     => 'Get Involved',
        'menu-item-url'       => '#',
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
    ]);

    $involved_children = [
        'Volunteer'             => 'volunteer',
        'Internships'           => 'internships',
        'Events'                => 'events',
        'Patrol Klein Curaçao'  => 'patrol-klein-curacao',
        'Vacancies'             => 'vacancies',
    ];
    foreach ($involved_children as $title => $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'     => $title,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page->ID,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
                'menu-item-parent-id' => $involved_id,
            ]);
        }
    }

    // Explore (parent)
    $explore_id = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'     => 'Sea Turtle Knowledge',
        'menu-item-url'       => '#',
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
    ]);

    $explore_children = [
        'Fibropapillomatosis'    => 'fibropapillomatosis',
    ];
    foreach ($explore_children as $title => $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'     => $title,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page->ID,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
                'menu-item-parent-id' => $explore_id,
            ]);
        }
    }

    // News
    wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'     => 'News',
        'menu-item-url'       => get_post_type_archive_link('stcc_news') ?: home_url('/news/'),
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
    ]);

    // Assign to theme location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
    stcc_log("  Assigned to 'primary' location");

} else {
    stcc_log("  SKIP: \"$primary_menu_name\" already exists");
}

// Footer menus
$footer_menus = [
    'Footer - About Us' => [
        'location' => 'footer-about',
        'items' => [
            'Our Team'             => 'our-team',
            'Our Mission'          => 'our-mission',
            'Our Allies'           => 'our-allies',
            'Committees'           => 'committees',
            'Financial Disclosure' => 'financial-disclosure',
        ],
    ],
    'Footer - Our Work' => [
        'location' => 'footer-work',
        'items' => [
            'Rescue & Rehabilitation' => 'rescue-rehabilitation',
            'Education'               => 'education',
            'Research'                => 'research',
        ],
    ],
    'Footer - Get Involved' => [
        'location' => 'footer-involved',
        'items' => [
            'Volunteer'    => 'volunteer',
            'Internships'  => 'internships',
            'Donate'       => 'donate',
        ],
    ],
];

foreach ($footer_menus as $menu_name => $config) {
    $existing = wp_get_nav_menu_object($menu_name);
    if ($existing) {
        stcc_log("  SKIP: \"$menu_name\" already exists");
        continue;
    }

    $fmenu_id = wp_create_nav_menu($menu_name);
    foreach ($config['items'] as $title => $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_update_nav_menu_item($fmenu_id, 0, [
                'menu-item-title'     => $title,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page->ID,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ]);
        }
    }

    $locations = get_theme_mod('nav_menu_locations');
    $locations[$config['location']] = $fmenu_id;
    set_theme_mod('nav_menu_locations', $locations);
    stcc_log("  Created & assigned: \"$menu_name\"");
}

// ─── 3. Create Team Members ─────────────────────────────────────────────────

stcc_log("\n--- Creating Team Members ---");

// Ensure team roles exist
$staff_term = term_exists('Staff', 'team_role');
if (!$staff_term) {
    $staff_term = wp_insert_term('Staff', 'team_role', ['slug' => 'staff']);
}

$board_term = term_exists('Board', 'team_role');
if (!$board_term) {
    $board_term = wp_insert_term('Board', 'team_role', ['slug' => 'board']);
}

$team_members = [
    // Staff
    [
        'name'      => 'Ard Vreugdenhil',
        'role'      => 'staff',
        'order'     => 1,
        'job_title' => 'Field Coordinator',
        'bio'       => "<p>I am responsible for daily operations, ensuring that our interns and volunteers are educated and following STCC's protocols, and I help facilitate our group's interactions with stakeholders across Curaçao.</p>\n<p>As STCC's in-water specialist, I manage turtle rescues and research sessions, ensuring the safety of our island's turtles and STCC's dedicated team members.</p>",
        'philosophy'=> "Let's explore together and make connections – curiosity is key!",
        'phone'     => '+5999 664 7970',
        'email'     => 'ard.d.vreugdenhil@gmail.com',
        'instagram' => 'Ardvreugdenhil',
        'image'     => 'team/ard2.jpg',
    ],
    [
        'name'      => 'Ingo van Veghel',
        'role'      => 'staff',
        'order'     => 2,
        'job_title' => 'Field Assistant',
        'bio'       => "<p>My weekly duties as the Field Assistant include conducting nesting patrols on Curaçao and Klein Curaçao, performing regular health checks in-water, and performing rescues such as hook removals. I give educational presentations and trainings for volunteers and I guide the volunteers in the field. Besides this I am responsible for the collection, processing, and analysing of the data we gather during our field activities, e.g., adding turtles to EarthRanger or ensuring the accuracy of nest excavations.</p>",
        'philosophy'=> '',
        'phone'     => '',
        'email'     => '',
        'instagram' => '',
        'image'     => 'team/ingo.jpg',
    ],
    // Board
    [
        'name'      => 'Patricia de Hart',
        'role'      => 'board',
        'order'     => 1,
        'job_title' => 'Chairwoman of the Board',
        'bio'       => "Patricia is a Tax Lawyer, originally from Barranquilla, Colombia. She has lived in several cities around the world and, after living in Buenos Aires for more than 20 years, together with her husband Gabriel, transferred to Curaçao where they have lived and enjoyed enormously for almost five years. Her professional experience working out of many countries for multinational entities in different sectors, understanding varied upbringings, while leading teams with diverse backgrounds in both cultures and education, has allowed her to provide strategy, planning and a sense of fulfillment into the work and vision of the companies she has worked with. She recently joined STCC as Chair of the Board of Directors, a distinct honor, as creating awareness and focusing on the well-being of turtles is totally aligned with her sense of what being part of a community means.",
        'philosophy'=> '',
        'phone'     => '',
        'email'     => '',
        'instagram' => '',
        'image'     => 'team/Patricia.jpg',
    ],
    [
        'name'      => 'Terri Birnbaum',
        'role'      => 'board',
        'order'     => 2,
        'job_title' => 'Secretary',
        'bio'       => "Terri has lived on Curaçao since January 2024. Prior to retiring, she was a Program Manager with the US government for 33 years, primarily working on satellite projects. Her previous volunteer work includes Girl Scouts of America and several roles with her church. She serves on the Data Committee and performs weekly beach patrols on Klein Curaçao.",
        'philosophy'=> '',
        'phone'     => '',
        'email'     => '',
        'instagram' => '',
        'image'     => 'team/terri.jpg',
    ],
    [
        'name'      => 'Susan Wong',
        'role'      => 'board',
        'order'     => 3,
        'job_title' => 'Treasurer',
        'bio'       => "Susan recently started volunteering for STCC. She loves hiking and being creative. Susan has worked at the Central Bank of Curaçao and Sint Maarten for over 25 years.",
        'philosophy'=> '',
        'phone'     => '',
        'email'     => '',
        'instagram' => '',
        'image'     => 'team/Susan.jpg',
    ],
    [
        'name'      => 'Natalia Morón',
        'role'      => 'board',
        'order'     => 4,
        'job_title' => 'General Member',
        'bio'       => "Natalia is a wife and mother of 3 who loves photography and nature. She joined STCC last year, has been active ever since and is very enthusiastic about making a difference in helping our sea turtles.",
        'philosophy'=> '',
        'phone'     => '',
        'email'     => '',
        'instagram' => '',
        'image'     => 'team/Natalia.jpg',
    ],
    [
        'name'      => 'Stephanie Gooding',
        'role'      => 'board',
        'order'     => 5,
        'job_title' => 'Board Member',
        'bio'       => "Stephanie and her husband Russ moved to Curaçao from the USA in March of 2023. She taught science for 20 years and was a school administrator for over 5 years. Stephanie discovered her love for sea turtles while volunteering on Pritchards Island, SC (USA) during Loggerhead nesting season. She looks forward to serving STCC through her passion for protecting our island's sea turtle population and its habitat.",
        'philosophy'=> '',
        'phone'     => '',
        'email'     => '',
        'instagram' => '',
        'image'     => 'team/stephanie.jpg',
    ],
    [
        'name'      => 'Carolina Marcías',
        'role'      => 'board',
        'order'     => 6,
        'job_title' => 'Chair, Fundraising Committee',
        'bio'       => "Carolina has been living on Curaçao for seven years now, and has been a dedicated volunteer with STCC since day one. A designer by trade and co-owner of Scubaçao, she also works as a dive instructor, sharing her love for the ocean with others. Carolina is excited to take on a new role as Chair of the Fundraising Committee, combining her creativity and passion for marine life to support STCC's mission.",
        'philosophy'=> '',
        'phone'     => '',
        'email'     => '',
        'instagram' => '',
        'image'     => 'team/carolina.jpg',
    ],
];

foreach ($team_members as $member) {
    $slug = sanitize_title($member['name']);
    $existing = get_posts([
        'post_type'   => 'stcc_team',
        'name'        => $slug,
        'numberposts' => 1,
    ]);

    if (!empty($existing)) {
        stcc_log("  SKIP: \"{$member['name']}\" (already exists)");
        continue;
    }

    $post_id = wp_insert_post([
        'post_type'    => 'stcc_team',
        'post_title'   => $member['name'],
        'post_name'    => $slug,
        'post_content' => $member['bio'],
        'post_status'  => 'publish',
        'menu_order'   => $member['order'],
    ]);

    if (is_wp_error($post_id)) {
        stcc_log("  ERROR: \"{$member['name']}\" - " . $post_id->get_error_message());
        continue;
    }

    // Set role taxonomy
    wp_set_object_terms($post_id, ucfirst($member['role']), 'team_role');

    // Set meta fields
    update_post_meta($post_id, '_stcc_job_title', $member['job_title']);
    update_post_meta($post_id, '_stcc_phone', $member['phone']);
    update_post_meta($post_id, '_stcc_email', $member['email']);
    update_post_meta($post_id, '_stcc_instagram', $member['instagram']);
    update_post_meta($post_id, '_stcc_philosophy', $member['philosophy']);

    // Import photo
    if ($member['image']) {
        $image_path = get_template_directory() . '/images/' . $member['image'];
        if (file_exists($image_path)) {
            $att_id = stcc_setup_import_image($image_path, $post_id);
            if ($att_id) {
                set_post_thumbnail($post_id, $att_id);
            }
        } else {
            stcc_log("    WARNING: Image not found: {$member['image']}");
        }
    }

    stcc_log("  OK: \"{$member['name']}\" (ID: $post_id, role: {$member['role']})");
}

// ─── 4. Set Permalink Structure ─────────────────────────────────────────────

stcc_log("\n--- Configuring Permalinks ---");
$current = get_option('permalink_structure');
if ($current !== '/%postname%/') {
    update_option('permalink_structure', '/%postname%/');
    stcc_log("  Set to /%postname%/");
} else {
    stcc_log("  Already set to /%postname%/");
}

flush_rewrite_rules();
stcc_log("  Rewrite rules flushed.");

stcc_log("\n=== Setup Complete ===");
stcc_log("Next steps:");
stcc_log("  1. Run migrate-news.php to import news articles");
stcc_log("  2. Add content to standard pages via the WP editor");
stcc_log("  3. Add volunteer portal content to the 'Volunteer Portal' page");
stcc_log("  4. Share the portal password (stcc2025) with volunteers");

// ─── Helpers ────────────────────────────────────────────────────────────────

function stcc_setup_import_image($file_path, $parent_id) {
    if (!file_exists($file_path)) return false;

    $filename = basename($file_path);
    $existing = get_posts([
        'post_type'   => 'attachment',
        'meta_key'    => '_stcc_source_path',
        'meta_value'  => $file_path,
        'numberposts' => 1,
    ]);
    if (!empty($existing)) return $existing[0]->ID;

    $upload_dir = wp_upload_dir();
    $dest = $upload_dir['path'] . '/' . wp_unique_filename($upload_dir['path'], $filename);
    copy($file_path, $dest);

    $filetype = wp_check_filetype(basename($dest));
    $att_id = wp_insert_attachment([
        'guid'           => $upload_dir['url'] . '/' . basename($dest),
        'post_mime_type' => $filetype['type'],
        'post_title'     => sanitize_file_name(pathinfo($filename, PATHINFO_FILENAME)),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ], $dest, $parent_id);

    if (is_wp_error($att_id)) {
        return false;
    }

    require_once ABSPATH . 'wp-admin/includes/image.php';
    wp_update_attachment_metadata($att_id, wp_generate_attachment_metadata($att_id, $dest));
    update_post_meta($att_id, '_stcc_source_path', $file_path);

    return $att_id;
}

function stcc_log($msg) {
    if (defined('WP_CLI') && WP_CLI) {
        WP_CLI::log($msg);
    } else {
        echo $msg . "<br>\n";
    }
}
