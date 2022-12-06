<?php
get_header();

pageBanner(array(
    'title' => 'All TAFE Programs',
    'subtitle' => 'See what you can learn with us'
));
?>

<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post();
    ?>
            <div class="program-summary__content">
                <h5 class="program-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                <p><?php echo wp_trim_words(get_the_content(), 30) ?> <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a></p>
            </div>
    <?php
    }

    //Pagination links to go to next pages. Automatically displayed only 3 post (see Settings/Reading) 
    echo paginate_links();
    ?>

</div>

<?php
get_footer();
?>