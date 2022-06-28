<?php
    if(!is_front_page()){
        $checkHome = 'sticked position-relative';
    }
    ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Satisfy&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if (class_exists('woocommerce')) {
        global $woocommerce;
        $cart_count = $woocommerce->cart->get_cart_contents_count();
        $cart_total = $woocommerce->cart->get_total();
        $cart_link = wc_get_cart_url();
        $account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
    } else {
        $cart_count = $cart_total = $cart_link = $account_link = '';
    }
    $social_list =  tr_options_field('corsivalab_options.social_list');
    $d = get_theme_mod('custom_logo');
    $logo = get_attachment($d);
    $home_link = get_home_url();
    ?>
    <header class="header">
        <div class="navbar-overlay d-lg-none"></div>
        <div class="navbar-mobile d-lg-none">
            <nav class="menu" id="nav-toggle">
                <div class="close-mobile-menu">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'mobile-menu',
                                            'container' => false,
                                            //'container_class' => 'menu',
                                            'menu_class' => 'navbar',
                                            'walker' => new Default_Walker(),
                                            'menu_class' => 'menu-list'
                                        )
                                    );
                                    ?>

            </nav>
        </div>
        <div class="header-wrap <?php echo $checkHome;?>">
            <div class="container h-100">
                <div class="h-100 d-flex align-items-center justify-content-between" id="show-menu">
                    <div class="header-logo">
                        <?php
                            echo '<a href="' . $home_link . '"><img class="" src="' . $logo['src'] . '" alt="' . $logo['alt'] . '" /></a>';
                            ?>
                    </div>
                    <div class="header-menu">
                        <ul class="menu-list">
                            <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'main-menu',
                                            'menu_class' => 'menu-list'
                                        )
                                    );
                                    ?>
                        </ul>
                    </div>
                    <div class="header-icon">
                        <div class="icon">
                            <a href="<?php echo $account_link; ?>">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Logo _ Icons/Group 108.png"
                                    alt="">
                            </a>
                        </div>
                        <div class="icon cart-icon">
                            <a href="<?php echo $cart_link; ?>">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Logo _ Icons/Group 107.png"
                                    alt="">
                            </a>
                            <div class="cart-count">
                                <?php echo $cart_count?>
                            </div>
                        </div>
                        <div class="mobile d-block d-lg-none">
                            <div class="navbar-toggle container" onclick="myFunction(this)">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>