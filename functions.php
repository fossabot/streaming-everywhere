<?php
/* Streming Everywhere functions and definitions. */

if (!function_exists('streaming_everywhere_setup')): /* Sets up theme defaults and registers support */
    function streaming_everywhere_setup()
    {
        /* Let WordPress manage the document title. */
        add_theme_support('title-tag');
        /* Enable support for Post Thumbnails on posts and pages. */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.

        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'streaming_everywhere'),
            'footer' => esc_html__('Footer', 'streaming_everywhere')
        ));
        /* Header Menu */
        function default_main_menu()
        {
?>
        <ul class="uk-nav  uk-nav-side uk-nav-parent-icon uk-margin-bottom">
            <li class="uk-active"><a href="<?php
            echo site_url();
?>">Home</a></li>
        </ul>
       <?php
        }

        /* Footer Menu */
        function default_foot_menu()
        {
?>
    <ul class="uk-subnav ">
        <li><a href="/privacy-policy">Privacy policy</a></li>
        <li><a href="/terms-of-service">Terms of service</a></ul>
       <?php
        }

        /* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));

        // Set up the WordPress core custom background feature.

        add_theme_support('custom-background', apply_filters('streaming_everywhere_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => ''
        )));
    }
endif;
add_action('after_setup_theme', 'streaming_everywhere_setup');
/* Set the content width in pixels, based on the theme's design and stylesheet. */

function streaming_everywhere_content_width()
{
    $GLOBALS['content_width'] = apply_filters('streaming_everywhere_content_width', 640);
}

add_action('after_setup_theme', 'streaming_everywhere_content_width', 0);
/* Register widget area. */

function streaming_everywhere_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'streaming_everywhere'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'streaming_everywhere'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'streaming_everywhere_widgets_init');
/* Enqueue scripts and styles. */

function streaming_everywhere_scripts()
{
    wp_enqueue_style('streaming_everywhere-style', get_stylesheet_uri());
    wp_enqueue_script('streaming_everywhere_all', get_template_directory_uri() . '/js/javascript.js', array(), '20151215', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'streaming_everywhere_scripts');
/* Load cmb2 metabox */
require get_template_directory() . '/CMB/init.php';

/* Load cmb2 config file */
-require get_template_directory() . '/CMB/config.php';

function revcon_change_post_label()
{
    global $menu;
    global $submenu;
    $menu[5][0]                 = 'Movies';
    $submenu['edit.php'][5][0]  = 'All Movies';
    $submenu['edit.php'][10][0] = 'Add Movie';
}

function revcon_change_post_object()
{
    global $wp_post_types;
    $labels =& $wp_post_types['post']->labels;
    $labels->name               = 'Movies';
    $labels->singular_name      = 'Movie';
    $labels->add_new            = 'Add Movie';
    $labels->add_new_item       = 'Add Movie';
    $labels->edit_item          = 'Edit Movie';
    $labels->new_item           = 'New Movie';
    $labels->view_item          = 'View Movie';
    $labels->search_items       = 'Search Movie';
    $labels->not_found          = 'No Movies found';
    $labels->not_found_in_trash = 'No Movies found in Trash';
    $labels->all_items          = 'All Movies';
    $labels->menu_name          = 'Movie Menu';
    $labels->name_admin_bar     = 'Movie';
}

add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');

function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class=\"pagination\">";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
        echo "</div>\n";
    }
}

function custom_post_type()
{

    // Set UI labels for Custom Post Type

    $labels = array(
        'name' => _x('Tv-Shows'),
        'singular_name' => _x('Tv-Show'),
        'menu_name' => __('Tv-Shows'),
        'parent_item_colon' => __('Parent Tv-Show'),
        'all_items' => __('All Tv-Shows'),
        'view_item' => __('View Tv-Show'),
        'add_new_item' => __('Add New Tv-Show'),
        'add_new' => __('Add New'),
        'edit_item' => __('Edit Tv-Show'),
        'update_item' => __('Update Tv-Show'),
        'search_items' => __('Search Tv-Show'),
        'not_found' => __('Not Found'),
        'not_found_in_trash' => __('Not found in Trash')
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('tv_show'),
        'description' => __('Tv-Show news and reviews'),
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',

        // This is where we add taxonomies to our CPT

        'taxonomies' => array(
            'category'
        )
    );

    // Registering your Custom Post Type

    register_post_type('tv_show', $args);
}

/* Hook into the 'init' action so that the function. */
add_action('init', 'custom_post_type', 0);
add_filter('pre_get_posts', 'query_post_type');

function query_post_type($query)
{
    if (is_category()) {
        $post_type = get_query_var('post_type');
        if ($post_type)
            $post_type = $post_type;
        else
            $post_type = array(
                'nav_menu_item',
                'post',
                'tv_show'
            ); // don't forget nav_menu_item to allow menus to work!
        $query->set('post_type', $post_type);
        return $query;
    }
}

/* Remove the slug from published post permalinks. Only affect our custom post type, though. */

