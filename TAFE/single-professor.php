<?php
get_header();

$count = 0;

while (have_posts()) {
    the_post();
    //$bannerImage = get_field('page_banner');
                                                                        
    pageBanner();
?>
    

    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>


        <?php
        //Displaying related programs. Custom fields related to an Event.

        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Subjects Taught</h2>';
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