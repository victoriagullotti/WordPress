<?php
//Custom post types. 
function tafe_post_types(){
    register_post_type('event', array(
        'public' => true,
        'labels' => array('name' => 'Events'),
        'menu_icon' => 'dashicons-calendar'
    ));
}

add_action('init', 'tafe_post_types');

?>