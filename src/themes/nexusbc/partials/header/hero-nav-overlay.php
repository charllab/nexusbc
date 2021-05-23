<header id="header" class="hero-nav-overlay bg-dark">



    <nav class="navbar navbar-expand-xxxl navbar-light bg-soft py-1 py-lg-0 z-index-500 w-100">

        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div><!-- nav-logo -->

            <div class="ml-auto d-xs-flex justify-content-center justify-content-sm-end d-xxxl-none order-1 order-sm-2">
                <form id="searchForm" class="d-none d-sm-flex" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="input-group position-relative">
                        <input type="search" class="form-control border-0 rounded-0" autocomplete="off"
                               placeholder="Search…" name="s">
                        <div class="input-group-btn position-absolute btn-search">
                            <button class="btn btn-default border-0" type="submit">
                                <span class="sr-only">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="align-self-center d-none d-xs-flex">
                    <a href="#" class="btn btn-primary ml-175 border-0 rounded-0">Donate</a>
                </div>
            </div><!-- d-none d-xxxl-block -->

            <button class="navbar-toggler ml-150 order-1 order-sm-2" type="button" data-toggle="collapse" data-target=".mainnav-m"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="desktop-nav d-lg-flex d-none d-lg-block">
                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'mainnav',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ]); ?>

                <div class="d-none d-xxxl-flex">
                    <form id="searchForm" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="input-group position-relative">
                            <input type="search" class="form-control border-0 rounded-0" autocomplete="off"
                                   placeholder="Search…" name="s">
                            <div class="input-group-btn position-absolute btn-search">
                                <button class="btn btn-default border-0" type="submit">
                                    <span class="sr-only">Submit</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="align-self-center">
                        <a href="#" class="btn btn-primary ml-175 border-0 rounded-0">Donate</a>
                    </div>
                </div><!-- d-none d-xxxl-block -->
            </div><!-- desktop-nav -->

        </div><!-- container-->


    <div class="d-sm-none w-100 mt-1">
        <form id="searchForm" class="w-100" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group position-relative w-100">
                <input type="search" class="form-control border-0 rounded-0" autocomplete="off"
                       placeholder="Search…" name="s">
                <div class="input-group-btn position-absolute btn-search">
                    <button class="btn btn-default border-0" type="submit">
                        <span class="sr-only">Submit</span>
                    </button>
                </div>
            </div>
        </form>
    </div><!-- d-sm-none -->

    </nav>

    <div class="mainnav-m collapse navbar-collapse bg-primary d-xxxl-none">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container py-1',
            'container_id' => 'mainnav',
            'menu_class' => 'navbar-nav ml-auto',
            'fallback_cb' => '',
            'menu_id' => 'main-menu',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ]); ?>


    </div><!-- mainnav-m -->

    <?php if (is_front_page()) : ?>

        <?php if (have_rows('hero_slide')): ?>
            <div class="owl-carousel z-index-1 position-relative" id="hero-slide">

                <?php while (have_rows('hero_slide')) : the_row(); ?>

                    <?php $herosliderimageurl = get_sub_field('hero_slide_image'); ?>

                    <div class="hero-slide position-relative"
                         style="background: #3050A0 url(<?php echo $herosliderimageurl['sizes']['large']; ?>) no-repeat center center; background-size: cover;">
                        <div class="block__tint-overlay position-absolute h-100"></div>
                        <div class="item">
                            <div class="container position-relative hero-slide__container py-2 py-lg-8">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <h1 class="text-white">
                                            <?php the_sub_field('hero_slide_title'); ?>
                                        </h1>
                                        <p class="lead text-white mb-2 pr-lg-1"><?php the_sub_field('hero_slide_blurb'); ?></p>
                                        <?php if (get_sub_field('hero_slide_button_text')): ?>
                                            <a href="<?php the_sub_field('hero_slide_button_link'); ?>"
                                               class="btn btn-primary" class="text-white mb-1">
                                                <?php the_sub_field('hero_slide_button_text'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div><!-- owl-carousel -->

        <?php endif; ?>
    <?php endif; ?>

</header>