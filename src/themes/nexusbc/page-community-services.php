<?php get_header();

while (have_posts()) :

    the_post(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-8">

                    <div class="pr-xl-2">

                        <?php the_content(); ?>

                        <h2 class="mb-1">Filter by category or search keywords</h2>

                        <div data-js-form="filter">
                            <?php
                            $categories = get_terms(array(
                                'post_type' => 'service-directories',
                                'taxonomy' => 'services_type',
                                'order' => 'ASC',
                                'exclude' => array(1),
                                'hide_empty' => false
                            ));
                            ?>
                            <ul class="list-unstyled d-flex flex-wrap">
                                <li class="d-flex">
                                    <a href="#servicesListings"
                                       data-category=""
                                       class="scrollable-anchor-offset js-filter-item px-75 py-250 bg-soft mr-250 mb-50 text-body font-weight-light filter-category">
                                        All (<?php echo $count_posts = wp_count_posts( 'service-directories' )->publish; ?>)
                                    </a>
                                </li>
                                <?php foreach ($categories as $category) : ?>
                                    <li class="d-flex">
                                        <a href="#servicesListings" data-category="<?php echo $category->term_id; ?>"
                                           class="scrollable-anchor-offset js-filter-item px-75 py-250 bg-soft mr-250 mb-50 text-body font-weight-light filter-category">
                                            <?php echo trim($category->name) . '&nbsp;' . '(' . $category->count . ')'; ?>
                                        </a>
                                    </li>
                                <?php endforeach;
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div><!-- filter -->

                        <div class="search-keywords mb-25">
                            <form data-js-form="filter" id="myForm">
                                <div class="form-row align-items-center">
                                <div class="col-md-8 col-lg-10">
                                    <fieldset class="group">
                                        <input class="form-control rounded-0 w-100 mb-150 mb-md-0" type="text" id="search-keyword" name="search-keyword" placeholder="Type here…">
                                    </fieldset>
                                </div><!-- col -->
                                <div class="col-md-4 col-lg-2">
                                <fieldset class="group">
                                    <button class="btn btn-primary ml-md-50 border-0 rounded-0">Filter</button>
                                    <input type="hidden" name="action" value="filter">
                                </fieldset>
                                </div><!-- col -->
                                </div><!-- flow row -->
                            </form>
                        </div><!-- search-keywords -->

                        <script>
                            // function printDiv(divName){
                            //     var printContents = document.getElementById(divName).innerHTML;
                            //     var originalContents = document.body.innerHTML;
                            //     document.body.innerHTML = printContents;
                            //     window.print();
                            //     document.body.innerHTML = originalContents;
                            // }

                            function printDiv(divName)
                            {
                                var divToPrint=document.getElementById(divName);
                                var newWin=window.open('','Print-Window');
                                newWin.document.open();
                                newWin.document.write('<html><body style="padding:45px; font-family:sans-serif" onload="window.print()"><p style="margin-bottom: 30px;">Provided by <strong>NexusBC Community Resource Centre</strong> | <a href="tel:+12505450585">250.545.0585</a> | <a href="https://nexusbc.ca">www.nexusbc.ca</a></p>'+divToPrint.innerHTML+'</body></html>');
                                newWin.document.close();
                                //setTimeout(function(){newWin.close();},10);
                                newWin.close();
                            }
                        </script>

                        <div class="js-filter mb-4" id="servicesListings">
                            <?php
                            $args = array(
                                'post_type' => 'service-directories',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                            );

                            $query = new WP_Query($args);

                            echo '<h2 class="h1 mb-2"><span class="mr-50">Showing listings for All' . ' ' . '(' . $query->found_posts . ')</span><a onclick="printDiv(\'all\')"  class="btn-print">Print All <i class="ml-250 fa fa-print fa-lg"></i></a></h2>';

                            echo '<div id="all">';

                            if ($query->have_posts()) :

                                while ($query->have_posts()) :
                                    $query->the_post();
                            ?>
                                <div class="mb-2 print-section" id="<?php echo strtolower(str_replace(' ', '', get_the_title()));?>">
                                    <h2><?php the_title(); ?> <a href="#" onclick="printDiv('<?php echo strtolower(str_replace(' ', '', get_the_title()));?>'); return false;"><i class="ml-250 fa fa-print fa-sm"></i></a></h2>

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
                                </div><!-- mb-1 -->

                                <hr class="mt-1 mb-2 border-top">

                                <?php endwhile;
                            endif;


                            echo '</div><!-- #all -->';

                            wp_reset_postdata();
                        endwhile;
                        ?>
                        </div><!-- js-filter -->
                    </div><!-- pr-xl-2 -->
                </div><!-- col -->
                <div class="col-lg-5 col-xl-4">

                    <?php if(get_field('get_listed_instruction')): ?>
                    <div class="ml-lg-2 mb-4">
                        <div class="pt-1 pb-75 px-2 bg-soft">
                        <?php the_field('get_listed_instruction'); ?>
                        </div><!-- bg-soft -->
                    </div><!-- ml-lg-2 -->
                    <?php endif; ?>

                </div><!-- col -->
            </div><!-- row -->
        </div><!-- row -->
    </main>


<?php get_footer(); ?>