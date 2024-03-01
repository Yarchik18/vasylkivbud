<?php
get_header('single');
?>

    <style>


        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: 80%;
            width: 100%;
        }

        .mySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 0px 0;
            width: 100%;
        }

        .mySwiper .swiper-slide {
            height: 100%;
            opacity: 0.4;
            margin-top: 10px;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            cursor: po;
        }


        .product-images {
            display: flex;
            flex-direction: column;
        }

    </style>
    <main>
        <section class="section-product">
            <div class="container">
                <div class="row product-block">
                    <div class="col-lg-6">
                        <div class="product-images">
                            <div
                                    style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                    class="swiper mySwiper2"
                            >
                                <div class="swiper-wrapper">
                                    <?php
                                    $sing_product_img = carbon_get_the_post_meta('sing_product_img');
                                    foreach ($sing_product_img as $sing_product_i) {
                                        ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo $sing_product_i['img']; ?>"/>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    $sing_product_img = carbon_get_the_post_meta('sing_product_img');
                                    foreach ($sing_product_img as $sing_product_i) {
                                        ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo $sing_product_i['img']; ?>"/>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="buy-column">
                            <div class="title">
                                <?php echo the_title(); ?>
                            </div>
                            <div class="model information"><span><?php echo pll__('Модель:'); ?></span> <?php echo carbon_get_the_post_meta('sing_product_model'); ?></div>
                            <div class="availability information">
                                <span><?php echo pll__('Наявність:'); ?></span> <?php echo carbon_get_the_post_meta('sing_product_availability'); ?>
                            </div>
                            <div class="glass-type information"><span><?php echo pll__('Вид скла:'); ?></span> <?php echo carbon_get_the_post_meta('sing_product_gl_type'); ?></div>
                            <div class="amount-container">
                                <div class="amount-body">
                                    <div class="btn-less amount__btn">
                                        <a href="#"><img src="img/less.svg" alt="Less"></a>
                                    </div>
                                    <div class="amount">1</div>
                                    <div class="btn-more amount__btn">
                                        <a href="#"><img src="img/more.svg" alt="More"></a>
                                    </div>
                                </div>
                                <div class="price">
                                    <?php echo pll__('від');?>
                                    <span>
                                                             <?php echo carbon_get_post_meta($post->ID, 'sing_product_price'); ?>
                                                        </span>
                                    <?php echo carbon_get_post_meta($post->ID,'sing_product_size');?>
                                </div>
                            </div>
                            <div class="main-button buy-button" >
                                <a href="#" data-toggle="modal" data-target="#consultation-modal" data-name="<?php the_title();?>"><?php echo pll__('Замовити'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description-block">
                    <div class="description-column">
                        <div class="column-title">
                            <?php echo pll__('Детальний опис'); ?>
                        </div>
                        <div class="main-text">


                            <?php
                                the_content();
                            ?>
                        </div>
                    </div>
                    <div class="additional-services-column">
                        <div class="additional-services-container">
                            <img src="<?php echo bloginfo('template_url'); ?>/img/catalog-flower.webp" alt="Plant" class="background-image">
                            <div class="additional-services-body">
                                <div class="column-title">
                                    <?php echo pll__('Додаткові послуги:'); ?>
                                </div>
                                <ul class="services-list">
                                   <?php $add_services = carbon_get_theme_option('add_services'); ?>
                                    <?php foreach ($add_services as $ph) { ?>
                                        <li>
                                            <div class="service"><?php echo $ph['text_'.pll_current_language()];?></div>
                                            <div class="price"><?php echo pll__('від'); ?> <?php echo $ph['price']; ?> грн.</div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="form main-form">
                                    <div class="form-title">
                                        <?php echo pll__('Потрібна додакова інформація? <br>Залиште свій номер телефону.'); ?>
                                    </div>
                                    <?php echo do_shortcode('[contact-form-7 id="565" title="Без названия"]'); ?>
                                    <p class="form__privacy-policy">
                                        <?php echo pll__('Натискаючи на кнопку, я даю згоду на обробку своїх персональних даних'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>













        <?php $related = carbon_get_the_post_meta('related');
        if($related){
        ?>

        <section class="section-similar-products">
            <div class="container">
                <div class="main-title"><?php echo pll__('Cхожі товари'); ?></div>
                <div class="products-slider-container">
                    <div class="similar-products-slider swiper-container">
                        <div class="similar-products-slider__wrapper swiper-wrapper">


                            <?php  foreach ($related as $ph) {
                                $related_post = get_post($ph['match_home']);
                                ?>

                            <div class="slider__slide swiper-slide">
                                <div class="slide-image">
                                    <img src="img/product-image.png" alt="Product image">
                                </div>
                                <div class="title">
                                 <?php echo $related_post->post_title;?>
                                </div>
                                <div class="price">
                                    12 200 грн.
                                </div>
                                <div class="slide-button">
                                    <a href="#"><?php echo pll__('Замовити'); ?></a>
                                </div>
                            </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div class="similar-products-slider__btn-container">
                        <div class="similar-products-slider__button-prev swiper-button-prev"><img
                                    src="img/slider-arrow-left.svg"></div>
                        <div class="similar-products-slider__button-next swiper-button-next"><img
                                    src="img/slider-arrow-right.svg"></div>
                    </div>
                </div>
            </div>
        </section>
            <?php  }?>
    </main>
<?php /*<main class="main">
        <div class="section_rent">
            <div class="container">
                <div class="breadcrumbs_container">
                    <div class="bredcrumb">
                        <?php breadcrumbs(); ?>
                    </div>
                </div>
                <div class="auto_element-w-wr">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-xs-12">

                            <div class="card_top">
                                <div class="auto_el-em">
                                    <?php $model_car = carbon_get_theme_option('model_car');
                                    $alias = carbon_get_post_meta(get_the_ID(), 'model_car');
                                    $model_car = (_getParam($model_car, $alias)); ?>
                                    <img src="<?php echo $model_car['img']; ?>">
                                </div>
                                <div class="auto_el-cl">
                                    <?php
                                    $categories = get_the_category($post->ID);

                                    echo $categories[0]->name;
                                    //var_dump($categories);
                                    ?>
                                </div>
                            </div>
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <?php $car_img = carbon_get_post_meta(get_the_ID(), 'car_img');
                                    foreach ($car_img as $car_i):?>
                                        <div class="swiper-slide">
                                            <div class="auto_card-img"><img
                                                        src="<?php echo wp_get_attachment_image_src($car_i, 'full')[0]; ?>">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-button-next s_c">
                                    <svg width="14" height="24" viewBox="0 0 14 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.1937 11.3417L2.11141 0.259476C1.74453 -0.0948533 1.1599 -0.0846801 0.80557 0.282203C0.459899 0.640103 0.459899 1.20747 0.80557 1.56532L11.2349 11.9946L0.80557 22.424C0.445018 22.7846 0.445018 23.3692 0.80557 23.7298C1.16623 24.0904 1.75081 24.0904 2.11141 23.7298L13.1937 12.6476C13.5542 12.2869 13.5542 11.7023 13.1937 11.3417Z"
                                              fill="#E9E9E9"/>
                                    </svg>
                                </div>
                                <div class="swiper-button-prev s_c">
                                    <svg width="14" height="24" viewBox="0 0 14 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.806335 12.6583L11.8886 23.7405C12.2555 24.0949 12.8401 24.0847 13.1944 23.7178C13.5401 23.3599 13.5401 22.7925 13.1944 22.4347L2.7651 12.0054L13.1944 1.57603C13.555 1.21542 13.555 0.630787 13.1944 0.27018C12.8338 -0.090372 12.2492 -0.090372 11.8886 0.27018L0.806335 11.3524C0.445783 11.7131 0.445784 12.2977 0.806335 12.6583Z"
                                              fill="#E9E9E9"/>
                                    </svg>
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php $car_img = carbon_get_post_meta(get_the_ID(), 'car_img');
                                    foreach ($car_img as $car_i):?>
                                        <div class="swiper-slide">
                                            <div class="auto_c-s-img"><img
                                                        src="<?php echo wp_get_attachment_image_src($car_i, 'medium')[0]; ?>">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-xs-12  ">
                            <div class="card_element">
                                <div class="title_custom"><span class="line"><span><?php the_title(); ?></span></span>
                                </div>
                                <div class="auto_el-desc">
                                    <?php $volume = carbon_get_theme_option('volume');
                                    $alias = carbon_get_post_meta(get_the_ID(), 'volume');
                                    $volume = (_getParam($volume, $alias));
                                    echo $volume['text']; ?>
                                    / <?php $fuel = carbon_get_theme_option('fuel');
                                    $alias = carbon_get_post_meta(get_the_ID(), 'fuel_type');
                                    $fuel = (_getParam($fuel, $alias));
                                    echo $fuel[wp_globus_translate_array('text')]; ?>
                                    / <?php $transmission = carbon_get_theme_option('transmission');
                                    $alias = carbon_get_post_meta(get_the_ID(), 'transmission');
                                    $transmission = (_getParam($transmission, $alias));
                                    echo $transmission[wp_globus_translate_array('text')]; ?>
                                </div>
                                <div class="auto_el-desc-icons">
                                    <div class="auto_el-d">
                                        <img src="<?php echo bloginfo('template_url'); ?>/img/car.svg">
                                        <span>
                                        <?php echo carbon_get_post_meta(get_the_ID(), 'doors'); ?>
                                    </span>
                                    </div>
                                    <div class="auto_el-d">
                                        <img src="<?php echo bloginfo('template_url'); ?>/img/people.svg">
                                        <span><?php echo carbon_get_post_meta(get_the_ID(), 'places'); ?></span>
                                    </div>
                                    <div class="auto_el-d">
                                        <img src="<?php echo bloginfo('template_url'); ?>/img/box.svg">
                                        <span><?php echo carbon_get_post_meta(get_the_ID(), 'baggage_big'); ?></span>
                                    </div>
                                    <div class="auto_el-d">
                                        <img src="<?php echo bloginfo('template_url'); ?>/img/clas.svg">
                                        <span><?php echo carbon_get_post_meta(get_the_ID(), 'baggage_small'); ?></span>
                                    </div>
                                    <div class="auto_el-d">
                                        <img src="<?php echo bloginfo('template_url'); ?>/img/cond.svg">
                                        <span>
                                        <?php echo carbon_get_post_meta(get_the_ID(), 'climat'); ?>
                                    </span>
                                    </div>
                                </div>
                                <div class="cart_el-des">
                                    <div class="cart_el-line">
                                        <div class="cart_el-type">
                                            <?php echo wp_globus_translate_array_string('Тип кузова', 'Тип кузова', 'Body type'); ?>
                                        </div>
                                        <div class="cart_el-res">
                                            <?php $body_type = carbon_get_theme_option('body_type');
                                            $alias = carbon_get_post_meta(get_the_ID(), 'body_type');
                                            $body_type = (_getParam($body_type, $alias));
                                            echo $body_type[wp_globus_translate_array('text')]; ?>
                                        </div>
                                    </div>
                                    <div class="cart_el-line">
                                        <div class="cart_el-type">
                                            <?php echo wp_globus_translate_array_string('Двигун', 'Двигатель', 'Engine'); ?>
                                        </div>
                                        <div class="cart_el-res">
                                            <?php $volume = carbon_get_theme_option('volume');
                                            $alias = carbon_get_post_meta(get_the_ID(), 'volume');
                                            $volume = (_getParam($volume, $alias));
                                            echo $volume['text']; ?>
                                        </div>
                                    </div>
                                    <div class="cart_el-line">
                                        <div class="cart_el-type">
                                            <?php echo wp_globus_translate_array_string('Тип трансмісії', 'Тип трансмиссии', 'Transmission type'); ?>
                                        </div>
                                        <div class="cart_el-res"><?php $transmission = carbon_get_theme_option('transmission');
                                            $alias = carbon_get_post_meta(get_the_ID(), 'transmission');
                                            $transmission = (_getParam($transmission, $alias));
                                            echo $transmission[wp_globus_translate_array('text')]; ?> </div>
                                    </div>
                                    <div class="cart_el-line">
                                        <div class="cart_el-type">
                                            <?php echo wp_globus_translate_array_string('Потужність, к.с.', 'Мощность, л.с.', 'Power, h.p.'); ?>
                                        </div>
                                        <div class="cart_el-res">
                                            <?php echo carbon_get_post_meta(get_the_ID(), 'horsepower'); ?>
                                        </div>
                                    </div>
                                    <div class="cart_el-line">
                                        <div class="cart_el-type">
                                            <?php echo wp_globus_translate_array_string('Витрата палива (середній)', ' Расход топлива (средний)', 'Fuel consumption (average)'); ?>

                                        </div>
                                        <div class="cart_el-res">
                                            <?php echo carbon_get_post_meta(get_the_ID(), 'fuel_consumption'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="title_el-c"><span class="line"><span>

                                <?php echo wp_globus_translate_array_string('Вартість оренди', 'Стоимость аренды', 'Rent price'); ?>
                            </span></span></div>
                                <div class="cart_table">
                                    <div class="cart_row">
                                        <div class="cart_th">
                                            1-3 <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                        <div class="cart_th">
                                            4-9 <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                        <div class="cart_th">
                                            10-25 <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                        <div class="cart_th">
                                            26+ <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                        <div class="cart_th">  <?php echo wp_globus_translate_array_string('Застава', 'Залог', 'Pledge'); ?></div>
                                    </div>
                                    <div class="cart_row">
                                        <div class="cart_tr">
                                            <div class="t_head">
                                                1-3 <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                            <div class="t_text"> <?php echo getPrice(carbon_get_post_meta($post->ID, 'rent_price_1'), $currency) ?>
                                                <span>/  <?php echo wp_globus_translate_array_string('доба', 'сутки', 'Day'); ?></span>
                                            </div>
                                        </div>
                                        <div class="cart_tr">
                                            <div class="t_head">
                                                4-9 <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                            <div class="t_text"><?php echo getPrice(carbon_get_post_meta($post->ID, 'rent_price_2'), $currency) ?>
                                                <span>/  <?php echo wp_globus_translate_array_string('доба', 'сутки', 'Day'); ?></span>
                                            </div>
                                        </div>
                                        <div class="cart_tr">
                                            <div class="t_head">
                                                10-25 <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                            <div class="t_text"><?php echo getPrice(carbon_get_post_meta($post->ID, 'rent_price_3'), $currency) ?>
                                                <span>/  <?php echo wp_globus_translate_array_string('доба', 'сутки', 'Day'); ?></span>
                                            </div>
                                        </div>
                                        <div class="cart_tr">
                                            <div class="t_head">
                                                26+ <?php echo wp_globus_translate_array_string('діб', 'суток', 'Day'); ?></div>
                                            <div class="t_text"><?php echo getPrice(carbon_get_post_meta($post->ID, 'rent_price_4'), $currency) ?>
                                                <span>/  <?php echo wp_globus_translate_array_string('доба', 'сутки', 'Day'); ?></span>
                                            </div>
                                        </div>
                                        <div class="cart_tr">
                                            <div class="t_head">  <?php echo wp_globus_translate_array_string('Застава', 'Залог', 'Pledge'); ?></div>
                                            <div class="t_text"><?php echo getPrice(carbon_get_post_meta($post->ID, 'rent_price_5'), $currency) ?>
                                                <span>/  <?php echo wp_globus_translate_array_string('доба', 'сутки', 'Day'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btns_cart">
                                    <a href="#"
                                       class="btn_main mod_open" data-name="<?php the_title(); ?>">  <?php echo wp_globus_translate_array_string('Забронювати автомобіль', 'Забронировать автомобиль', 'Book a car'); ?></a>
                                    <a href="#"
                                       class="tr_btn mod_open" data-name="<?php the_title(); ?>">  <?php echo wp_globus_translate_array_string('Забронювати автомобіль', 'Бронировать в 1 клик', 'Book a car'); ?></a>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tabs">
                                <div class="tabs__nav">
                                    <a class="tabs__link tabs__link_active"
                                       href="#content-1">  <?php echo wp_globus_translate_array_string('Опис', 'Описание', 'Description'); ?></a>
                                    <a class="tabs__link"
                                       href="#content-3">  <?php echo wp_globus_translate_array_string('Відео', 'Видео', 'Video'); ?></a>
                                    <a class="tabs__link"
                                       href="#content-4">  <?php echo wp_globus_translate_array_string('Умови оренди', 'Условия аренды', 'Rent terms'); ?></a>
                                </div>
                                <div class="tabs__content">
                                    <div class="tabs__pane tabs__pane_show" id="content-1">
                                        <?php echo apply_filters('the_content', wpGlobusTranslatePost(get_the_ID(), 'cars_description')); ?>
                                    </div>
                                    <div class="tabs__pane" id="content-3">
                                        <?php echo apply_filters('the_content', wpGlobusTranslatePost(get_the_ID(), 'cars_video')); ?>
                                    </div>
                                    <div class="tabs__pane" id="content-4">
                                        <?php echo apply_filters('the_content', wpGlobusTranslatePost(get_the_ID(), 'cars_term')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  </div>
            <div class="section"> -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="auto_element-w-wr">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-xs-12">
                                    <div class="title_custom"><span class="line"><span>
                                <?php echo wpGlobusTranslatePost(get_the_ID(), 'cars_have_questions'); ?>
                            </span></span></div>
                                    <div class="text_f-top">

                                        <?php echo wpGlobusTranslatePost(get_the_ID(), 'cars_have_questions_more'); ?>
                                        <?php $phone = carbon_get_theme_option('phone'); ?>
                                        <a href="tel:<?php echo $phone['0']['text']; ?>"
                                           class=""><?php echo $phone['0']['text']; ?></a>

                                    </div>
                                    <div class="form-inl">

                                        <?php echo do_shortcode('[contact-form-7 id="195" title="Страница машины_РУ"]'); ?>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-5 col-md-5 col-xs-12"> -->
                                <div class="images_fon-b">
                                    <img src="<?php echo bloginfo('template_url'); ?>/img/c_fon.png">
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script>
        $('.mod_open').click(function () {
            $('[type="hidden"]').val($(this).data('name'));
        });
    </script>
    <script type="text/javascript">
        var $tabs = function (target) {
            var
                _elemTabs = (typeof target === 'string' ? document.querySelector(target) : target),
                _eventTabsShow,
                _showTab = function (tabsLinkTarget) {
                    var tabsPaneTarget, tabsLinkActive, tabsPaneShow;
                    tabsPaneTarget = document.querySelector(tabsLinkTarget.getAttribute('href'));
                    tabsLinkActive = tabsLinkTarget.parentElement.querySelector('.tabs__link_active');
                    tabsPaneShow = tabsPaneTarget.parentElement.querySelector('.tabs__pane_show');
                    // если следующая вкладка равна активной, то завершаем работу
                    if (tabsLinkTarget === tabsLinkActive) {
                        return;
                    }
                    // удаляем классы у текущих активных элементов
                    if (tabsLinkActive !== null) {
                        tabsLinkActive.classList.remove('tabs__link_active');
                    }
                    if (tabsPaneShow !== null) {
                        tabsPaneShow.classList.remove('tabs__pane_show');
                    }
                    // добавляем классы к элементам (в завимости от выбранной вкладки)
                    tabsLinkTarget.classList.add('tabs__link_active');
                    tabsPaneTarget.classList.add('tabs__pane_show');
                    document.dispatchEvent(_eventTabsShow);
                },
                _switchTabTo = function (tabsLinkIndex) {
                    var tabsLinks = _elemTabs.querySelectorAll('.tabs__link');
                    if (tabsLinks.length > 0) {
                        if (tabsLinkIndex > tabsLinks.length) {
                            tabsLinkIndex = tabsLinks.length;
                        } else if (tabsLinkIndex < 1) {
                            tabsLinkIndex = 1;
                        }
                        _showTab(tabsLinks[tabsLinkIndex - 1]);
                    }
                };

            _eventTabsShow = new CustomEvent('tab.show', {detail: _elemTabs});

            _elemTabs.addEventListener('click', function (e) {
                var tabsLinkTarget = e.target;
                // завершаем выполнение функции, если кликнули не по ссылке
                if (!tabsLinkTarget.classList.contains('tabs__link')) {
                    return;
                }
                // отменяем стандартное действие
                e.preventDefault();
                _showTab(tabsLinkTarget);
            });

            return {
                showTab: function (target) {
                    _showTab(target);
                },
                switchTabTo: function (index) {
                    _switchTabTo(index);
                }
            }

        };

        $tabs('.tabs');
    </script>

 */ ?>
<?php
get_footer(); // подключаем подвал
?>