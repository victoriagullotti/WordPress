<?php
//Custom post types. 
function tafe_post_types()
{
    //Event
    register_post_type('event', array(
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'), //Archive name, slug. Dont forget to refresh permalinks in settings!
        'supports' => array('title', 'editor', 'excerpt'), //Custom fields
        'show_in_rest' => true,//!!! NEW BLOCK EDITOR ENABLED
        'labels' => array(
            'name' => 'Events',
            'edit_item' => 'Edit Event',
            'new_item' => 'New Event',//Don't see this one
            'add_new_item' => "Add New Event",
            'all_items' => 'All Events',
            'singular_name' => "Event"
        ),
        'menu_icon' => 'dashicons-calendar'
    ));

    //Program
    register_post_type('program', array(
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'programs'), //Archive name, slug. Dont forget to refresh permalinks in settings!
        //'supports' => array('title', 'editor', 'excerpt'), //Custom fields
        'show_in_rest' => true,//!!! NEW BLOCK EDITOR ENABLED
        'labels' => array(
            'name' => 'Programs',
            'edit_item' => 'Edit Program',
            'new_item' => 'New Program',//Don't see this one
            'add_new_item' => "Add New Program",
            'all_items' => 'All Programs',
            'singular_name' => "Program"
        ),
        'menu_icon' => 'dashicons-welcome-learn-more'
    ));

        //Professor
        register_post_type('professor', array(
            'public' => true,
            //'has_archive' => true,
            //'rewrite' => array('slug' => 'professors'), //Archive name, slug. Dont forget to refresh permalinks in settings!
            'supports' => array(
                'title', 'editor', 'excerpt', 'thumbnail'
            ), //Custom fields
            'show_in_rest' => true,//!!! NEW BLOCK EDITOR ENABLED
            'labels' => array(
                'name' => 'Professors',
                'edit_item' => 'Edit professor',
                'new_item' => 'New professor',//Don't see this one
                'add_new_item' => "Add New Professor",
                'all_items' => 'All Professors',
                'singular_name' => "Professor"
            ),
            'menu_icon' => 'dashicons-admin-users'
        ));

            //Campus
    register_post_type('campus', array(
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'campuses'), //Archive name, slug. Dont forget to refresh permalinks in settings!
        'supports' => array('title', 'editor', 'excerpt'), //Custom fields
        'show_in_rest' => true,//!!! NEW BLOCK EDITOR ENABLED
        'labels' => array(
            'name' => 'Campus',
            'edit_item' => 'Edit Campus',
            'new_item' => 'New Campus',//Don't see this one
            'add_new_item' => "Add New Campus",
            'all_items' => 'All Campuses',
            'singular_name' => "Campus"
        ),
        'menu_icon' => 'dashicons-location-alt'
    ));

}

add_action('init', 'tafe_post_types');
