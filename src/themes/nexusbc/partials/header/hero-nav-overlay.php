<header id="header" class="hero-nav-overlay bg-dark">
    <a href="" target="_blank" class="btn btn-light rounded-0 mb-4 d-block d-lg-none">
        Call To Action
    </a>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=".mainnav-m" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="d-lg-flex flex-lg-column d-none d-lg-block">
                <div id="top-buttons" class="d-flex ml-auto mb-2 justify-content-end align-items-center">
                    <a class="btn btn-link text-white my-auto mr-2" href="tel:<?php echo strip_tel(get_field('phone_number', 'options')); ?>"><?php the_field('phone_number', 'options'); ?></a>

                    <div class="social-links mr-4">
                        <?php while( have_rows('social_links', 'options') ): the_row(); ?>
                            <a class="social-link btn btn-link px-1xx text-white" target="_blank" href="<?php the_sub_field('url'); ?>">
                                <i class="<?php the_sub_field('icon_class'); ?> fa-lg">
                                    <span class="sr-only"><?php the_sub_field('label'); ?></span>
                                </i>
                            </a>
                        <?php endwhile; ?>
                    </div>

                    <a href="" target="_blank" class="btn my-auto btn-light">
                        Call To Action
                    </a>
                </div>

                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'mainnav',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new understrap_WP_Bootstrap_Navwalker(),
                ]); ?>
            </div>
        </div>
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

        <div class="container">
            <a class="btn btn-link text-white px-0" href="tel:<?php echo strip_tel(get_field('phone_number', 'options')); ?>"><?php the_field('phone_number', 'options'); ?></a>

            <div class="social-links">
                <?php while( have_rows('social_links', 'options') ): the_row(); ?>
                    <a class="social-link btn btn-link text-white px-0 mr-2" target="_blank" href="<?php the_sub_field('url'); ?>">
                        <i class="<?php the_sub_field('icon_class'); ?> fa-2x">
                            <span class="sr-only"><?php the_sub_field('label'); ?></span>
                        </i>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <section class="section section--lg">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-7 col-xl-6">
                    <h2 class="h1 text-white">Maecenas sed diam eget</h2>
                    <p class="lead text-muted">
                        Sed posuere consectetur est at lobortis. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
                    </p>
                </div>
            </div>
        </div>
    </section>
</header>