<?php

get_header();


$posts = get_posts(array(
    'post_type' => 'programs',
    'order' => 'ASC',
    'posts_per_page' => -1
));

?>

    <!--page-programs.php-->

    <main>

        <section class="bg-soft-big-logo">

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-3 text-center">
                        <h1 class="mb-2"><?php the_title(); ?></h1>
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row">

                    <?php
                    foreach ($posts as $i => $post) :
                        setup_postdata($post);
                        ?>

                        <div class="col-md-6 col-lg-4 col-xl-3 col-card">
                            <div class="card border-0 mb-2">
                                <a href="<?php echo the_permalink(); ?>">
                                    <!--<img class="card-img-top" src="--><?php //the_post_thumbnail_url();
                                    ?><!--" alt="Card image cap">-->
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded-top')); ?>
                                </a>
                                <div class="card-body">
                                    <h5 class="h3 text-center text-primary">
                                        <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                                    </h5>
                                    <?php $nopexcerpt = get_the_excerpt(); ?>
                                    <p class="card-text mb-50">
                                        <a href="<?php echo the_permalink(); ?>"
                                           class="text-body font-weight-normal"><?php echo $nopexcerpt; ?></a>
                                    </p>
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div><!-- col -->

                        <?php
                        wp_reset_postdata();
                    endforeach;
                    setup_postdata($post);
                    ?>

                </div><!-- row -->
            </div><!-- container -->

        </section>

    </main>

<?php get_footer(); ?>