<div class="modal fade" id="consultation-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="main-form modal-form">
                <div class="form__title">
                    <?php echo pll__("<span>Заповніть форму</span> нижче"); ?>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="6c99081" title="Popup"]'); ?>
                <p class="form__privacy-policy">
                    <?php echo pll__('Натискаючи на кнопку, я даю згоду на обробку своїх персональних даних'); ?>
                </p>
            </div>
        </div>
    </div>
</div>
</main>
<footer class="footer">
    <div class="container">
        <div class="top-part">
            <div class="left-block">
                <div class="footer__logo">
                    <img src="<?php echo carbon_get_theme_option('logo'); ?>">
                </div>
                <div class="left-column__subtitle">
                    <?php echo pll__('Дзвоніть, Пн-Пт з 8:00 до 18:00<br>Сб з 8:00 до 15:00'); ?>
                </div>
                <ul class="footer__numbers-list" id="footer_contacts">
                    <?php
                    $phone = carbon_get_theme_option('phone_list');
                    foreach ($phone as $ph) {
                        ?>
                        <li>
                            <a href="tel:<?php echo $ph['phone_number'] ?>" onclick="return gtag_report_conversion('tel:<?php echo $ph['phone_number']; ?>');"><?php echo $ph['phone_number'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="left-column__subtitle">
                    <?php echo pll__('Нд: вихідний'); ?>
                </div>
                <div class="main-block__buttons">
                    <a href="#" class="main-block__button" data-toggle="modal" data-target="#consultation-modal" target="_blank">Замовити дзвінок</a>
                </div>
            </div>
            <div class="right-block">
                <div class="right-block__lists">
                    <div class="nav-list-body">
                        <div class="nav-list__title">
                            <?php echo pll__('Меню:'); ?>
                        </div>
                        <ul class="nav-list">
                            <?php wp_nav_menu( [
                                'container'       =>'',
                                'items_wrap'      => '<ul class="nav__list">%3$s</ul>',
                                'theme_location'  => 'top'
                            ] ); ?>
                        </ul>
                    </div>
                    <div class="nav-list-body">
                        <div class="nav-list__title">
                            <?php echo pll__('Каталог:'); ?>
                        </div>
                        <div class="nav-list__container">
                            <?php
                            $categories = get_categories([
                                'taxonomy' => 'category',
                                'type' => 'post',
                                'parent' => '',
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'hide_empty' => true,
                                'hierarchical' => 1,
                                'exclude' => '',
                                'include' => '',
                                'number' => 0,
                                'pad_counts' => false,

                            ]); ?>
                            <ul class="nav-list">
                                <?php
                                $i = 0;
                                foreach ($categories as $single_cat) { ?>

                                    <li>
                                        <a href="<?php echo get_category_link($single_cat->term_id); ?>"
                                           ><?php echo $single_cat->name; ?></a>


                                    </li>
                                    <?php
                                    $i++;
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="follow">
                    <div class="follow__title">
                        <?php echo pll__('Слідкуй за нами в соцмережах:'); ?>
                    </div>
                    <div class="follow-instagram">
                        <a href="<?php echo carbon_get_theme_option('instagram') ?>" target="_blank">
                            <img src="<?php echo bloginfo('template_url'); ?>/img/icons/social/instagram-icon.svg">
                        </a>
                    </div>
                    <div class="follow-instagram">
                        <a href="tg://resolve?domain=<?php echo carbon_get_theme_option('telegram')?>" target="_blank">
                            <img src="<?php echo bloginfo('template_url'); ?>/img/icons/social/tel.svg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-part">
        <div class="container">
            <div class="bottom-part-content">
                <p><?php echo pll__('Васильків-Буд © 2023'); ?></p>
                <a href="tg://resolve?domain=yarchik"><?php echo pll__('Розробка сайту'); ?></a>
                <a href="#"><?php echo pll__('Політика конфіденційності'); ?></a>
            </div>
        </div>
    </div>
</footer>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="<?php echo bloginfo('template_url'); ?>/js/script.js"></script>
<?php wp_footer() /* конкретно для нашего примера эта функция не обязательна, но во всех темах WP она должна присутствовать */ ?>
</body>
</html>