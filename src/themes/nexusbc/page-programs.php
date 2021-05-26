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
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="h3 text-center text-primary">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->

            </div><!-- row -->
        </div><!-- container -->

    </main>

<?php get_footer(); ?>