<?php
get_header();
?>

<!--page-search.php-->

<main class="pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1>Search results for &ldquo;<?php echo esc_html(get_search_query(false)); ?>&rdquo;</h1>

                <?php if (have_posts()) : ?>

                    <?php /* Start the Loop */ ?>

                    <?php while (have_posts()) : the_post(); ?>


                        <div class="post-item py-1">

                            <h2 class="mb-50"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


                            <div class="border-bottom">
                                <?php the_excerpt(); ?>
                                <p><a class="btn btn-primary my-50" href="<?php the_permalink(); ?>">Continue
                                        reading</a></p>
                            </div><!-- border-bottom -->

                        </div><!-- post-item -->

                    <?php endwhile; ?>

                <?php else: ?>

                    <h2>No results match that search.</h2>

                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
