<?php
get_header();

pageBanner(array(
    'title' => 'All Campuses',
    'subtitle' => 'Choosing the perfect location'
));

?>

<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post();

        //get_template_part('template-parts/content', 'campus');

    ?>
        <div class="event-summary">

            <div class=" event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                <?php
                    $location = get_field('map_location');
                    echo $location['lng'];
                    ?>
                <p><?php
                    if (has_excerpt()) {
                        echo get_the_excerpt();
                    } else {
                        echo wp_trim_words(get_the_content(), 18);
                    }

                    ?> <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a></p>
                <h6>
                    <?php
                    $location = get_field('map_location');
                    echo $location['lng'];
                    ?></h6>
            </div>
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