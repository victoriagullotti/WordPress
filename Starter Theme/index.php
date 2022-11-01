<?php

get_header();

$count = 0;

while(have_posts()){
    the_post();
    ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>    
    <h3><?php the_content(); ?></h3>

     <?php
} 


get_footer();
?>




