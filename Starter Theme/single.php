<?php
get_header();

$count = 0;

while(have_posts()){
    the_post();
    ?>
    <h2><?php the_title(); ?></h2>    
    <h3><?php the_content(); ?></h3>

    <hr>
     <?php
} 

get_footer();
?>




