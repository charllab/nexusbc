<?php
/* Require Includes */
include_once get_template_directory() . '/includes/gutenburg.php';
include_once get_template_directory() . '/includes/helper-functions.php';
//include_once get_template_directory().'/includes/bootstrap-wp-navwalker.php';
//include_once get_template_directory().'/includes/acf-custom-widget.php';

/* Hooks */
if (!function_exists('enqueue_scripts')) {

    add_action('wp_enqueue_scripts', 'enqueue_scripts');

    // Cache bust constants
    define('THEMESTYLE_VERSION', filemtime(get_stylesheet_directory() . '/style/style.css'));
    define('HEADERBUNDLE_VERSION', filemtime(get_stylesheet_directory() . '/js/header-bundle.js'));
    define('FOOTERBUNDLE_VERSION', filemtime(get_stylesheet_directory() . '/js/footer-bundle.js'));

    function enqueue_scripts()
    {

        // Register our own jquery
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_style('style_file', get_stylesheet_directory_uri() . '/style/style.css', [], THEMESTYLE_VERSION);
        wp_enqueue_script('header_js', get_stylesheet_directory_uri() . '/js/header-bundle.js', null, HEADERBUNDLE_VERSION, false);
        wp_enqueue_script('footer_js', get_stylesheet_directory_uri() . '/js/footer-bundle.js', null, FOOTERBUNDLE_VERSION, true);

        // localise the ajax script used in app.js = making the script available to JavaScript
        wp_localize_script('footer_js', 'wpAjax', array(
            'ajaxUrl' => admin_url('admin-ajax.php')
        ));
    }
}

// ajax script
// wp_ajax_nopriv_{$action} needs to match jquery action tag
add_action('wp_ajax_nopriv_filter', 'filter_ajax');
// wp_ajax_{$action}
add_action('wp_ajax_filter', 'filter_ajax');

// always call die() first!
function filter_ajax()
{
    //print_r($_POST);

    // comes from app.js
    $category = $_POST['category'];
    $search_entry = $_POST['search-keyword'];

    $args = array(
        'post_type' => 'service-directories',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );

    // category filter
    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'services_type',
                'field' => 'term_id',
                'terms' => $category
            )
        );
    }

    // search form
    if (!empty($search_entry)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'directory_service_search',
                'field' => 'slug',
                'terms' => $search_entry
            )
        );
    }

    $query = new WP_Query($args);
    $cat = get_term($category, 'services_type');


    if ($query->have_posts()) :

        if (!empty($cat->count)) {
            echo '<h2 class="h1 mb-2"><span class="mr-50">Showing listings for ' . $cat->name . ' ' . '(' . $query->found_posts . ')</span><a onclick="printDiv(\'all\')" class="btn-print">Print All <i class="ml-250 fa fa-print fa-lg"></i></a></h2>';
        } elseif(!empty($search_entry)) {
            echo '<h2 class="h1 mb-2"><span class="mr-50">You searched for' . ' "' .  $search_entry . '" '  . '</span><a onclick="printDiv(\'all\')"  class="btn-print">Print All <i class="ml-250 fa fa-print fa-lg"></i></a></h2>';
        }  else {
        echo '<h2 class="h1 mb-2"><span class="mr-50">Showing listings for All' . ' ' . '(' . $query->found_posts . ')</span><a onclick="printDiv(\'all\')"  class="btn-print">Print All <i class="ml-250 fa fa-print fa-lg"></i></a></h2>';
        }

        echo '<div id="all">';

        while ($query->have_posts()) :
            $query->the_post();
            ?>

            <div class="mb-2" id="<?php echo strtolower(str_replace(' ', '', get_the_title()));?>">
                <h2><?php the_title(); ?> <a onclick="printDiv('<?php echo strtolower(str_replace(' ', '', get_the_title()));?>')"><i class="ml-250 fa fa-print fa-sm"></i></a></h2>

                <?php the_field('services_provided'); ?>

                <p><b>Services available in:</b>
                    <?php the_field('services_provided_locations'); ?>
                </p>

                <?php if (get_field('contact_person')): ?>
                    <p class="mb-0"><b>Contact Person</b>:
                        <?php the_field('contact_person'); ?>
                    </p>
                <?php endif; ?>

                <p class="mb-0"><b>Tel</b>: <a href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a></p>

                <?php if (get_field('email_address')): ?>
                    <p class="mb-0"><b>Email</b>: <a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></p>
                <?php endif; ?>

                <?php if (get_field('website_url')): ?>
                    <p class="mb-0"><b>Website</b>: <a href=" <?php the_field('website_url'); ?>" target="_blank">
                            <?php the_field('website_url'); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <!--if criminal_record_check_vulnerable_sector_clearance_on_file equals to 'yes' and criminal_record_check_expiry_date has a value-->
                <?php if (get_field('criminal_record_check_vulnerable_sector_clearance_on_file') == 'yes' && get_field('criminal_record_check_expiry_date')) : ?>
                    <p class="mb-0"><b>Clearance Expiry</b>: <?php the_field('criminal_record_check_expiry_date'); ?></p>
                <?php endif; ?>

                <?php if (get_field('rates')): ?>
                    <p><b>Hourly rate</b>: <?php the_field('rates'); ?></p>
                <?php endif; ?>
            </div><!-- mb-1 -->

            <hr class="mt-1 mb-2 border-top">

        <?php endwhile;
    elseif (!empty($category)) :
        $cat = get_term($category);
        echo '<h1>There are currently no providers in our directory for the category of <b>' . strtolower($cat->name) . '</b> at the moment.</h1>';
        echo '<p>Do you perhaps provide a local service for the category of <b>' . strtolower($cat->name) . '</b>? Please see the sidebar on how to get listed in this directory.</p>';
    elseif (!empty($search_entry)) :
        echo '<h1>There are currently no results for "'. $search_entry . '".</h1>';
        echo '<p>Please try another search term or use the filter by category option.</p>';
    else:
        echo '<h2>There are currently no providers in our directory for that specific category at the moment.</h2>';
    endif;

    echo '</div><!-- #all -->';

    wp_reset_postdata();

    die();
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');

