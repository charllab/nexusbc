<?php

get_header();

$posts = get_posts(array(
    'post_type' => 'programs',
    'order' => 'ASC',
    'posts_per_page' => -1
));


?>

    <!--single-programs.php-->

    <main class="pt-2 pt-lg-4">


        <section class="bg-soft-btm-logo">

            <div class="container">
                <div class="row">

                    <div class="col-lg-8 order-lg-1">


                        <h1><?php the_title(); ?></h1>
                        <div class="pb-1 long-link-wraps">
                            <?php echo the_content(); ?>
                        </div>

                        <div class="d-lg-none py-2">
                            <?php $mainsponsor = get_field('homepage_main_sponsor_section_logo', 'options');?>
                            <img src="<?php echo $mainsponsor['url']; ?>" alt="<?php echo $mainsponsor['alt']; ?>" class="img-fluid d-block mx-auto">
                        </div>


                    </div><!-- col -->

                    <div class="col-lg-4 order-lg-0">

                        <div class="pr-lg-25">

                            <div class="bg-program-nav-logo mb-2">
                                <h2 class="h1 text-white text-center pt-150 pb-1 mb-0">Programs</h2>
                                <div class="nav flex-column nav-pills"
                                     id="v-pills-tab"
                                     role="tablist"
                                     aria-orientation="vertical">

                                    <?php

                                    global $wp_query;

                                    $currentID = $wp_query->post->ID;
                                    //echo $currentID;


                                    foreach ($posts as $i => $post) :

                                        setup_postdata($post);

                                        // Get post ID, if nothing found set to NULL
                                        $custom_post_id = $post->ID;
                                        //echo $custom_post_id;

                                        ?>

                                        <a class="nav-link rounded-0 font-weight-normal text-white text-uppercase border-bottom <?php if( $custom_post_id === $currentID):?>active<?php endif; ?>"
                                           href="<?php echo the_permalink(); ?>"
                                        >
                                            <?php echo the_title(); ?>
                                        </a>

                                        <?php
                                        wp_reset_postdata();
                                    endforeach;
                                    setup_postdata($post);
                                    ?>

                                </div><!-- nav-pills -->

                                <div class="the-hub p-1 py-2">
                                    <a href="<?php the_field('hub_link', 'option'); ?>" target="_blank">
                                        <img src="<?php the_field('hub_logo', 'option'); ?>"
                                             alt="Connect with our job search resources hub"
                                             class="img-fluid d-block mx-auto">
                                    </a>
                                </div>


                            </div><!-- bg-dark -->


                        </div><!-- pr -->
                    </div><!-- col -->

                </div><!-- row -->
            </div><!-- container -->

        </section>

        <?php if(get_field('per_program_sponsor')) : ?>

        <section class="py-2 d-none d-lg-block">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8 text-center">
                        <?php $mainsponsor = get_field('per_program_sponsor');?>
                        <img src="<?php echo $mainsponsor['url']; ?>" alt="<?php echo $mainsponsor['alt']; ?>" class="img-fluid d-block mx-auto">
                    </div>
                </div>
            </div>
        </section>

        <?php endif; ?>

    </main>

<?php get_footer(); ?>