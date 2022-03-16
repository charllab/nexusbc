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
                                            <!-- Create variable Link, that includes array with link info -->
                                            <?php $link = get_sub_field('hero_slide_button_link'); ?>
                                            <a href="<?php echo $link['url']; ?>"
                                               target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"
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
                    <div class="col text-center text-md-left">
                        <h2 class="h1 text-uppercase mb-1">News & Events</h2>
                    </div>
                </div><!-- row -->
            </div><!-- container -->

        <?php
        global $post;
        $args = array(
            'posts_per_page' => 6
        );

        $wp_query = new WP_Query();
        $wp_query->query($args);

        if (have_posts()) :
            echo '<div class="container mb-150">';
            echo '<div class="row">';

            while ($wp_query->have_posts()) : $wp_query->the_post();?>
            <div class="col-xl-6">
                <div class="container px-0">
                    <div class="row justify-content-center align-items-center py-50">
                        <div class="col">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', array('class' => 'd-block img-fluid mb-1 mb-md-0')); ?>
                            </a>
                        </div><!-- col -->
                        <div class="col-md-8">
                            <div class="py-50 px-75">
                                <h2 class="lead mb-250"><?php the_title(); ?></h2>
                                <p class="smaller mb-250 font-weight-bold">Posted: <?php echo get_the_date(); ?> </p>
                                <div class="mb-150"><?php the_excerpt();?></div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary mb-1 mb-md-0">Read more</a>
                            </div><!-- py -->
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- col -->

            <?php endwhile;
            echo '</div><!-- row -->';
            echo '</div><!-- container -->';
            endif;
            wp_reset_query(); ?>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 col-lg-4 col-xl-3 text-center">
                        <a href="<?php echo esc_url(home_url('/news-and-events')); ?>" class="d-flex justify-content-center align-items-center fake-btn fake-btn--orange text-white lead-me font-weight-bold mb-50 p-md-2 px-1 mb-1">
                            See All News & Events</a>
                    </div><!-- col -->
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
                        <a href="<?php the_field('homepage_donate_cta_button_link'); ?>"
                           class="btn btn-lg btn-primary"><?php the_field('homepage_donate_cta_button_title'); ?></a>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="py-3">
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
                               target="_blank"
                               class="d-flex justify-content-center align-items-center
                           fake-btn fake-btn--yellow text-dark lead-me font-weight-bold
                           mr-xxxl-2 mb-50
                           py-2 py-lg-5
                           p-md-2
                           px-1 px-xl-5 px-xxxl-7">
                                <span><?php the_field('senior_housing_guide_title'); ?></span>
                            </a>
                        </div><!-- pr -->
                    </div><!-- col -->
                    <div class="col-sm-6 text-center text-xl-right">
                        <div class="pl-lg-2 pr-xxxl-0">
                            <a href="<?php the_field('home_support_directory'); ?>"
                               target="_blank"
                               class="d-flex justify-content-center align-items-center
                           fake-btn fake-btn--orange text-white lead-me font-weight-bold
                           ml-xxxl-2 mb-50
                           py-2 py-lg-5
                           p-md-2
                           px-1 px-xl-5 px-xxxl-6 ">
                                <span><?php the_field('home_support_directory_title'); ?></span>
                            </a>
                        </div><!-- pl -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>


        <?php get_template_part('partials/main/supporters'); ?>


        <?php if (get_field('show')) : ?>
            <section class="pt-4 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php $mainsponsor = get_field('homepage_main_sponsor_section_logo'); ?>
                            <img src="<?php echo $mainsponsor['url']; ?>" alt="<?php echo $mainsponsor['alt']; ?>"
                                 class="img-fluid d-block">
                        </div><!-- col -->
                        <div class="col-lg-5">
                            <h2 class="h1"><?php the_field('homepage_main_sponsor_section_heading'); ?></h2>
                            <p><?php the_field('homepage_main_sponsor_section_blurb'); ?></p>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php endif; ?>

    </main>

<?php get_footer();
