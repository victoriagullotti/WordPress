<?php

/**
Posts loop. Printing of post title, description and link to individual post
 */
get_header();



while (have_posts()) {
    the_post();

    pageBanner(array(
        'title' => get_the_title(),
        'subtitle' => 'Learn how the school of your dreams got started'
        //'image' => get_field('page_banner')
    ));

?>

    <div class="container container--narrow page-section">
        <?php

        $theParent = wp_get_post_parent_id(get_the_ID());

        if ($theParent) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent) ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent) ?></a>
                    <span class="metabox__main"><?php the_title() ?></span>
                </p>
            </div>
        <?php }
        ?>



        <?php

        $testArray = get_pages(array(
            'title_li' => null,
            'clild_of' => get_the_ID()
        ));

        if ($theParent or $testArray) {
        ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php get_the_title($theParent) ?></a></h2>
                <ul class="min-list">
                    <?php

                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        $findChildrenOf = get_the_ID();
                    }

                    $pagesArray = array(
                        'title_li' => null,
                        'clild_of' => $findChildrenOf,
                        'sort_column' => 'menu_order'
                    );

                    wp_list_pages($pagesArray);
                    ?>
                </ul>
            </div>
        <?php
        }
        ?>



        <div class="generic-content">
            <?php the_content() ?>
        </div>
    </div>
<?php
}
get_footer();
?>