<?php
get_header();
?>

<!--index.php-->
<h1>this is service-directories</h1>
<main class="pb-2">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-xl-8">
                <div class="pr-xl-2">

                <h1>This page is only for quick content entry testing</h1>
                <p>Please test your final output on the <a href="<?php echo esc_url(home_url('/community-services')); ?>" target="_blank">Community Service Directories</a> page.</p>
                <br>

                <h2><?php the_title(); ?></h2>

                <?php the_field('services_provided'); ?>

                <p><b>Services available in:</b>
                    <?php the_field('services_provided_locations'); ?>
                </p>

                <p class="mb-0"><b>Tel</b>: <a href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a></p>

                <?php if(get_field('email_address')): ?>
                    <p class="mb-0"><b>Email</b>: <a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></p>
                <?php endif; ?>

                <?php if(get_field('website_url')): ?>
                    <p class="mb-0"><b>Website</b>: <a href=" <?php the_field('website_url'); ?>" target="_blank">
                            <?php the_field('website_url'); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if(get_field('rates')): ?>
                    <p><b>Hourly rate</b>: <?php the_field('rates'); ?></p>
                <?php endif; ?>

                </div><!-- pr -->
            </div><!-- col-->

            <?php get_template_part('partials/main/sidebar'); ?>

        </div><!-- row -->
    </div><!-- container -->
</main>

<?php get_footer(); ?>
