<?php

get_header();


$posts = get_posts(array(
    'post_type' => 'programs',
    'order' => 'ASC',
    'posts_per_page' => -1
));

?>

    page-programs.php

    <main>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                        <?php

                        foreach ($posts as $i => $post) :
                            setup_postdata($post);
                            $post_loopSlug = $post->post_name;
                            $tabName = strtolower(get_the_title());
                            $tabName = preg_replace('/[^A-Za-z0-9]/', "", $tabName);
                            ?>

                            <!--And with vertical pills https://getbootstrap.com/docs/4.0/components/navs/#tabs-->

                            <a class=""
                               data-toggle="collapse"
                               data-target="#collapse-<?php echo $tabName ?>"
                               aria-expanded="false"
                               aria-controls="collapseExample"
                               >

                                <span class="d-flex justify-content-xs-between align-items-center">
                                    <?php echo the_title(); ?>
                                </span>

                                </a>



                            <?php

                            wp_reset_postdata();

                        endforeach;
                        setup_postdata($post);
                        ?>

                </div><!-- col -->
                <div class="col-lg-8">
                    <?php

                    foreach ($posts as $i => $post) :
                        setup_postdata($post);
                        $post_loopSlug = $post->post_name;
                        $tabName = strtolower(get_the_title());
                        $tabName = preg_replace('/[^A-Za-z0-9]/', "", $tabName);
                        ?>

                        <div class="collapse panel-collapse" id="collapse-<?php echo $tabName ?>">
                            <div class="card card-body border-0 rounded-0">
                                <?php echo the_content(); ?>
                            </div>
                        </div>
                        <?php


                        wp_reset_postdata();

                        endforeach;
                    setup_postdata($post);
                    ?>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->

    </main>

<?php get_footer(); ?>