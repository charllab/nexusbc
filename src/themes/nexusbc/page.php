<?php get_header(); ?>

    <!--page.php-->

    <main>
        <div class="container pb-2">
            <div class="row justify-content-start">
                <div class="col-12 col-lg-8">

                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>

                </div><!-- col-->
            </div><!-- row-->
        </div><!-- container-->
    </main>

<?php get_footer(); ?>