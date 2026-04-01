<?php
/**
 * Sea Turtle Conservation Curacao - Theme Functions
 *
 * @package STCC
 */

define('STCC_VERSION', '1.0.0');

// ─── Theme Setup ────────────────────────────────────────────────────────────

add_action('after_setup_theme', 'stcc_theme_setup');
function stcc_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo', [
        'height'      => 119,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary'       => __('Primary Navigation', 'stcc'),
        'footer-about'  => __('Footer - About Us', 'stcc'),
        'footer-work'   => __('Footer - Our Work', 'stcc'),
        'footer-involved' => __('Footer - Get Involved', 'stcc'),
    ]);
}

// ─── Enqueue Styles & Scripts ───────────────────────────────────────────────

add_action('wp_enqueue_scripts', 'stcc_enqueue_assets');
function stcc_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'stcc-google-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Open+Sans:wght@300;400;600;700&display=swap',
        [],
        null
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        [],
        '6.4.0'
    );

    // Main stylesheet
    wp_enqueue_style(
        'stcc-main',
        get_template_directory_uri() . '/css/styles.css',
        ['stcc-google-fonts', 'font-awesome'],
        STCC_VERSION
    );

    // Main script
    wp_enqueue_script(
        'stcc-main',
        get_template_directory_uri() . '/js/main.js',
        [],
        STCC_VERSION,
        true
    );
}

// ─── Custom Nav Walker (Dropdown Support) ───────────────────────────────────

class STCC_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="dropdown">';
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes = array_filter($classes);

        // Map WP's has-children class to our CSS class
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-dropdown';
        }

        $class_attr = $classes ? ' class="' . esc_attr(implode(' ', $classes)) . '"' : '';

        $output .= '<li' . $class_attr . '>';

        $atts = [];
        $atts['href'] = !empty($item->url) ? $item->url : '#';
        if ($item->target) {
            $atts['target'] = $item->target;
        }

        $attr_string = '';
        foreach ($atts as $attr => $value) {
            $attr_string .= ' ' . $attr . '="' . esc_attr($value) . '"';
        }

        $output .= '<a' . $attr_string . '>' . esc_html($item->title) . '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}

// ─── Custom Post Type: News Articles ────────────────────────────────────────

add_action('init', 'stcc_register_post_types');
function stcc_register_post_types() {
    // News Articles
    register_post_type('stcc_news', [
        'labels' => [
            'name'               => 'News Articles',
            'singular_name'      => 'News Article',
            'add_new'            => 'Add New Article',
            'add_new_item'       => 'Add New News Article',
            'edit_item'          => 'Edit News Article',
            'new_item'           => 'New News Article',
            'view_item'          => 'View News Article',
            'search_items'       => 'Search News Articles',
            'not_found'          => 'No news articles found',
            'not_found_in_trash' => 'No news articles found in trash',
            'menu_name'          => 'News',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'news'],
        'menu_icon'     => 'dashicons-megaphone',
        'menu_position' => 5,
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest'  => true,
    ]);

    // News Categories
    register_taxonomy('news_category', 'stcc_news', [
        'labels' => [
            'name'          => 'News Categories',
            'singular_name' => 'News Category',
            'add_new_item'  => 'Add New Category',
        ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'news-category'],
        'show_in_rest' => true,
    ]);

    // Team Members
    register_post_type('stcc_team', [
        'labels' => [
            'name'               => 'Team Members',
            'singular_name'      => 'Team Member',
            'add_new'            => 'Add New Member',
            'add_new_item'       => 'Add New Team Member',
            'edit_item'          => 'Edit Team Member',
            'new_item'           => 'New Team Member',
            'view_item'          => 'View Team Member',
            'search_items'       => 'Search Team Members',
            'not_found'          => 'No team members found',
            'menu_name'          => 'Team',
        ],
        'public'        => false,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 7,
        'supports'      => ['title', 'editor', 'thumbnail', 'page-attributes'],
        'show_in_rest'  => true,
    ]);

    // Team Roles (staff, board, intern)
    register_taxonomy('team_role', 'stcc_team', [
        'labels' => [
            'name'          => 'Roles',
            'singular_name' => 'Role',
            'add_new_item'  => 'Add New Role',
        ],
        'public'       => false,
        'show_ui'      => true,
        'hierarchical' => true,
        'show_in_rest' => true,
    ]);

    // Form Submissions
    register_post_type('stcc_submission', [
        'labels' => [
            'name'               => 'Form Submissions',
            'singular_name'      => 'Form Submission',
            'view_item'          => 'View Submission',
            'search_items'       => 'Search Submissions',
            'not_found'          => 'No submissions found',
            'not_found_in_trash' => 'No submissions found in trash',
            'menu_name'          => 'Form Submissions',
        ],
        'public'            => false,
        'show_ui'           => true,
        'show_in_menu'      => false, // We add our own menu item with unread count
        'menu_icon'         => 'dashicons-email-alt',
        'supports'          => ['title'],
        'capability_type'   => 'post',
        'capabilities'      => [
            'create_posts' => 'do_not_allow',
        ],
        'map_meta_cap' => true,
    ]);
}

