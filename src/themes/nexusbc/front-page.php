<?php get_header(); ?>

    <!--front-page.php-->
    <main>

        <?php if (have_rows('hero_slide')): ?>
            <div class="owl-carousel z-index-1 position-relative" id="hero-slide">

                <?php while (have_rows('hero_slide')) : the_row(); ?>

                    <?php $herosliderimageurl = get_sub_field('hero_slide_image'); ?>

                    <div class="hero-slide position-relative"
                         style="background: #3050A0 url(<?php echo $herosliderimageurl['sizes']['large']; ?>) no-repeat center center; background-size: cover;">
                        <div class="block__tint-overlay position-absolute h-100"></div>
                        <div class="item">
                            <div class="container position-relative hero-slide__container py-2 py-lg-8">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
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

                    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

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

                        <?php wp_reset_postdata(); endwhile; ?>

                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="bg-dark py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="h1 text-white">
                            Help Us Transform Lives
                        </h2>
                        <p class="lead text-white mb-2 mb-lg-0">
                            It is donors like you that enable our most treasured community members
                            to be cared for and supported so they can live their very best lives.
                        </p>
                    </div><!-- col -->
                    <div class="col text-lg-center">
                        <a href="#" class="btn btn-lg btn-primary">Donate</a>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="bg-soft py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="h1 mb-2 mb-md-1">
                            OUR DIRECTORIES
                        </h2>
                    </div><!-- col -->
                </div>
                <div class="row">
                    <div class="col-sm-6 text-center text-xl-left">
                        <a href="#"
                           class="d-flex justify-content-center align-items-center mr-xxxl-2 mb-50 py-2 px-1 p-md-2 py-lg-5 px-xl-5 px-xxxl-7 fake-btn fake-btn--yellow text-dark lead font-weight-bold">
                            <span>SENIORS HOUSING GUIDE</span>
                        </a>
                    </div><!-- col -->
                    <div class="col-sm-6 text-center text-xl-right">
                        <a href="#"
                           class="d-flex justify-content-center align-items-center ml-xxxl-2 mb-50 py-2 px-1 p-md-2 py-lg-5 px-xl-5 px-xxxl-7 fake-btn fake-btn--orange text-white lead font-weight-bold">
                            <span>HOME SUPPORT DIRECTORY</span>
                        </a>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        Main Sponsor block
                    </div><!-- col -->
                    <div class="col-lg-5">
                        <h2 class="h1">MAIN SPONSOR</h2>
                        <p>NexusBC Community Resource Centre is a registered, charitable organization
                            that began in 1988 by providing employment-related services to individuals
                            in the North Okanagan. Since that time, we have grown, evolved and
                            expanded our services to deliver our mandate of connecting people to
                            resources in order to promote a healthy and sustainable community. </p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="py-1">
            <div class="container">
                <?php if (have_rows('supporter_slider')): ?>
                    <div class="owl-carousel" id="supporter-slider">

                        <?php while (have_rows('supporter_slider')) : the_row(); ?>

                            <?php $supportsliderimageurl = get_sub_field('supporter_logo'); ?>

                            <div class="item">

                                <a href="<?php the_sub_field('hero_slide_button_link'); ?>"
                                   class="btn btn-primary" class="text-white mb-1">
                                    <span class="sr-only">Client name</span>
                                </a>

                            </div><!-- item-->

                        <?php endwhile; ?>

                    </div><!-- owl-carousel -->

                <?php endif; ?>
            </div><!-- container -->
        </section>

    </main>

<?php get_footer();
