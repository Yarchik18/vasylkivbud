<?php
/**
 * Template Name: Главная
 */
get_header();
?>

    <main class="page">
        <section class="page__main-block main-block">
            <div class="main-block__container _container">
                <div class="main-block__body">
                    <h1 class="main-block__title">
                        БУДІВНИЦТВО<br>ТА <span class="right">БУДІВЕЛЬНІ <br> &nbsp &nbsp МАТЕРІАЛИ</span></h1>
                    <div class="main-block__text">
                        <?php echo carbon_get_the_post_meta("main_subtext"); ?>
                    </div>
                    <div class="main-block__buttons">
                        <a class="main-block__button" href="#" data-toggle="modal" data-target="#consultation-modal" target="_blank">Замовити дзвінок</a>
                    </div>
                </div>
            </div>
            <div class="main-block__image _ibg">
                <img src="<?php echo bloginfo('template_url'); ?>/img/back.jpg" alt="back">
            </div>
            <div class="main-block__photo _ibg2 _container">
                <img src="<?php echo carbon_get_the_post_meta("main_bg_img") ?>" alt="photo">
            </div>
        </section>
        <section class="page__gallery gallery">
            <div class="gallery__container _container">
                <div class="gallery__header header-block__right">
                    <div class="header-block__body">
                        <div class="header-block__right_arrow">
                            <a href="#materials-block" >
                                <img class="header-block__right_arrow-item" src="<?php echo bloginfo('template_url'); ?>/img/headerblock/arrow.png" alt="arrow">
                            </a>
                        </div>
                        <div class="header-block__right_content">
                            <h2 class="header-block__right_content-text">БУДІВЕЛЬНІ<br>   МАТЕРІАЛИ</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="materials__items" id="materials-block">
                <div class="_container">
                    <div class="materials__item item-materials">
                        <?php
                        $materials_list = carbon_get_the_post_meta('materials_list');
                        foreach ($materials_list as $value) {
                            ?>
                            <div class="item-materials__content materials_content" style="background-image: url(<?php echo $value['materials_photo'];?>)">
                                <div class="item-materials__top">
                                    <div class="item-materials__title"><?php echo $value["materials_title"]; ?></div>
                                    <div class="item-materials__lists">
                                        <ul class="item-materials__list list">
                                            <?php echo $value["materials_text"]; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item-materials__bottom">
                                    <a href="#" class="item-materials__button" data-toggle="modal" data-target="#consultation-modal" target="_blank">Замовити</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="prices__body" id="prices-block">
                <div class="_container">
                    <div class="prices__content content-prices">
                        <div class="content-prices__text"><?php echo carbon_get_the_post_meta('materials_text_bottom'); ?></div>
                        <a href="#" data-toggle="modal" data-target="#consultation-modal" target="_blank" class="rozruh__button">Розрахувати</a>
                    </div>
                </div>
            </div>
        </section>
<!--        <section class="page__stages stages">-->
<!--            <div class="stages__container _container">-->
<!--                <div class="stages__header header-block__left">-->
<!--                    <div class="header-block__body">-->
<!--                        <div class="header-block__left_content">-->
<!--                            <h2 class="header-block__left_content-text"> ПОСЛУГИ ВИДИ <br>&nbsp &nbsp РОБІТ</h2>-->
<!--                        </div>-->
<!--                        <div class="header-block__left_arrow">-->
<!--                            <a href="#stages-block" class="header-block__left_arrow-item">-->
<!--                                <img src="--><?php //echo bloginfo('template_url'); ?><!--/img/headerblock/arrow.png" alt="arrow">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="stages__body" id="stages-block">-->
<!--                <div class="stages__container _container">-->
<!--                    <ul class="stages__list list-stages ">-->
<!--                        --><?php
//                        $type_work_list = carbon_get_the_post_meta('type_work_list');
//                        foreach ($type_work_list as $value) {
//                        ?>
<!--                        <li class="list-stages__item item-list-stages">-->
<!--                            <span class="item-list-stages__number">--><?php //echo $value["type_work_number"]; ?><!--</span>-->
<!--                            <div class="item-list-stages__content content-item-stages">-->
<!--                                <h3 class="content-item-stages__title">--><?php //echo $value["type_work_title"]; ?><!--</h3>-->
<!--                                <p class="content-item-stages__text">-->
<!--                                    --><?php //echo $value["type_work_subtitle"]; ?>
<!--                                </p>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        --><?php //} ?>
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
        <section class="page__tariffs tariffs">
            <div class="tariffs__container _container">
                <div class="tariffs__header header-block__right">
                    <div class="header-block__body">
                        <div class="header-block__right_arrow">
                            <a href="#tariffs-block" class="header-block__right_arrow-item">
                                <img src="<?php echo bloginfo('template_url'); ?>/img/headerblock/arrow.png" alt="arrow">
                            </a>
                        </div>
                        <div class="header-block__right_content">
                            <h2 class="header-block__right_content-text">ТАРИФИ<br>ТА РОЗЦІНКИ</h2>
                        </div>
                    </div>
                </div>
            </div>
                <div class="tariffs__items" id="tariffs-block">
                    <div class="_container">
                    <div class="tariffs__item item-tariffs">
                        <?php
                        $tariffs_list = carbon_get_the_post_meta('tariffs_list');
                        foreach ($tariffs_list as $value) {
                            ?>
                            <div class="item-tariffs__content" style="background-image: url(<?php echo carbon_get_the_post_meta('cart_photo')?>)">
                                <div class="item-tariffs__top">
                                    <div class="item-tariffs__title"><?php echo $value["tariffs_title"]; ?></div>
                                    <div class="item-tariffs__text"><?php echo $value["tariffs_text"]; ?></div>
                                </div>
                                <div class="item-tariffs__bottom">
                                    <a href="#" data-toggle="modal" data-target="#consultation-modal" target="_blank" class="item-tariffs__button">Детальніше</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="page__materials">
            <div class="prices__container _container">
                <div class="prices__header header-block__left">
                    <div class="header-block__body">
                        <div class="header-block__left_content">
                            <h2 class="header-block__left_content-text">РЕАЛІЗОВАНІ <br>ПРОЄКТИ</h2>
                        </div>
                        <div class="header-block__left_arrow">
                            <a href="#gallery-block" class="header-block__left_arrow-item">
                                <img src="<?php echo bloginfo('template_url'); ?>/img/headerblock/arrow.png" alt="arrow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery__body" id="gallery-block">
                <div class="gallery__block">
                    <?php
                    $project_photo_list = carbon_get_the_post_meta('project_photo_list');
                    foreach ($project_photo_list as $value) { ?>
                        <a class="gallery__item item-gallery" href="<?php echo $value["project_photo"]; ?>" data-source="<?php echo $value["project_photo"]; ?>">
                            <div class="item-gallery__hover">Дивитись</div>
                            <div class="item-gallery__text"><?php echo $value["project_photo_title"]; ?></div>
                            <img src="<?php echo $value["project_photo"]; ?>" alt="3">
                        </a>
                    <?php }?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer(); // подключаем подвал
?>