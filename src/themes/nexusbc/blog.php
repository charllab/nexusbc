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
            </div><!-- container -->

            <?php
            global $post;
            $args = array(
                'posts_per_page' => -1
            );

            $wp_query = new WP_Query();
            $wp_query->query($args);

            if (have_posts()) :
                echo '<div class="container mb-150">';
                echo '<div class="row">';

                while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <div class="col-xl-6">
                        <div class="container px-0">
                            <div class="py-250 pr-250">
                                <div class="border-shadow p-1">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('full', array('class' => 'd-block img-fluid mb-1 mb-md-0')); ?>
                                            </a>
                                        </div><!-- col -->
                                        <div class="col-md-7">
                                            <div class="py-50 pt-xl-1 pb-xl-2 px-150">
                                                <h2 class="blog-leader mb-250"><?php the_title(); ?></h2>
                                                <p class="smaller mb-250 font-weight-bold">
                                                    Posted: <?php echo get_the_date(); ?> </p>
                                                <div class="mb-150"><?php the_excerpt(); ?></div>
                                                <a href="<?php the_permalink(); ?>"
                                                   class="btn btn-primary mb-1 mb-md-0">Read more</a>
                                            </div><!-- py -->
                                        </div><!-- col -->
                                    </div><!-- row -->
                                </div><!-- border -->
                            </div><!-- py-250 pr-250 -->
                        </div><!-- container -->
                    </div><!-- col -->

                <?php endwhile;
                echo '</div><!-- row -->';
                echo '</div><!-- container -->';
            endif;
            wp_reset_query(); ?>

        </section>
    </main>

<?php get_footer(); ?>