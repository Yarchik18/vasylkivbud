 <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Prompt&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="icon" type="image/x-icon" href="<?php echo carbon_get_theme_option('logo_footer')?>"/>
        <meta property="og:image" content="<?php echo bloginfo('template_url'); ?>/img/favicon.png"/>
        <?php
        wp_head() // в этом месте в дальнейшем у нас будет подключаться CSS сайта, настроенный в Theme Customizer
        ?>
        <title><?php echo get_bloginfo('title')?></title>
    </head>
    <body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container _container">
                <a href="#" class="header__logo">
                    <img src="<?php echo carbon_get_theme_option('logo'); ?>" alt="Logo">
                </a>
                <nav class="header__menu menu">
                    <div class="header__social">
                        <ul class="header__social_items">
                            <li class="item-header-social">
                                <a class="item-header-social__link" href="viber://add?number=<?php echo carbon_get_theme_option('viber')?>" title="Viber" onclick="gtag('event', 'click', {'event_category' : 'messenger'});">
                                    <img src="<?php echo bloginfo('template_url'); ?>/img/icons/social/viber.svg" alt="viber">
                                </a>
                            </li>
                            <li class="item-header-social">
                                <a class="item-header-social__link" href="tg://resolve?domain=<?php echo carbon_get_theme_option('telegram')?>" title="Telegram" onclick="gtag('event', 'click', {'event_category' : 'messenger'});">
                                    <img src="<?php echo bloginfo('template_url'); ?>/img/icons/social/telegram.svg" alt="telegram">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php wp_nav_menu( [
                        'container'       =>'',
                        'items_wrap'      => '<ul class="nav__list">%3$s</ul>',
                        'theme_location'  => 'top'
                    ] ); ?>
                    <div class="header__phone">
                        <div class="dropdown-numbers-container">
                        <div class="link-container">
                            <a href="tel:+38 096 233 17 93" class="dropdown-numbers-link">
                                +38 096 233 17 93</a>
                            <span class="numbers__dropdown-menu-arrow"></span>
                        </div>
                        <ul class="dropdown-numbers">
                            <?php
                            $phone_list = carbon_get_theme_option("phone_list");
                            foreach($phone_list as $value) {
                            ?>
                                <li>
                                    <a href="tel:<?php echo $value["phone_number"]; ?>">
                                        <?php echo $value["phone_number"]; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                        <span class="header-phone-text">Телефонуйте. Ми на зв'язку!</span>
                    </div>
                </nav>
                <div class="header__burger">
                    <div class="burger__body">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="shadow" id="shadow"></div>
            </div>
        </header>