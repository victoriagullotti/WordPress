<?php

function tafe_files(){
    wp_enqueue_style("tafe_styles", get_stylesheet_uri());
}

add_action("wp_enqueue_scripts", "tafe_files");
?>