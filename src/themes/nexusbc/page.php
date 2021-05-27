<?php get_header(); ?>

    <!--page.php-->

    <main>
        <div class="container pb-2">
            <div class="row justify-content-start">

                <?php get_template_part('partials/main/content'); ?>
                <?php get_template_part('partials/main/sidebar'); ?>

            </div><!-- row-->
        </div><!-- container-->
    </main>

<?php get_footer(); ?>