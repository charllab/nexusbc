<?php get_header(); ?>

    <!--front-page.php-->
    <main>

        <?php if (have_rows('hero_slide')): ?>
            <div class="owl-carousel z-index-1 position-relative" id="hero-slider">

                <?php while (have_rows('hero_slide')) : the_row(); ?>

                    <?php $herosliderimageurl = get_sub_field('hero_slide_image'); ?>

                    <div class="hero-slide--fullheight position-relative bg-dark"
                         style="background: #3050A0 url(<?php echo $herosliderimageurl['sizes']['large']; ?>) no-repeat center center; background-size: cover;">
                        <div class="block__tint-overlay position-absolute h-100"></div>
                        <div class="item">
                            <div class="container position-relative hero-slide__container py-2 py-lg-6 py-xxxl-8">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 pb-2 pb-lg-0">
                                        <h1 class="text-white">
                                            <?php the_sub_field('hero_slide_title'); ?>
                                        </h1>
                                        <p class="lead text-white mb-2 pr-lg-1"><?php the_sub_field('hero_slide_blurb'); ?></p>
                                        <?php if (get_sub_field('hero_slide_button_text')): ?>
                                            <a href="<?php the_sub_field('hero_slide_button_link'); ?>"
                                               class="btn btn-primary" class="text-white mb-1">
                                                <?php the_sub_field('hero_slide_button_text'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div><!-- owl-carousel -->

        <?php endif; ?>

        <section class="py-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="h1 text-uppercase mb-2">News & Events</h2>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <a href="#" class="btn btn-primary mb-2">See All</a>
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">

                    <?php
                    global $post;
                    $args = array(
                        'posts_per_page' => 3
                    );

                    $wp_query = new WP_Query();
                    $wp_query->query($args);

                    // The 2nd Loop
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post(); ?>

                        <div class="col-md-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', array('class' => 'd-block img-fluid rounded-top')); ?>
                            </a>
                            <a class="bg-primary w-100 d-block text-center py-1 px-2 rounded-bottom text-white mb-2">
                                <?php
                                $thetitle = $post->post_title; /* or you can use get_the_title() */
                                $getlength = strlen($thetitle);
                                $thelength = 32;
                                echo substr($thetitle, 0, $thelength);
                                if ($getlength > $thelength) echo "&hellip;";
                                ?>
                            </a>
                        </div><!-- col -->

                    <?php }
                    wp_reset_query(); ?>

                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="bg-dark py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="h1 text-white">
                            <?php the_field('homepage_donate_cta_heading'); ?>
                        </h2>
                        <p class="lead text-white mb-2 mb-lg-0">
                            <?php the_field('homepage_donate_cta_blurb'); ?>
                        </p>
                    </div><!-- col -->
                    <div class="col text-lg-center">
                        <a href="<?php the_field('homepage_donate_cta_button_link'); ?>" class="btn btn-lg btn-primary"><?php the_field('homepage_donate_cta_button_title'); ?></a>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="bg-soft py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="h1 mb-2 mb-md-1">

                            <?php the_field('homepage_directories_section_title'); ?>
                        </h2>
                    </div><!-- col -->
                </div>
                <div class="row">
                    <div class="col-sm-6 text-center text-xl-left">
                        <div class="pr-lg-2 pr-xxxl-0">
                        <a href="<?php the_field('senior_housing_guide_link'); ?>"
                           class="d-flex justify-content-center align-items-center
                           fake-btn fake-btn--yellow text-dark lead font-weight-bold
                           mr-xxxl-2 mb-50
                           py-2 py-lg-5
                           p-md-2
                           px-1 px-xl-5 px-xxxl-7">
                            <span>SENIORS HOUSING GUIDE</span>
                        </a>
                        </div><!-- pr -->
                    </div><!-- col -->
                    <div class="col-sm-6 text-center text-xl-right">
                        <div class="pl-lg-2 pr-xxxl-0">
                        <a href="<?php the_field('home_support_directory'); ?>"
                           class="d-flex justify-content-center align-items-center
                           fake-btn fake-btn--orange text-white lead font-weight-bold
                           ml-xxxl-2 mb-50
                           py-2 py-lg-5
                           p-md-2
                           px-1 px-xl-5 px-xxxl-6 ">
                            <span>HOME SUPPORT DIRECTORY</span>
                        </a>
                        </div><!-- pl -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="pt-4 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php $mainsponsor = get_field('homepage_main_sponsor_section_logo', 'options');?>
                        <img src="<?php echo $mainsponsor['url']; ?>" alt="<?php echo $mainsponsor['alt']; ?>" class="img-fluid d-block">
                    </div><!-- col -->
                    <div class="col-lg-5">
                        <h2 class="h1"><?php the_field('homepage_main_sponsor_section_heading', 'options'); ?></h2>
                        <p><?php the_field('homepage_main_sponsor_section_blurb', 'options'); ?></p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <?php if (have_rows('supporters')) : ?>

            <section class="py-1 bg-soft">
                <div class="container">
                    <div class="row text-center">
                        <div class="col text-center pt-50">
                            <h2><?php the_field('supporters_section_title'); ?></h2>
                        </div><!-- col -->
                    </div><!-- row -->

                    <div class="owl-carousel" id="supporters-slider">

                        <?php while (have_rows('supporters')) : the_row(); ?>

                            <?php $supporterLogo = get_sub_field('supporter_logo'); ?>

                            <div class="item">

                                <?php if (get_sub_field('supporter_optional_website_link')): ?>
                                <a href="<?php the_sub_field('supporter_optional_website_link'); ?>"
                                   class="text-white mb-1" title="Visit supporter">
                                <?php endif; ?>
                                    <img src="<?php echo $supporterLogo['url']; ?>"
                                         alt="<?php echo $supporterLogo['alt']; ?>"
                                         class="img-fluid d-block"
                                    >
                                <?php if (get_sub_field('supporter_optional_website_link')): ?>
                                </a>
                                <?php endif; ?>

                            </div><!-- item-->

                        <?php endwhile; ?>

                    </div><!-- owl-carousel -->

                </div><!-- container -->
            </section>
        <?php endif; ?>

    </main>

<?php get_footer();
