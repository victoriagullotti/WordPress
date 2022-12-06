<?php
get_header();

pageBanner(array(
    'title' => get_the_title(),
    'subtitle' => 'See what we teach.'
));

$count = 0;

while (have_posts()) {
    the_post();
?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Back to All Programs</a>
                <span class="metabox__main"> <?php the_title() ?>
                </span>
            </p>
        </div>
        <div class="generic-content">
            <p><?php the_content(); ?></p>
        </div>


        <?php

        $today = date('Ymd');

        $programsPageEvents = new WP_Query(array(
            'posts_per_page' => 2, // -1 for ALL events
            'post_type' => 'event',
            'meta_key' => 'event_date', //Order by date - custom field
            'orderby' => 'meta_value_num',
            'order' => 'ASC', //DESC or RAND
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today, //Filter by event's date. Do not sow past events
                    'type' => 'numeric'
                ),
                //Only show events that are related to current program
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                )
            )
        ));

        if ($programsPageEvents->have_posts()) {
            echo '<hr>';
            echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events</h2>';

            while ($programsPageEvents->have_posts()) {
                $programsPageEvents->the_post();

                get_template_part('template-parts/content', 'event');
       
                wp_reset_postdata();
            }
        }

        $programsPageProfessors = new WP_Query(array(
            'posts_per_page' => -1, // -1 for ALL events
            'post_type' => 'professor',
            //'meta_key' => 'title', //Order by date - custom field
            'orderby' => 'title',
            'order' => 'ASC', //DESC or RAND
            'meta_query' => array(

                //Only show Professors that are related to current program
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                )
            )
        ));

        if ($programsPageProfessors->have_posts()) {
            echo '<hr>';
            echo '<h2 class="headline headline--medium">Professors</h2>';
            //echo '<ul class="professor-cards">';

            while ($programsPageProfessors->have_posts()) {
                $programsPageProfessors->the_post();

            ?>
                <li class="professor-card__list-item">
                    <a class="professor-card" href="<?php the_permalink() ?>">
                        <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorSquire') ?>"></img>
                        <span class="professor-card__title"><?php the_title() ?></span>
                    </a>
                </li>

        <?php

            }

            echo '</ul>';
            wp_reset_postdata();
        }

        ?>
    </div>
    <hr>
<?php
}

get_footer();
?>