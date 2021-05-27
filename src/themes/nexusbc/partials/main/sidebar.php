<div class="col-lg-5 col-xl-4">

    <div class="d-none d-lg-block ml-lg-2">

        <div class="pt-1 pb-75 px-2 bg-soft">
            <h2 class="h3">GET IN TOUCH</h2>
            <p class="mb-250"><a
                    href="tel:+1<?php echo strip_tel(get_field('phone_number', 'option')); ?>">Tel: <?php echo get_field('phone_number', 'option'); ?></a><br>
                <?php if (get_field('fax_number', 'option')): ?>
                    <a href="fax:+1<?php echo strip_tel(get_field('fax_number', 'option')); ?>">Fax: <?php echo get_field('fax_number', 'option'); ?></a>
                    <br>
                <?php endif; ?>
                <a href="mailto:<?php echo get_field('email_address', 'option'); ?>">Email: <?php echo get_field('email_address', 'option'); ?></a>
            </p>
            </p>
            <h2 class="h3 mt-1 mb-0">SOCIAL MEDIA</h2>
            <div class="social-links">
                <?php while (have_rows('social_links', 'options')): the_row(); ?>
                    <a class="social-link btn btn-link text-primary px-0 mr-50" target="_blank"
                       href="<?php the_sub_field('url'); ?>">
                        <i class="<?php the_sub_field('icon_class'); ?> fa-lg">
                            <span class="sr-only"><?php the_sub_field('label'); ?></span>
                        </i>
                    </a>
                <?php endwhile; ?>
            </div><!-- social-links -->

            <h2 class="h3 mt-50">OUR LOCATION</h2>
            <p><?php the_field('physical_address', 'option') ?><br>
                <a href="">Get Directions <i class="fas fa-external-link-alt ml-250"></i></a>
            </p>
            <?php if (get_field('custom_map', 'option')): ?>
                <?php $mapImage = get_field('custom_map', 'option'); ?>
                <a href="<?php echo $mapImage['url']; ?>">
                    <img src="<?php echo $mapImage['url']; ?>" alt="<?php echo $mapImage['url']; ?>"
                         class="img-fluid d-block mb-1">
                </a>
            <?php endif; ?>
        </div><!-- bg-soft -->
    </div><!-- ml-->

</div><!-- col-->