function gp_remove_cpt_slug($post_link, $post, $leavename)
{
    if ('tv_show' != $post->post_type || 'publish' != $post->post_status) {
        return $post_link;
    }

    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    return $post_link;
}

add_filter('post_type_link', 'gp_remove_cpt_slug', 10, 3);
/* Have WordPress match postname to any of our public post types (post, page, tv-show) */

function gp_parse_request_trick($query)
{

    // Only noop the main query

    if (!$query->is_main_query())
        return;

    // Only noop our very specific rewrite rule match

    if (2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match

    if (!empty($query->query['name'])) {
        $query->set('post_type', array(
            'post',
            'page',
            'tv_show'
        ));
    }
}

add_action('pre_get_posts', 'gp_parse_request_trick');
/* Removing Stuff */

if (!is_admin() && isset($_SERVER['REQUEST_URI'])) {
    if (preg_match('/(wp-comments-post)/', $_SERVER['REQUEST_URI']) === 0 && !empty($_REQUEST['author'])) {
        openlog('wordpress(' . $_SERVER['HTTP_HOST'] . ')', LOG_NDELAY | LOG_PID, LOG_AUTH);
        syslog(LOG_INFO, "Attempted user enumeration from {$_SERVER['REMOTE_ADDR']}");
        closelog();
        wp_die('The quieter you become, the more you are able to hear.');
    }
}

function SearchFilter($queryy)
{
    if ($queryy->is_search) {
        $queryy->set('post_type', array(
            'post',
            'tv_show'
        ));
    }

    return $query;
}

add_filter('pre_get_posts', 'SearchFilter');

function _remove_script_version($src)
{
    $parts = explode('?ver', $src);
    return $parts[0];
}

add_filter('script_loader_src', '_remove_script_version', 15, 1);
add_filter('style_loader_src', '_remove_script_version', 15, 1);

function wpb_disable_feed()
{
    wp_die(__('No feed available,please visit our <a href="' . get_bloginfo('url') . '">homepage</a>!'));
}

add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);
add_filter('xmlrpc_enabled', '__return_false');

function remove_tagline($title)
{
    if (isset($title['tagline'])) {
        unset($title['tagline']);
    }

    return $title;
}

add_filter('document_title_parts', 'remove_tagline');
add_action('customize_register', 'prefix_remove_css_section', 15);

function prefix_remove_css_section($wp_customize)
{
    $wp_customize->remove_section('custom_css');
}

add_filter('login_errors', create_function('$a', "return null;"));

function myprefix_unregister_tags()
{
    unregister_taxonomy_for_object_type('post_tag', 'post');
}

add_action('init', 'myprefix_unregister_tags');
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
show_admin_bar(false);

function remove_menus()
{
    remove_menu_page('edit-comments.php');
    remove_menu_page('themes.php');
    remove_menu_page('plugins.php');
    remove_menu_page('users.php');
    remove_menu_page('tools.php');
    remove_menu_page('options-general.php');
}

add_action('admin_menu', 'remove_menus');

/* Description */
function the_meta_description()
{
    if (is_singular()) {
        if ($meta_description != '') {
            echo $meta_description;
        } else {
            global $post;
            setup_postdata($post);
            $meta_description = get_the_excerpt();
            echo $meta_description;
        }
    } elseif (is_search()) {
        echo 'This page shows search results for the query: ' . get_search_query();
    } elseif (is_category()) {
        $category_description = category_description();
        $category_description = strip_tags($category_description);
        $category_title       = single_cat_title('', false);
        if ($category_description != '') {
            echo $category_description;
        } else {
            echo 'This page shows all posts filed under the category ' . $category_title;
        }
    } elseif (is_archive()) {
        $archive_period = 'Archive for ' . get_the_date($d) . ' | ' . get_bloginfo('name');
        echo 'This page shows content created during the time period of ' . $archive_period;
    } else {
        bloginfo('description');
    }
}

/* Add All Posts To FrontPage */

function show_all_post_together($query)
{
    if (is_home() && $query->is_main_query()) {
        $query->set('post_type', array(
            'post',
            'tv_show'
        ));
    }
}

add_action('pre_get_posts', 'show_all_post_together');

/* Minify HTML */
add_action('get_header', 'gkp_html_minify_start');

function gkp_html_minify_start()
{
    ob_start('gkp_html_minyfy_finish');
}

function gkp_html_minyfy_finish($html)
{
    $html = preg_replace('/<!--(?!s*(?:[if [^]]+]|!|>))(?:(?!-->).)*-->/s', '', $html);
    $html = str_replace(array(
        "\r\n",
        "\r",
        "\n",
        "\t"
    ), '', $html);
    while (stristr($html, '  '))
        $html = str_replace('  ', ' ', $html);
    return $html;
}

/* Remove Query String */
function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
    return $parts[0];
}

add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/** Header */
add_action('template_redirect', 'add_last_modified_header');

function add_last_modified_header($headers)
{
    if (is_singular()) {
        $post_id = get_queried_object_id();
        if ($post_id) {
            header("Last-Modified: " . get_the_modified_time("D, d M Y H:i:s", $post_id));
        }
    }
}
