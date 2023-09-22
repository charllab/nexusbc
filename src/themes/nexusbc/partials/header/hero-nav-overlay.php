<header id="header" class="hero-nav-overlay fixed-top bg-soft">

    <nav class="navbar navbar-expand-xxxl navbar-light py-1 py-lg-0 z-index-500 w-100">

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
                <!--<div class="align-self-center d-none d-xs-flex">-->
                <!--    <a href="--><?php //echo esc_url(home_url('/donate-online')); ?><!--" class="btn btn-primary ml-175 border-0 rounded-0">Donate</a>-->
                <!--</div>-->
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
                    <!--<div class="align-self-center">-->
                    <!--    <a href="--><?php //echo esc_url(home_url('/donate-online')); ?><!--" class="btn btn-primary ml-175 border-0 rounded-0">Donate</a>-->
                    <!--</div>-->
                </div><!-- d-none d-xxxl-block -->
            </div><!-- desktop-nav -->

        </div><!-- container-->

    <div class="d-sm-none w-100 mt-1">
        <form id="searchForm" class="w-100" method="get" action="<?php echo esc_url(site_url('/')); ?>">
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
        <section class="bg-dark">
                <?php wp_nav_menu([
                    'theme_location' => 'quaternary',
                    'container_class' => 'container py-1',
                    'container_id' => 'subnav',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'sub-menu',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ]); ?>
        </section>


    </div><!-- mainnav-m -->

    <section class="m-shadow m-border-bottom--dark bg-dark d-none d-xxxl-block">
        <div class="container">
            <?php wp_nav_menu([
                'theme_location' => 'quaternary',
                'container_class' => '',
                'container_id' => 'subnav',
                'menu_class' => 'navbar-nav d-xxl-flex flex-xxl-row ml-auto justify-content-xxl-end',
                'fallback_cb' => '',
                'menu_id' => 'sub-menu',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ]); ?>
        </div><!-- container -->
    </section>

</header>