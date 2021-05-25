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
                                                        <p class="font-weight-bold">"<?php the_sub_field('about_quote_box_quotation'); ?>"</p>
                                                        <p class="font-weight-bold mb-50">&ndash; <?php the_sub_field('about_quote_box_author'); ?></p>
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

        <section class="mb-2">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7">
                        <p>We are always looking for new board members who understand our community and can harness their skills to help support our community resource centre. If you are interested in being involved with shaping our organization, we invite you to contact our Executive Director, Kelly Johnson </p>
                    </div><!-- col -->
                    <div class="col-lg-3">
                        <a href="#" class="btn btn-primary mb-1">I WANT TO BE INVOLVED</a>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="bg-dark py-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h2 class="h1 text-white">OUR MEMBERS</h2>
                        <p class="text-white">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                        <div class="p-3 bg-danger">
                            Form
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>


    </main>

<?php get_footer(); ?>