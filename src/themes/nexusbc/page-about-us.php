<?php get_header(); ?>

    <!--page-about-us.php-->

    <main>

        <div class="container py-2">
            <div class="row">
                <div class="col-12">

                    pingpongs content will go here


                    <?php the_content(); ?>

                </div><!-- col-->
            </div><!-- row-->
        </div><!-- container-->


        <section class="py-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col col-lg-7 text-center pb-1 pb-lg-3">
                        <div class="px-lg-75">
                            <h2 class="h1">OUR BOARD</h2>
                            <p>
                                NexusBC Community Resource Centre is governed by a community-based, volunteer Board of
                                Directors. A big thank you goes to this amazing Board of Directors:
                            </p>
                        </div><!-- px-->
                    </div><!-- col-->
                </div><!-- row-->

                <div class="row justify-content-center align-items-center">
                    <?php
                    global $post;
                    $args = array(
                        'post_type' => 'directors',
                        'posts_per_page' => -1
                    );

                    $wp_query = new WP_Query();
                    $wp_query->query($args);

                    // The 2nd Loop
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post(); ?>

                        <div class="col-6 col-md-3 col-lg-2 text-center ">

                            <?php $director = get_the_post_thumbnail_url();
                            ?>
                            <div class="director-img mx-auto rounded mb-50"
                                 style="
                                     width: 796px;
                                 <?php if (!empty($director)) : ?>
                                     background-image: url(<?php echo $director; ?>);
                                     background-size: cover;
                                     background-position: center;
                                 <?php endif; ?>
                                     "
                            >
                                <div class="inner" style="padding-bottom: 96.7336683%;">
                                    <div class="content"></div>
                                </div>
                            </div>
                            <h3 class="text-uppercase mb-0"><?php the_title(); ?></h3>
                            <div class="text-secondary">
                                <?php the_content(); ?>
                            </div>

                        </div><!-- col -->

                    <?php }
                    wp_reset_query(); ?>
                </div>

            </div><!-- container-->
        </section>


        <?php if (have_rows('quote_slider')) : ?>

            <section class="mb-2">
                <div class="container bg-secondary">
                    <div class="row">
                        <div class="col">

                            <div class="owl-carousel" id="quote_slider">

                                <?php while (have_rows('quote_slider')) : the_row(); ?>

                                    <div class="item">
                                        <div class="container px-0">
                                            <div class="row no-gutters justify-content-center">
                                                <div class="col-lg-10">
                                                    <div class="text-center text-white pt-150 pb-75">
                                                        <p class="font-weight-bold">
                                                            "<?php the_sub_field('about_quote_box_quotation'); ?>"</p>
                                                        <p class="font-weight-bold mb-50">
                                                            &ndash; <?php the_sub_field('about_quote_box_author'); ?></p>
                                                    </div><!-- text-center -->
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- item-->

                                <?php endwhile; ?>

                            </div><!-- owl-carousel -->

                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>

        <?php endif; ?>

        <?php if (get_field('get_involved_text')): ?>

            <section class="mb-2">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-7">
                            <div class="pr-lg-1">
                                <p><?php the_field('get_involved_text'); ?></p>
                            </div><!-- pr -->
                        </div><!-- col -->
                        <div class="col-lg-3">

                            <?php if (get_field('get_involved_button_link')): ?>
                                <a href="<?php the_field('get_involved_button_link'); ?>"
                                   class="btn btn-primary mb-1"><?php the_field('get_involved_button_text'); ?></a>
                            <?php endif; ?>

                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>

        <?php endif; ?>

        <section class="bg-dark py-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h2 class="h1 text-white"><?php the_field('our_members_section_heading'); ?></h2>
                        <?php if (get_field('our_members_section_text')): ?>
                        <div class="px-lg-10">
                            <p class="text-white">
                                <?php the_field('our_members_section_text'); ?>
                            </p>
                        </div><!-- px -->
                        <?php endif; ?>
                        <div class="p-3 bg-danger">
                            Form
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="py-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <div class="px-50">
                            <h2><?php the_field('about_our_staff_section_heading'); ?></h2>
                            <p><?php the_field('about_our_staff_section_blurb'); ?></p>
                        </div><!-- px -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="pb-2 pb-lg-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">

                    <div class="col-lg-5 mb-1 mb-lg-0">
                        <?php the_field('about_our_staff_meet_the_manage_section'); ?>
                    </div><!-- col -->
                    <div class="col-lg-6">

                        <?php if (have_rows('teamtestimonial_slider')) : ?>

                            <section class="bg-soft pb-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <img
                                                src="<?php bloginfo('template_url'); ?>/images/svg-blue-left-quotes.svg"
                                                alt=""
                                                class="img-fluid d-block pl-250 pt-1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <div class="owl-carousel" id="teamtestimonial_slider">

                                                <?php while (have_rows('teamtestimonial_slider')) : the_row(); ?>

                                                    <div class="item">
                                                        <div class="px-2">
                                                            <p><?php the_sub_field('team_testimonials'); ?></p>
                                                        </div>
                                                    </div><!-- item-->

                                                <?php endwhile; ?>

                                            </div><!-- owl-carousel -->

                                        </div><!-- col -->
                                    </div><!-- row -->
                                </div><!-- container -->
                            </section>

                        <?php endif; ?>

                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="bg-soft py-2 pb-lg-3">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center mb-1 mb-xxl-2">
                        <h2 class="h1 mb-1"><?php the_field('about_our_funders_section_heading'); ?></h2>
                        <p><?php the_field('about_our_funders_section_text'); ?></p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->


            <div class="reverse-container py-xxl-4 py-xxxl-2">
                <div class="container position-relative">
                    <div class="row justify-content-center justify-content-xxl-between align-items-center">
                        <div class="col-lg-10 col-xxl-6 p-xxl-2 text-center text-xxl-left">
                            <div class="pr-lg-4 mb-1 pb-xxl-0">
                                <?php the_field('about_our_funders_gratitude_block'); ?>
                            </div><!-- pr -->
                        </div><!-- col -->
                    </div><!-- row -->

                    <div class="funder-logos">
                        <img src="<?php the_field('about_our_funders_logos'); ?>" alt="NexusBC Funders logos" class="img-fluid d-block mx-auto">
                    </div><!-- funder-logos -->

                </div><!-- container -->

            </div><!-- position-relative -->







        </section><!-- bg-soft -->


    </main>

<?php get_footer(); ?>