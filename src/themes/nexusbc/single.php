<?php get_header(); ?>

    <!--singles.php-->

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php the_title();?>
                    <?php the_content();?>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </main>

<?php get_footer(); ?>