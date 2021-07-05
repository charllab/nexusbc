<?php
/**
 *
 * Template Name: Blog
 *
 */


get_header(); ?>

    <!--blog.php-->

    <main>
        <section class="py-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="h1 text-uppercase mb-2">News & Events</h2>
                    </div>
                </div><!-- row -->
                <div class="row">

                    <?php
                    global $post;

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'posts_per_page' => 9,
                        'paged' => $paged

                    );

                    $wp_query = new WP_Query();
                    $wp_query->query($args);

                    // The 2nd Loop
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post(); ?>

                        <div class="col-md-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', array('class' => 'd-block img-fluid rounded-top')); ?>

                                <div
                                    class="bg-primary w-100 d-block text-center py-1 px-2 rounded-bottom text-white mb-2">
                                    <?php
                                    $thetitle = $post->post_title; /* or you can use get_the_title() */
                                    $getlength = strlen($thetitle);
                                    $thelength = 32;
                                    echo substr($thetitle, 0, $thelength);
                                    if ($getlength > $thelength) echo "&hellip;";
                                    ?>
                                </div>

                            </a>
                        </div><!-- col -->

                    <?php } ?>

                </div><!-- row -->
            </div><!-- container -->

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8 text-center">
                        <nav aria-label="Page navigation">

                            <?php bootstrap_pagination(); ?>

                        </nav>
                    </div><!-- col-->
                </div><!-- row -->

            </div><!-- container -->
        </section>
    </main>

<?php get_footer(); ?>