// ─── Form Submissions: Admin Menu with Unread Count ─────────────────────────

add_action('admin_menu', 'stcc_submissions_admin_menu');
function stcc_submissions_admin_menu() {
    $unread_count = stcc_get_unread_submission_count();
    $menu_title = 'Form Submissions';
    if ($unread_count > 0) {
        $menu_title .= ' <span class="awaiting-mod count-' . $unread_count . '"><span class="pending-count">' . $unread_count . '</span></span>';
    }

    add_menu_page(
        'Form Submissions',
        $menu_title,
        'edit_posts',
        'edit.php?post_type=stcc_submission',
        '',
        'dashicons-email-alt',
        26
    );
}

function stcc_get_unread_submission_count() {
    $unread = get_posts([
        'post_type'    => 'stcc_submission',
        'post_status'  => 'publish',
        'meta_query'   => [[
            'key'     => '_stcc_read',
            'compare' => 'NOT EXISTS',
        ]],
        'fields'       => 'ids',
        'numberposts'  => -1,
    ]);
    return count($unread);
}

// ─── Admin Bar: Submissions Button ──────────────────────────────────────────

add_action('admin_bar_menu', 'stcc_admin_bar_submissions', 100);
function stcc_admin_bar_submissions($wp_admin_bar) {
    if (!current_user_can('edit_posts')) {
        return;
    }

    $unread = stcc_get_unread_submission_count();
    $title = '<span class="ab-icon dashicons dashicons-email-alt" style="margin-top:2px;"></span> Submissions';
    if ($unread > 0) {
        $title .= ' <span class="stcc-unread-badge" style="background:#ca4a1f;color:#fff;padding:0 6px;border-radius:10px;font-size:11px;margin-left:4px;">' . $unread . '</span>';
    }

    $wp_admin_bar->add_node([
        'id'    => 'stcc-submissions',
        'title' => $title,
        'href'  => admin_url('edit.php?post_type=stcc_submission'),
        'meta'  => ['class' => 'stcc-submissions-link'],
    ]);
}

// ─── Form Submission Handler (AJAX) ────────────────────────────────────────

