<?php if (have_rows('supporters', 'option')) : ?>

    <section class="py-1 bg-soft">
        <div class="container">
            <div class="row text-center">
                <div class="col text-center pt-50">
                    <h2><?php the_field('supporters_section_title'); ?></h2>
                </div><!-- col -->
            </div><!-- row -->

            <div class="owl-carousel" id="supporters-slider">

                <?php while (have_rows('supporters', 'option')) : the_row(); ?>

                    <?php $supporterLogo = get_sub_field('supporter_logo'); ?>

                    <div class="item">

                        <?php if (get_sub_field('supporter_optional_website_link')): ?>
                        <a href="<?php the_sub_field('supporter_optional_website_link'); ?>"
                           class="text-white mb-1" title="Visit supporter">
                            <?php endif; ?>
                            <img src="<?php echo $supporterLogo['url']; ?>"
                                 alt="<?php echo $supporterLogo['alt']; ?>"
                                 class="img-fluid d-block"
                            >
                            <?php if (get_sub_field('supporter_optional_website_link')): ?>
                        </a>
                    <?php endif; ?>

                    </div><!-- item-->

                <?php endwhile; ?>

            </div><!-- owl-carousel -->

        </div><!-- container -->
    </section>
<?php endif; ?>