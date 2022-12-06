<footer class="site-footer">
    <div class="site-footer__inner container container--narrow">
        <div class="group">
            <div class="site-footer__col-one">
                <h1 class="school-logo-text school-logo-text--alt-color">
                    <a href="<?php echo site_url() ?>"><strong>Awesome</strong> TAFE</a>
                </h1>
                <p><a class="site-footer__link" href="#">555.555.5555</a></p>
            </div>

            <div class="site-footer__col-two-three-group">
                <div class="site-footer__col-two">
                    <h3 class="headline headline--small">Explore</h3>
                    <nav class="nav-list">
                        <ul>
                            <!--
                            <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                            <li><a href="<?php echo site_url('/programs') ?>">Programs</a></li>
                            <li><a href="<?php echo site_url('/Events') ?>">Events</a></li>
                            <li><a href="<?php echo site_url('/Campuses') ?>">Campuses</a></li>
                            <li><a href="<?php echo site_url('/Blog') ?>">Blog</a></li> -->
                            <?php wp_nav_menu(array('theme_location' => 'footerMenuLocation1')) ?>
                        </ul>
                    </nav>
                </div>

                <div class="site-footer__col-three">
                    <h3 class="headline headline--small">Learn</h3>
                    <nav class="nav-list">
                        <ul>

                            <?php wp_nav_menu(array('theme_location' => 'footerMenuLocation2')) ?>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="site-footer__col-four">
                <h3 class="headline headline--small">Connect With Us</h3>
                <nav>
                    <ul class="min-list social-icons-list group">
                        <li>
                            <a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>


<div class="search-overlay">
    <div class="search-overlay__top">
        <div class="container">
        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>    
        <input class="search-term" id="search-term" type="text" placeholder="What are you looking for?"></input>
        <i class="fa fa-close search-overlay__icon" aria-hidden="true"></i>    
        </div>
    </div>

</div>

<?php wp_footer(); ?>

</body>

</html>