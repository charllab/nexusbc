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

                        <div class="col-3 col-lg-2 text-center ">
                            <?php $director = get_the_post_thumbnail_url();
                            ?>
                            <div class="director-img mx-auto rounded mb-50"
                                <?php if (!empty($director)) : ?>
                                    style="
                                        background-image: url(<?php echo $director; ?>);
                                        background-size: cover;
                                        background-position: center"
                                <?php endif; ?>
                            >
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


    </main>

<?php get_footer(); ?>