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
            <div class="row justify-content-center">

                <div class="col-lg-3 text-center">
                    <h1><?php the_title(); ?></h1>
                </div><!-- col -->
            </div><!-- row -->

            <div class="row">

                <div class="col-lg-3 col-card">
                    <div class="card">
                        <a href="#"><img class="card-img-top" src="..." alt="Card image cap"></a>
                        <div class="card-body">
                            <h5 class="h3 text-center text-primary"><a href="#">Custom Post Type the_title()</a></h5>
                            <p class="card-text"><a href="#" class="text-body font-weight-normal">Custom Post Type the_excerpt()</a></p>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->

            </div><!-- row -->
        </div><!-- container -->

    </main>

<?php get_footer(); ?>