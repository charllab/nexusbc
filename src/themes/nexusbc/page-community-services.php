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
                                    <a href="#"
                                       data-category=""
                                       class="js-filter-item px-75 py-250 bg-soft mr-250 mb-50 text-body font-weight-light filter-category">
                                        All (<?php echo $count_posts = wp_count_posts( 'service-directories' )->publish; ?>)
                                    </a>
                                </li>
                                <?php foreach ($categories as $category) : ?>
                                    <li class="d-flex">
                                        <a href="#" data-category="<?php echo $category->term_id; ?>"
                                           class="js-filter-item px-75 py-250 bg-soft mr-250 mb-50 text-body font-weight-light filter-category">
                                            <?php echo trim($category->name) . '&nbsp;' . '(' . $category->count . ')'; ?>
                                        </a>
                                    </li>
                                <?php endforeach;
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div><!-- filter -->

                        <div class="search-keywords mb-25">
                            <form class="filter" data-js-form="search">
                                <div class="form-row align-items-center">
                                <div class="col-md-8 col-lg-10">
                                    <fieldset class="group">
                                        <input class="form-control rounded-0 w-100" type="text" id="search-keyword" name="search-keyword" placeholder="Type here…">
                                    </fieldset>
                                </div><!-- col -->
                                <div class="col-md-4 col-lg-2">
                                <fieldset class="group">
                                    <button class="btn btn-primary ml-50 border-0 rounded-0">Search</button>
                                    <input type="hidden" name="action" value="submit">
                                </fieldset>
                                </div><!-- col -->
                                </div><!-- flow row -->
                            </form>
                        </div><!-- search-keywords -->

                        <div class="js-filter">
                            <?php
                            $args = array(
                                'post_type' => 'service-directories',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                            );

                            $query = new WP_Query($args);

                            echo '<h2 class="h1 mb-2">Showing listings for All' . ' ' . '(' . $query->found_posts . ') <a href="#" class="btn-print ml-75">Print All <i class="ml-250 fa fa-print fa-lg"></i></a></h2>';

                            if ($query->have_posts()) :

                                while ($query->have_posts()) :
                                    $query->the_post();

                                    $movie_id = get_the_ID();
                                    $url = get_the_permalink();
                                    $title = get_the_title();
                                    $taxonomy = 'services_type';

                                    $post_terms = wp_get_object_terms( $movie_id, $taxonomy, array( 'fields' => 'ids' ) );

                                    // Separator between links.
                                    $separator = ', ';

                                    if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

                                        $term_ids = implode( ',' , $post_terms );

                                        $terms = wp_list_categories( array(
                                            'title_li' => '',
                                            'style'    => 'none',
                                            'echo'     => false,
                                            'taxonomy' => $taxonomy,
                                            'include'  => $term_ids
                                        ) );

                                        $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
                                    }
                            ?>

                                <div class="mb-4">
                                    <h2><?php the_title(); ?> <a href="#"><i class="ml-250 fa fa-print fa-sm"></i></a></h2>

                                    <?php the_field('services_provided'); ?>

                                    <p><b>Services available in:</b>
                                        <?php the_field('services_provided_locations'); ?>
                                    </p>

                                    <p class="mb-0"><b>Tel</b>: <?php the_field('phone_number'); ?></p>

                                    <?php if(get_field('email_address')): ?>
                                    <p class="mb-0"><b>Email</b>: <?php the_field('email_address'); ?></p>
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

                                <?php endwhile;
                            endif;
                            wp_reset_postdata();
                        endwhile;
                        ?>
                        </div><!-- target -->
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