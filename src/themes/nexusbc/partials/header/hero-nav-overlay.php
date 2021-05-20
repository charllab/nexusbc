<header id="header" class="hero-nav-overlay bg-dark">

    <nav class="navbar navbar-expand-xxxl navbar-light bg-soft">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div><!-- nav-logo -->

            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=".mainnav-m"
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
                    'walker' => new understrap_WP_Bootstrap_Navwalker(),
                ]); ?>
                <form id="searchForm" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="input-group position-relative">
                        <input type="search" class="form-control border-0 rounded-0" autocomplete="off" placeholder="Search…" name="s">
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
            </div><!-- desktop-nav -->

        </div><!-- container-->
    </nav>

    <div class="mainnav-m collapse navbar-collapse">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container',
            'container_id' => 'mainnav',
            'menu_class' => 'navbar-nav ml-auto',
            'fallback_cb' => '',
            'menu_id' => 'main-menu',
            'walker' => new understrap_WP_Bootstrap_Navwalker(),
        ]); ?>

    </div><!-- mainnav-m -->

    <?php if (is_front_page()) : ?>

        <?php if (have_rows('hero_slide')): ?>
            <div class="owl-carousel" id="hero-slide">

                <?php while (have_rows('hero_slide')) : the_row(); ?>

                    <?php $herosliderimageurl = get_sub_field('hero_slide_image'); ?>

                    <div class="hero-slide"
                         style="background: #3050A0 url(<?php echo $herosliderimageurl['sizes']['large']; ?>) no-repeat center center; background-size: cover;">
                        <div class="block__tint-overlay"></div>
                        <div class="item">
                            <div class="container hero-slide__container py-2 py-lg-8">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <h1 class="text-white">
                                            <?php the_sub_field('hero_slide_title'); ?>
                                        </h1>
                                        <p class="lead text-white mb-125 pr-lg-1"><?php the_sub_field('hero_slide_blurb'); ?></p>
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