if (!function_exists('custom_after_setup_theme')) {

    add_action('after_setup_theme', 'custom_after_setup_theme', 11);

    function custom_after_setup_theme()
    {
        remove_theme_support('custom-background');;
        add_theme_support('post-thumbnails');

        register_nav_menus([
            'primary' => 'Primary Menu',
            'secondary' => 'Footer Menu',
            'tertiary' => 'Legal Menu',
            'quaternary' => 'Sub Menu'
        ]);

        // Style Gutenberg
        add_theme_support('editor-styles');
        add_editor_style('style-editor.css');
    }
}

/* Misc */
remove_action('wp_head', 'wp_generator');
add_filter('allow_dev_auto_core_updates', '__return_false');
add_filter('auto_update_plugin', '__return_true');

/* Gravity Forms */
add_filter('gform_init_scripts_footer', '__return_true');
add_filter('gform_confirmation_anchor', '__return_false');
//add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/* ACF - Theme Options */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'position' => 80,
        'redirect' => false
    ]);
}

function register_acf_block_types()
{
    acf_register_block_type([
        'name' => 'simple-center-block',
        'title' => __('Sproing Soft Blue Content Block'),
        'description' => __('A simple soft blue center based layout block.'),
        'render_template' => 'includes/gutenburg/simple-center-block.php',
        'category' => 'formatting',
        'supports' => array('align' => false),
        'icon' => 'welcome-widgets-menus',
        'keywords' => ['layout'],
    ]);
}

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

function enable_page_excerpt()
{
    add_post_type_support('page', array('excerpt'));
}

add_action('init', 'enable_page_excerpt');

/*
Control Excerpt Length Using Filters
https://smallenvelop.com/limit-post-excerpt-length-in-wordpress/
*/
function custom_excerpt_length( $length ) {
    return 16;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* blog pagination */
/*
 * custom pagination with bootstrap .pagination class
 * source: http://www.ordinarycoder.com/paginate_links-class-ul-li-bootstrap/
 */
function bootstrap_pagination($echo = true)
{
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_next' => true,
        'prev_text' => __('«'),
        'next_text' => __('»'),
    ));

    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');

        $pagination = '<ul class="pagination justify-content-center">';

        foreach ($pages as $page) {
            $pagination .= '<li class="page-item">' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul>';

        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }
}

/*
Plugin Name: Image P tag remover
Description: Plugin to remove p tags from around images in content outputting, after WP autop filter has added them. (oh the irony)
Version: 1.0
Author: Fublo Ltd
Author URI: http://fublo.net/
*/

function filter_ptags_on_images($content)
{
    // do a regular expression replace...
    // find all p tags that have just
    // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
    // replace it with just the image tag...
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}

// we want it to be run after the autop stuff... 10 is default.
add_filter('the_content', 'filter_ptags_on_images');


// hide_admin_bar_from_front_end
function hide_admin_bar_from_front_end()
{
    if (is_blog_admin()) {
        return true;
    }
    return false;
}

add_filter('show_admin_bar', 'hide_admin_bar_from_front_end');

// Add Category Name to body_class
// https://css-tricks.com/snippets/wordpress/add-category-name-body_class/

add_filter('body_class', 'add_category_to_single');
function add_category_to_single($classes)
{
    if (is_single()) {
        global $post;
        foreach ((get_the_category($post->ID)) as $category) {
            // add category slug to the $classes array
            $classes[] = $category->category_nicename;
        }
    }
    // return the $classes array
    return $classes;
}

/* --------------------
/  move Yoast to bottom
/  -------------------- */
function yoast_to_bottom()
{
    return 'low';
}

add_filter('wpseo_metabox_prio', 'yoast_to_bottom');