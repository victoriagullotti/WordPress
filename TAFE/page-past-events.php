<?php
get_header();
pageBanner(array(
    'title' => 'Past Events',
    'subtitle' => 'See all past events.'
));

?>

<div class="container container--narrow page-section">
    <?php

    $today = date('Ymd');

    $pastEvents = new WP_Query(array(
        //'posts_per_page' => -1, // -1 for ALL events
        'post_type' => 'event',
        'meta_key' => 'event_date', //Order by date - custom field
        'orderby' => 'meta_value_num',
        'order' => 'DESC', //DESC or RAND
        'paged' => get_query_var('paged', 1),
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today, //Filter by event's date. Do not sow past events
                'type' => 'numeric'
            )
        )
    ));

    while ($pastEvents->have_posts()) {
        $pastEvents->the_post();

        get_template_part('template-parts/content', 'event');
    
    }

    //Pagination links to go to next pages. Automatically displayed only 3 post (see Settings/Reading) 
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages
    ));
    ?>
</div>

<?php
get_footer();
?>