add_action('wp_ajax_stcc_submit_form', 'stcc_handle_form_submission');
add_action('wp_ajax_nopriv_stcc_submit_form', 'stcc_handle_form_submission');
function stcc_handle_form_submission() {
    // Verify nonce
    if (!isset($_POST['stcc_nonce']) || !wp_verify_nonce($_POST['stcc_nonce'], 'stcc_form_submission')) {
        wp_send_json_error(['message' => 'Security check failed.']);
    }

    $form_type = sanitize_text_field($_POST['form_type'] ?? '');
    $name      = sanitize_text_field($_POST['name'] ?? '');
    $email     = sanitize_email($_POST['email'] ?? '');
    $country   = sanitize_text_field($_POST['country'] ?? '');

    if (!$name || !$email || !$form_type) {
        wp_send_json_error(['message' => 'Please fill in all required fields.']);
    }

    // Create submission post
    $post_title = ucfirst($form_type) . ': ' . $name;
    $post_id = wp_insert_post([
        'post_type'   => 'stcc_submission',
        'post_title'  => $post_title,
        'post_status' => 'publish',
    ]);

    if (is_wp_error($post_id)) {
        wp_send_json_error(['message' => 'Submission failed. Please try again.']);
    }

    // Store form data as meta
    update_post_meta($post_id, '_stcc_form_type', $form_type);
    update_post_meta($post_id, '_stcc_name', $name);
    update_post_meta($post_id, '_stcc_email', $email);
    update_post_meta($post_id, '_stcc_country', $country);

    // Intern-specific fields
    if ($form_type === 'internship') {
        update_post_meta($post_id, '_stcc_university', sanitize_text_field($_POST['university'] ?? ''));
        update_post_meta($post_id, '_stcc_degree', sanitize_text_field($_POST['degree'] ?? ''));
    }

    // Send email notification
    $admin_email = get_option('admin_email');
    $subject = '[STCC] New ' . ucfirst($form_type) . ' Application: ' . $name;
    $body = "New {$form_type} application received:\n\n";
    $body .= "Name: {$name}\n";
    $body .= "Email: {$email}\n";
    $body .= "Country: {$country}\n";
    if ($form_type === 'internship') {
        $body .= "University: " . sanitize_text_field($_POST['university'] ?? '') . "\n";
        $body .= "Degree: " . sanitize_text_field($_POST['degree'] ?? '') . "\n";
    }
    $body .= "\nView in dashboard: " . admin_url('edit.php?post_type=stcc_submission');

    wp_mail($admin_email, $subject, $body);

    wp_send_json_success(['message' => 'Thank you! Your application has been submitted successfully.']);
}

// ─── Form Submissions: Admin Columns ────────────────────────────────────────

add_filter('manage_stcc_submission_posts_columns', 'stcc_submission_columns');
function stcc_submission_columns($columns) {
    return [
        'cb'         => $columns['cb'],
        'title'      => 'Submission',
        'form_type'  => 'Type',
        'email'      => 'Email',
        'country'    => 'Country',
        'date'       => 'Date',
    ];
}

add_action('manage_stcc_submission_posts_custom_column', 'stcc_submission_column_content', 10, 2);
function stcc_submission_column_content($column, $post_id) {
    switch ($column) {
        case 'form_type':
            echo esc_html(ucfirst(get_post_meta($post_id, '_stcc_form_type', true)));
            break;
        case 'email':
            $email = get_post_meta($post_id, '_stcc_email', true);
            echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            break;
        case 'country':
            echo esc_html(get_post_meta($post_id, '_stcc_country', true));
            break;
    }
}

// ─── Form Submissions: Detail View ──────────────────────────────────────────

add_action('add_meta_boxes', 'stcc_submission_meta_boxes');
function stcc_submission_meta_boxes() {
    add_meta_box(
        'stcc_submission_details',
        'Submission Details',
        'stcc_submission_details_callback',
        'stcc_submission',
        'normal',
        'high'
    );
}

