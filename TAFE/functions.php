<?php

function pageBanner($args = NULL)
{
    if (!$args['title']) {
        $args['title'] = get_the_title();
    } 
    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!$args['image'] ) {
        if (get_field('page_banner') AND !is_archive() AND !is_home()) {
            $args['image'] = get_field('page_banner')['sizes']['pageBanner'];
        } else {
            $args['image'] = get_theme_file_uri('images/ocean.jpg');
        }
    }

?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo
                                                                        $args['image'] ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle'] ?></p>
            </div>
        </div>
    </div>
<?php
}

function tafe_files()
{
    //wp_enqueue_style("tafe_styles", get_stylesheet_uri());
    wp_enqueue_script("tafe_js", get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style("tafe_styles", get_theme_file_uri("/build/style-index.css"));
    wp_enqueue_style("tafe_extra_styles", get_theme_file_uri("/build/index.css"));
    wp_enqueue_style("font-awesome", "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style("custom-google-fonts", "https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
}

function tafe_features()
{

    register_nav_menu('headerMenuLocation', 'Header Location');
    register_nav_menu('footerMenuLocation1', 'Footer Location One');
    register_nav_menu('footerMenuLocation2', 'Footer Location Two');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails'); //Featured image for posts - Proffessors

    add_image_size('professorSquire', 400, 400, true); //Seting image size and auto cropping
    add_image_size('professorPortrait', 480, 650, true); //Seting image size and auto cropping
    add_image_size('pageBanner', 1500, 350, true); //Banner image
}

add_action("wp_enqueue_scripts", "tafe_files");
add_action("after_setup_theme", "tafe_features");

// //Custom post types. 
// function tafe_post_types(){
//     register_post_type('event', array(
//         'public' => true,
//         'labels' => array('name' => 'Events'),
//         'menu_icon' => 'dashicons-calendar'
//     ));
// }

// add_action('init', 'tafe_post_types');

//Limiting the number of Events on the screen. Filteri Events to show before displaying in normal WP Loop  
function tafe_adjust_queries($query)
{
    //Only for Non admins (on the front end), only for Archive type events and only for main queries (not custom)
    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
        //$query->set('posts_per_page', '1');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'), //Filter by event's date. Do not show past events
                'type' => 'numeric'
            )
        ));
    }

    //Only for Non admins (on the front end), only for Archive type events and only for main queries (not custom)
    if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {
        $query->set('posts_per_page', '-1');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        // $query->set('meta_query', array(
        //     array(
        //         'key' => 'event_date',
        //         'compare' => '>=',
        //         'value' => date('Ymd'), //Filter by event's date. Do not show past events
        //         'type' => 'numeric'
        //     )
        // ));  
    }
}


add_action('pre_get_posts', 'tafe_adjust_queries');


function tafeMapKey($api)
{
    $api['key'] = 'AIzaSyDopmp3tGImU9lvlL0h8FMJojlURVMhZIE';
    return $api;

}
//add_filter('acf/fields/google_map/api', 'tafeMapKey')
apply_filters( 'acf/fields/google_map/api', 'tafeMapKey');

?>