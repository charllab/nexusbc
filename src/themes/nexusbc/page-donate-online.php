<?php get_header(); ?>

    <!--page.php-->

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <script id="ch_cdn_embed" type='text/javascript' src="https://www.canadahelps.org/secure/js/cdf_embed.js" charset='utf-8' data-language="en" data-page-id="61674" data-root-url="https://www.canadahelps.org" data-formtype="0" data-cfasync="false"></script>
                    <div class="pt-1 pb-2">
                        <?php the_content(); ?>
                    </div>

                </div><!-- col-->
            </div><!-- row-->
        </div><!-- container-->
    </main>

<?php get_footer(); ?>