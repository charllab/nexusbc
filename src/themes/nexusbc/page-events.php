<?php
/**
 *
 * Template Name: Events Page
 *
 */
global $post;
get_header(); ?>

    <main>

        <div class="container py-2 py-lg-3">
            <div class="row">
                <div class="col-12">
                    <h1 class="h2"><?php the_title(); ?></h1>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row justify-content-between">

                <div class="col-12 col-lg-8 pr-lg-2">
                    <div class="row">

                        <?php
                        // Init args
                        $args = [
                            'post_type' => 'post',
                            'posts_per_page' => 10,
                            'meta_key' => 'calendar_date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                        ];

                        $wp_query = null;
                        $wp_query = new WP_Query($args);

                        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                            <?php $date = get_field('event_date');
                            $date1 = date("j", strtotime($date));
                            $date2 = date("M", strtotime($date));
                            $date3 = date("F j, l", strtotime($date));
                            ?>

                            <div class="col-12 col-lg-6 mb-1 frontpagecards-events d-flex">
                                <div class="card">
                                    <div class="card-dateblock d-flex flex-column justify-content-center text-center">
                                        <span><?php echo $date1; ?></span>
                                        <?php echo $date2; ?>
                                    </div><!-- card-dateblock -->
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="card-img-top"
                                             src="<?php echo the_field('event_thumbnail')['sizes']['homepageevents']; ?>"
                                             alt="<?php the_title(); ?> photo">
                                    </a>
                                    <div class="card-body d-flex flex-column">
                                        <h3 class="card-title"><?php the_title(); ?></h3>
                                        <a href="<?php the_permalink(); ?>" class="mt-auto">View Event
                                            <i class="fas fa-arrow-right"></i></a>
                                    </div><!-- card-body -->
                                    <div class="card-timeblock">
                                        <p class="mb-0"><i
                                                    class="far fa-clock"></i> <?php the_field('event_starttime'); ?>
                                            to <?php the_field('event_endtime'); ?></p>
                                    </div><!-- card-timeblock -->
                                </div><!-- card -->
                            </div><!-- col -->

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    </div><!-- row -->
                    <?php get_template_part('template-parts/content/content', 'newslettersignup-a'); ?>
                    <?php get_template_part('template-parts/content/content', 'newslettersignup-b'); ?>
                    <div class="row">

                    </div>

                </div><!-- col -->

                <div class="col-12 col-lg-4 px-lg-1 d-none d-lg-block">
                    <div class="row justify-content-center">

                        <?php get_template_part('template-parts/content/content', 'servingside-a'); ?>

                    </div><!-- row -->
                </div><!-- col -->

            </div><!-- row -->

            <?php if ($wp_query->post_count > 10) { ?>

                <?php if ($paged > 1) { ?>
                    <div class="row justify-content-center blog-nav-single">
                        <div class="col-6 col-lg-5">
                            <div class="prev"><?php next_posts_link('&larr; Previous Posts'); ?></div>
                        </div><!-- col -->
                        <div class="col-6 col-lg-5 d-flex justify-content-end blog-nav-single-right">
                            <div class="next"><?php previous_posts_link('Newer Posts &rarr;'); ?></div>
                        </div><!-- col -->
                    </div><!-- row -->
                <?php } else { ?>
                    <div class="row blog-nav-single">
                        <div class="col-6 col-lg-5">
                            <div class="prev"><?php next_posts_link('&larr; Previous Posts'); ?></div>
                        </div><!-- col -->
                    </div><!-- row -->
                <?php } ?>
            <?php } ?>

            <?php wp_reset_postdata(); ?>

    </main>

<?php get_footer();