function stcc_submission_details_callback($post) {
    // Mark as read when admin views it
    if (!get_post_meta($post->ID, '_stcc_read', true)) {
        update_post_meta($post->ID, '_stcc_read', current_time('mysql'));
    }

    $fields = [
        'Form Type'  => get_post_meta($post->ID, '_stcc_form_type', true),
        'Name'       => get_post_meta($post->ID, '_stcc_name', true),
        'Email'      => get_post_meta($post->ID, '_stcc_email', true),
        'Country'    => get_post_meta($post->ID, '_stcc_country', true),
    ];

    $form_type = get_post_meta($post->ID, '_stcc_form_type', true);
    if ($form_type === 'internship') {
        $fields['University']    = get_post_meta($post->ID, '_stcc_university', true);
        $fields['Degree Program'] = get_post_meta($post->ID, '_stcc_degree', true);
    }

    echo '<table class="form-table"><tbody>';
    foreach ($fields as $label => $value) {
        echo '<tr>';
        echo '<th scope="row">' . esc_html($label) . '</th>';
        if ($label === 'Email') {
            echo '<td><a href="mailto:' . esc_attr($value) . '">' . esc_html($value) . '</a></td>';
        } else {
            echo '<td>' . esc_html($value) . '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
}

// ─── Conditionally Enqueue Portal Script ────────────────────────────────────

add_action('wp_enqueue_scripts', 'stcc_enqueue_portal_script');
function stcc_enqueue_portal_script() {
    if (is_page('volunteer-portal')) {
        wp_enqueue_script('stcc-portal', get_template_directory_uri() . '/js/portal.js', [], STCC_VERSION, true);
    }
}

// ─── Localize Script Data (AJAX URL + Nonce) ───────────────────────────────

add_action('wp_enqueue_scripts', 'stcc_localize_scripts', 20);
function stcc_localize_scripts() {
    wp_localize_script('stcc-main', 'stcc_ajax', [
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('stcc_form_submission'),
    ]);
}

// ─── Team Member Meta Boxes ─────────────────────────────────────────────────

add_action('add_meta_boxes', 'stcc_team_meta_boxes');
function stcc_team_meta_boxes() {
    add_meta_box(
        'stcc_team_details',
        'Team Member Details',
        'stcc_team_details_callback',
        'stcc_team',
        'normal',
        'high'
    );
}

function stcc_team_details_callback($post) {
    wp_nonce_field('stcc_team_meta', 'stcc_team_meta_nonce');
    $fields = [
        '_stcc_job_title' => ['label' => 'Job Title / Board Role', 'placeholder' => 'e.g., Field Coordinator, Chairwoman of the Board'],
        '_stcc_phone'     => ['label' => 'Phone Number', 'placeholder' => '+5999 664 7970'],
        '_stcc_email'     => ['label' => 'Email', 'placeholder' => 'name@example.com'],
        '_stcc_instagram' => ['label' => 'Instagram Handle', 'placeholder' => '@username'],
        '_stcc_philosophy' => ['label' => 'Quote / Philosophy', 'placeholder' => 'A personal motto or quote (optional)'],
    ];

    echo '<table class="form-table"><tbody>';
    foreach ($fields as $key => $field) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr>';
        echo '<th scope="row"><label for="' . esc_attr($key) . '">' . esc_html($field['label']) . '</label></th>';
        echo '<td><input type="text" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" placeholder="' . esc_attr($field['placeholder']) . '" class="regular-text"></td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}

add_action('save_post_stcc_team', 'stcc_save_team_meta');
function stcc_save_team_meta($post_id) {
    if (!isset($_POST['stcc_team_meta_nonce']) || !wp_verify_nonce($_POST['stcc_team_meta_nonce'], 'stcc_team_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = ['_stcc_job_title', '_stcc_phone', '_stcc_email', '_stcc_instagram', '_stcc_philosophy'];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

// ─── Helper: Get Theme Image URL ────────────────────────────────────────────

function stcc_image_url($path) {
    return get_template_directory_uri() . '/images/' . $path;
}

// ─── Flush Rewrite Rules on Activation ──────────────────────────────────────

add_action('after_switch_theme', 'stcc_flush_rewrite_rules');
function stcc_flush_rewrite_rules() {
    stcc_register_post_types();
    flush_rewrite_rules();
}
