<?php
/**
 *
 * Template Name: Contact Page
 *
 **/
get_header(); ?>

    <main>

        <div class="py-3">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">

                        <?php if (have_posts()) : ?>

                            <?php /* Start the Loop */ ?>

                            <?php while (have_posts()) : the_post(); ?>

                                <h2 class="text-capitalize"><?php the_title(); ?></h2>

                                <?php the_content(); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div><!-- col -->

                    <div class="col-lg-5">
                        <div class="pt-3 pb-2 px-2 bg-light">
                            <h2>Contact Information</h2>
                            <?php
                            $removethese = array("(", " ", ")", "-");
                            ?>
                            <table>
                                <tr>
                                    <td><strong>Phone: </strong></td>
                                    <td>
                                        <a href="tel:+1<?php echo strip_tel(get_field('primary_number', 'option')); ?>"><?php echo get_field('primary_number', 'option'); ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pr-1"><strong>Toll Free: </strong></td>
                                    <td>
                                        <a href="tel:+1<?php echo strip_tel(get_field('secondary_number', 'option')); ?>"><?php echo get_field('secondary_number', 'option'); ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail: </strong></td>
                                    <td>
                                        <a href="mailto:<?php echo get_field('primary_email', 'option'); ?>"><?php echo get_field('primary_email', 'option'); ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Address: </strong></td>
                                    <td><?php echo get_field('physical_address', 'option'); ?></td>
                                </tr>
                            </table>
                        </div><!-- bg-light -->

                        <div class="px-0">
                            <?php
                            echo get_field('map_embed_code', 'option');
                            ?>
                        </div><!-- px-0 -->
                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- container -->
        </div>

    </main>

<?php get_footer();