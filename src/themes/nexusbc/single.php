<?php
get_header();
?>

    <main class="py-1 py-lg-2">

        <?php
        // Start the loop.
        while (have_posts()) : the_post(); ?>

            <?php $date = get_field('event_date');
            $date1 = date("j", strtotime($date));
            $date2 = date("M", strtotime($date));
            $date3 = date("F j, l", strtotime($date));
            ?>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="eventsingleimg-wrapper py-1 pt-md-3 px-sm-1 px-lg-3">
                            <div class="card-dateblock d-flex flex-column justify-content-center text-center">
                                <span><?php echo $date1; ?></span>
                                <?php echo $date2; ?>
                            </div><!-- card-dateblock -->
                            <img src="<?php the_field('event_image')['sizes']['eventimage']; ?>" alt="<?php echo the_title(); ?>"
                                 class="img-fluid d-block blog-article-image mx-auto">
                        </div><!-- eventsingleimg-wrapper -->
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row justify-content-center mb-2 mb-lg-4">
                    <div class="col-12 col-sm-10 col-lg-9">
                        <h1 class="blog-article-header"><?php echo the_title(); ?></h1>
                        <h3><?php echo $date3; ?>, <?php the_field('event_starttime'); ?>
                            to <?php the_field('event_endtime'); ?></h3>
                        <?php the_content(); ?>

                    </div><!-- col -->
                </div><!-- row -->

                <div class="row justify-content-center mb-2">
                    <div class="col-12 text-center">
                        <a href="<?php bloginfo('url'); ?>/events" class="btn btn-primary">Back To All Events</a>
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row justify-content-center blog-nav-single">
                    <div class="col-6 col-lg-5">
                        <span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'sproingcreative') . '</span> %title'); ?></span>
                    </div><!-- col -->
                    <div class="col-6 col-lg-5 d-flex justify-content-end blog-nav-single-right">
                        <span class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'sproingcreative') . '</span>'); ?></span>
                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- container -->

        <?php endwhile; // end of the loop. ?>

    </main>

<?php get_footer();