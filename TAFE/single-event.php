<?php
get_header();
pageBanner(array(
    'title' => get_the_title(),
    'subtitle' => 'This is the great event.'
));


$count = 0;

while (have_posts()) {
    the_post();
?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Back to All Events</a>
                <span class="metabox__main"> <?php the_title() ?>
                </span>
            </p>
        </div>
        <div class="generic-content">
            <p><?php the_content(); ?></p>
        </div>
    

        <?php
        //Displaying related programs. Custom fields related to an Event.

        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Related program(s)</h2>';
            echo '<ul class="link-list min-list">';
            foreach ($relatedPrograms as $program) {
        ?>
                <li><a href="<?php echo get_the_permalink($program) ?>"><?php echo get_the_title($program) ?></a></li>
        <?php
            }
            echo '</ul>';
        }
        ?>
    </div>


    <hr>
<?php
}

get_footer();
?>