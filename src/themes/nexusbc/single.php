<?php get_header(); ?>

    <!--singles.php-->

    <main class="pb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1><?php the_title();?></h1>
                    <?php the_content();?>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </main>

<?php get_footer(); ?>