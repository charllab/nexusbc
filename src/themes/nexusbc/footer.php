<footer>

    <section class="pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="pr-1 mb-1">
                        <h2 class="h3 text-white mb-125">GET IN TOUCH</h2>
                        <p><?php echo get_bloginfo('name'); ?></p>
                        <p class="mb-250"><a href="tel:+1<?php echo strip_tel(get_field('phone_number', 'option')); ?>" class="text-white font-weight-normal">Tel: <?php echo get_field('phone_number', 'option'); ?></a><br>
                        <?php if(get_field('fax_number', 'option')): ?>
                            <a href="fax:+1<?php echo strip_tel(get_field('fax_number', 'option')); ?>" class="text-white">Fax: <?php echo get_field('fax_number', 'option'); ?></a><br>
                        <?php endif; ?>
                        <a href="mailto:<?php echo get_field('email_address', 'option'); ?>" class="text-white">Email: <?php echo get_field('email_address', 'option'); ?></a></p>
                        </p>
                        <div class="social-links">
                            <?php while( have_rows('social_links', 'options') ): the_row(); ?>
                                <a class="social-link btn btn-link text-white px-0 mr-50" target="_blank" href="<?php the_sub_field('url'); ?>">
                                    <i class="<?php the_sub_field('icon_class'); ?> fa-lg">
                                        <span class="sr-only"><?php the_sub_field('label'); ?></span>
                                    </i>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div><!-- pr -->
                </div><!-- col -->
                <div class="col-md-6 col-lg-3">
                    <div class="pr-md-3 pr-lg-150">
                    <h2 class="h3 text-white mb-125">HOURS OF OPERATION</h2>
                    <p><?php the_field('hours_of_operation', 'option'); ?></p>
                    </div><!-- col -->
                </div><!-- col -->
                <div class="col-md-6 col-lg-3">
                    <div class="pr-md-3">
                        <h2 class="h3 text-white mb-125">JOIN OUR NEWSLETTER</h2>
                        <?php if(get_field('join_our_newsletter_blurb', 'option')): ?><p><?php the_field('join_our_newsletter_blurb', 'option'); ?></p>
                        <?php endif; ?>
                        <?php echo do_shortcode('[gravityform id="7" title="false" description="false"]'); ?>
                    </div><!-- pr -->
                </div><!-- col -->
                <div class="col-md-6 col-lg-3">
                    <h2 class="h3 text-white mb-125">OUR LOCATION</h2>
                    <p><?php the_field('physical_address', 'option')?><br>
                       <a href="<?php the_field('google_map_link', 'option');?>" class="text-white" target="_blank">Get Directions <i class="fas fa-external-link-alt ml-250"></i></a>
                    </p>
                    <?php if(get_field('custom_map', 'option')):?>
                    <?php $mapImage = get_field('custom_map', 'option'); ?>
                        <a href="<?php echo $mapImage['url']; ?>">
                            <img src="<?php echo $mapImage['url']; ?>" alt="<?php echo $mapImage['url']; ?>" class="img-fluid d-block mb-1">
                        </a>
                    <?php endif;?>

                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>

    <?php if(get_field('acknowledgement_of_territory', 'option')) : ?>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="px-lg-50 pt-1">
                        <p><?php the_field('acknowledgement_of_territory', 'option')?></p>
                    </div><!-- px -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <?php endif; ?>
    <section class="pt-1 border-top" style="border-color:#707070 !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center text-lg-left">
                    <p>&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?></p>
                </div><!-- col -->
                <div class="col-lg-4 text-center">
                    <p class="text-white">
                        <a href="<?php echo esc_url(home_url('/covid-19')); ?>" class="text-white">COVID-19</a> |
                        <a href="<?php echo esc_url(home_url('/terms-of-use')); ?>" class="text-white">Terms of Use</a> |
                        <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="text-white">Privacy Policy</a></p>
                </div><!-- col -->
                <div class="col-lg-4 text-center text-lg-right">
                    <p>Designed, Developed and Hosted by <a href="https://sproing.ca" target="_blank">Sproing&nbsp;Creative</a></p>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
</footer>

<!--allow custom donation embedding for post-->
<?php if( get_field('post_script')) {the_field('post_script');} ?>

<?php wp_footer(); ?>

</body>

</html>