<?php get_header(); ?>

    <!--page.php-->

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>

                </div><!-- col-->
            </div><!-- row-->
        </div><!-- container-->
    </main>

<?php get_footer(); ?>