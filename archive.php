<?php
get_header('catalog');


if ($post->ID == pll_get_post($post->ID, 'ru')) {
    $home = 317;
} else {
    $home = 8;
}

?>
    <!-- HEADER EOF   -->
    <main>
        <section class="section-ready-products">
            <div class="container">
                <h2 class="main-title"><?php echo pll__('Індивідуальні вироби на замовлення'); ?></h2>
                <p class="main-subtitle">
                    <?php echo pll__('В нашому каталозі представлено більше 2000+ виробів зі скла для вашого інтр’єру'); ?>
                </p>
                <ul class="products-list">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li class="list-item">
                            <div class="item-image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo carbon_get_the_post_meta('sing_product_img')[0]['img']; ?>"
                                         alt="Product image">
                                </a>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <div class="item-title">
                                    <?php the_title(); ?>
                                </div>
                            </a>
                            <div class="price">
                                <?php echo pll__('від'); ?>
                                <span>
                                                             <?php echo carbon_get_post_meta($post->ID, 'sing_product_price'); ?>
                                                        </span>
                                <?php echo carbon_get_post_meta($post->ID, 'sing_product_size'); ?>
                            </div>
                            <div class="item-button">
                                <a href="<?php the_permalink(); ?>"><?php echo pll__("Детальніше"); ?></a>
                            </div>
                        </li>
                    <?php endwhile; else: ?>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="pagination_block">

                <?php the_posts_pagination(); ?>


            </div>
        </section>
        <section class="section-glass-types">

            <div class="container">
                <h2 class="glass-types__title main-title"><?php echo carbon_get_post_meta($home, 'type_glass_title'); ?></h2>
                <p class="glass-types__subtitle main-subtitle"><?php echo carbon_get_post_meta($home, 'type_glass_sub'); ?></p>
            </div>
            <div class="container">
                <ul class="glass-types__list">
                    <?php
                    $type_glass_list = carbon_get_post_meta($home, 'type_glass_list');
                    foreach ($type_glass_list as $type_glass_l) {
                        ?>
                        <li>
                            <img src="<?php echo $type_glass_l['img']; ?>" alt="Type of glasses">
                            <div><?php echo $type_glass_l['text']; ?></div>
                        </li>
                    <?php } ?>
                </ul>
                <p class="glass-types__subtitle main-subtitle"><?php echo carbon_get_post_meta($home, 'type_glass_list_sub'); ?></p>
                <div class="glass-types__button main-button">
                    <a data-toggle="modal" data-target="#consultation-modal"
                       href="#"><?php echo carbon_get_post_meta($home, 'type_glass_button'); ?></a>
                </div>
            </div>
        </section>
        <!--     <section class="section-about-product">
                 <div class="container">
                     <div class="about-product-content">
                         <div class="title">Душові кабіни зі скла</div>
                         <p class="subtitle">Скляна душова кабіна - це індивідуально підібрана, виготовлена ​​під замовника,
                             конструкція із загартованого скла. На сьогоднішній день виробник поєднує в цьому виробі якісну
                             фурнітуру, безпечне скло та сучасний дизайн. скляні перегородки допомагають економити простір,
                             надають легкості та витонченості вашій ванній кімнаті. скло - особливий матеріал, він здатний
                             змінити будь-яке приміщення, наповнити його повітрям і світлом, внести вишуканість в інтер'єр.
                             Ми можемо виготовити скляну душову кабіну, скляні двері-перегородки для душових, а також скляну
                             шторку на ванну. Ви вибираєте будь-який вид скла: прозоре, матове, тоноване, з малюнком – це
                             дозволить зробити ваше приміщення ще більш унікальним та розробленим саме під вас.
                         </p>
                         <div class="title">
                             У чому перевага скляної душової кабіни?
                         </div>
                         <ul class="advantages-list">
                             <li>
                                 <span>Економія місця.</span> Душові кабіни спочатку кращі за ванну. Якщо замінити ванну на
                                 душову у вас відразу знайдеться місце для пральної машини, додаткової шафки та полиць для
                                 зберігання, або корзини для брудної білизни.
                             </li>
                             <li>
                                 <span>Гідроізоляція.</span> Скляні стінки душової кріпляться до піддону або підлоги ванної
                                 кімнати на спеціальний профіль. вся ця конструкція фіксується силіконовими прокладками та
                                 герметиком – що не дасть воді проникнути за межі душової.

                             </li>
                             <li>
                                 <span>Прибирання.</span> Скляна поверхня – це гладкий, непористий матеріал, який не боїться
                                 впливу різних хімічних, клінінгових засобів. прибрати будь-яке забруднення зі скла не складе
                                 труднощів для господині.
                             </li>
                             <li>
                                 <span>Зовнішній вигляд.</span> Дизайнери вважають, що скляні двері для душу, або душова
                                 кабіна – це хороший спосіб отримати легкий, сучасний, неперевантажений зайвим інтер'єр
                                 вашого приміщення. Тим самим завдяки різноманітності матеріалу внести особливі,
                                 індивідуальні штрихи.
                             </li>
                             <li>
                                 <span>Фурнітура.</span> Установка душових кабін компанії «світ скла сервіс» означає
                                 використання лише якісної, підібраної саме під вас фурнітури. ви можете вибрати стандарт –
                                 хром, сатин. а також, пофарбувати профіль та петлі в будь-який колір.
                             </li>
                             <li>
                                 <span>Безпечний довговічний матеріал.</span> Для виготовлення використовується скло
                                 завтовшки 8мм. Матеріал гартується у печі при температурі 300 °c. Після чого скло стає
                                 міцнішим у 14 разів і є безпечним, довговічним матеріалом.
                             </li>
                         </ul>
                         <div class="title">На що звернути увагу при покупці душової кабіни зі скла?</div>
                         <p class="subtitle">При виборі душової не варто звертати увагу лише на найприємнішу ціну та
                             зовнішній вигляд виробу. Непотрібно знижувати стандарти при замовленні: скло обов'язково має
                             бути завтовшки 8мм і загартоване, фурнітура з нержавіючої сталі. Монтаж даного виробу краще
                             довірити професіоналам, щоб після встановлення не виявити проміжків між кахлем, профілем і самим
                             склом. Також зверніть увагу на функціональність, душова скляна кабіна найчастіше вибирається
                             клієнтом, тому що це легка конструкція, що дозволяє зберегти простір вашої ванної кімнати.</p>
                     </div>
                 </div>
             </section>-->
    </main>


<?php
get_footer(); // подключаем подвал
?>