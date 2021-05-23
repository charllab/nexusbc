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

        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                    <div class="nav flex-column nav-pills"
                         id="v-pills-tab"
                         role="tablist"
                         aria-orientation="vertical">

                        <?php
                        $counter = 0;
                        foreach ($posts as $i => $post) :
                        setup_postdata($post);
                        $post_loopSlug = $post->post_name;
                        $tabName = strtolower(get_the_title());
                        $tabName = preg_replace('/[^A-Za-z0-9]/', "", $tabName);
                        $counter++;
                        ?>

                                <a class="nav-link <?php if ($counter == 1): ?>active<?php endif;?>"
                                   id="v-pills-<?php echo $tabName; ?>-tab"
                                   data-toggle="pill"
                                   href="#v-pills-<?php echo $tabName; ?>"
                                   role="tab"
                                   aria-controls="v-pills-home"
                                   aria-selected="true"
                                >
                                    <?php echo the_title(); ?>
                                </a>

                    <?php
                    wp_reset_postdata();
                    endforeach;
                    setup_postdata($post);
                    ?>

                    </div><!-- nav-pills -->
                </div><!-- col -->
                <div class="col-lg-8">
                    <div class="tab-content" id="v-pills-tabContent">

                    <?php
                    $counter = 0;
                    foreach ($posts as $i => $post) :
                    setup_postdata($post);
                    $post_loopSlug = $post->post_name;
                    $tabName = strtolower(get_the_title());
                    $tabName = preg_replace('/[^A-Za-z0-9]/', "", $tabName);
                    $counter++;
                    ?>

                        <div class="tab-pane fade show <?php if ($counter == 1): ?>active<?php endif;?>"
                             id="v-pills-<?php echo $tabName; ?>"
                             role="tabpanel"
                             aria-labelledby="v-pills-<?php echo $tabName; ?>-tab"
                        >
                            <h1><?php the_title(); ?></h1>
                            <?php echo the_content(); ?>
                        </div>

                    <?php
                    wp_reset_postdata();
                    endforeach;
                    setup_postdata($post);
                    ?>
                    </div><!-- tab-content -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->

    </main>

<?php get_footer(); ?>