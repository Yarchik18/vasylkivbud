<?php
add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
    function add_styles()
    {
        if (is_admin()) {
            return false;
        }
        wp_enqueue_style('main', get_template_directory_uri() . '/css/style.css', array(), '01.08');
    }
}


add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;


add_action('init', function () {
    pll_register_string('time', 'Дзвоніть, Пн-Пт з 8:00 до 18:00');
    pll_register_string('free', 'Перерва з 13:00 до 14:00');
    pll_register_string('button', 'Розрахувати вартість');
    pll_register_string('our_contacts', "Наші <span class='bright-blue'>контакти</span>");
    pll_register_string('our_contacts_1', "Дзвоніть:");
    pll_register_string('our_contacts_2', "Режим роботи:");
    pll_register_string('our_contacts_3', "Пишіть:");
    pll_register_string('our_contacts_4', "Приїжджайте до офісу:");
    pll_register_string('our_contacts_messengers_t', "Приєднуйтесь до <br>соцмереж та месенджерів:");
    pll_register_string('our_contacts_time', "<span>Пн-Пт:</span> з 9:00 до 18:00");
    pll_register_string('our_contacts_free', "<span>Перерва:</span> з 13:00 до 14:00");
    pll_register_string('our_contacts_not_work', "<span>Нд:</span> вихідний");
    pll_register_string('call_btn', "Замовити дзвінок");
    pll_register_string('form_privacy_policy', "Натискаючи на кнопку, я даю згоду на обробку своїх персональних даних");
    pll_register_string('form1_btn', "Замовити розрахунок");
    pll_register_string('form_btn', "Замовити розрахунок");
    pll_register_string('sing_product_model', "Модель:");
    pll_register_string('sing_product_availability', "Наявність:");
    pll_register_string('sing_product_gl_type', "Вид скла:");
    pll_register_string('sing_product_counting', "від");
    pll_register_string('sing_product_buy_btn', "Замовити");
    pll_register_string('sing_ex_serv_title', "Додаткові послуги:");
    pll_register_string('follow_inst', "Слідкуй за нами в Instagram:");
    pll_register_string('footer_comp_name', "Світскла © 2022");
    pll_register_string('footer_dev', "Розробка сайту");
    pll_register_string('footer_privacy', "Політика конфіденційності");
    pll_register_string('ua', "8");
    pll_register_string('form_tit', "<span>Заповните форму</span> нижче");
    pll_register_string('arch_item_btn', "Детальніше");
    pll_register_string('catalog_watch_btn', "Переглянути каталог");
    pll_register_string('arch_title', "Індивідуальні вироби на замовлення");
    pll_register_string('arch_sub', "В нашому каталозі представлено більше 2000+ виробів зі скла для вашого інтр’єру");
    pll_register_string('sing_form_title', "Потрібна додакова інформація? <br>Залиште свій номер телефону.");
    pll_register_string('sing_same_prod', "Cхожі товари");
    pll_register_string('sing_det_desc', "Детальний опис");
    pll_register_string('footer_menu', "Меню:");
    pll_register_string('footer_catalog', "Каталог:");
    pll_register_string('contacts_show_map', "Переглянути на карті");
});

add_action('carbon_fields_register_fields', 'crb_attach_theme_options'); // Для версии 2.0 и выше
function crb_attach_theme_options()
{
    function getPages()
    {
        $carbon_pages = array();
        $pages = get_posts([
                'numberposts'      => -1,
                'lang' => 'uk'
            ]
        );
        foreach ($pages as $page) {
            $carbon_pages[$page->ID] = $page->post_title;
        }
        return $carbon_pages;
    }

    function getFuel()
    {
        $fuel = carbon_get_theme_option('fuel');
        $result = [];

        foreach ($fuel as $key => $value) {
            $result[$value['alias']] = $value['text_ru'];
        }
        return $result;
    }

    function getVolume()
    {
        $volume = carbon_get_theme_option('volume');
        $result = [];
        foreach ($volume as $key => $value) {
            $result[$value['alias']] = $value['text'];
        }
        return $result;

    }

    function getTransmission()
    {
        $transmission = carbon_get_theme_option('transmission');
        $result = [];
        foreach ($transmission as $key => $value) {
            $result[$value['alias']] = $value['text_ru'];
        }
        return $result;

    }

    function getBodyType()
    {
        $body_type = carbon_get_theme_option('body_type');
        $result = [];
        foreach ($body_type as $key => $value) {
            $result[$value['alias']] = $value['text_ru'];
        }
        return $result;

    }

    function getModelCar()
    {
        $model_car = carbon_get_theme_option('model_car');
        $result = [];
        foreach ($model_car as $key => $value) {
            $result[$value['alias']] = $value['text'];
        }
        return $result;

    }


    Container::make('theme_options', 2, __(' Главная информация', 'crb'))
        ->add_tab('Контакты', array(

            Field::make('image', 'logo', 'Логотип')->set_value_type('url'),
            Field::make('image', 'logo_footer', 'Логотип FAVICON')->set_value_type('url'),
            Field::make('complex', 'email', 'Почта')
                ->add_fields(array(
                        Field::make('text', 'text', 'Адресс почты')
                            ->set_width(100),
                    )
                ),

            Field::make('complex', 'phone_list', 'Телефон')
                ->add_fields(array(
                        Field::make('text', 'phone_number', 'Номер телефона')
                            ->set_width(100),
                    )
                ),
            Field::make('text', 'address', 'Адресс')->set_width(50),
            Field::make('text', 'google_maps', 'Google maps')->set_width(50),
            Field::make('text', 'instagram', 'Instagram')->set_width(50),
            Field::make('text', 'viber', 'Viber')->set_width(50),
            Field::make('text', 'tiktok', 'tiktok')->set_width(50),
            Field::make('text', 'telegram', 'Telegram')->set_width(50),
            Field::make('text', 'whatsapp', 'Whatsapp')->set_width(50),
            Field::make('text', 'text_more_uk', 'Кнопка подробней')->set_width(50),
            Field::make('textarea', 'map', 'Карта'),
            Field::make('text', 'copyright_uk', 'Copyright на UK')->set_width(50),
            Field::make('text', 'privacy_policy_uk', 'Конфиденциальность на UK')->set_width(50),

        ));

    Container::make('post_meta', 'Главная страница')
        ->where('post_template', '=', 'template-home.php')
        ->add_tab('Перший екран', array(
            Field::make('image', 'main_bg_img', 'Картинка на задній фон')->set_value_type('url'),
            Field::make('textarea', 'main_text', __('Основний текст', 'crb'))->set_width(33),
            Field::make('image', 'main_bg_title', 'Картинка на задній фон title')->set_value_type('url'),
            Field::make('textarea', 'main_subtext', __('Підтекст', 'crb'))->set_width(33),
            Field::make('image', 'main_bg_subtitle', 'Картинка на задній фон subtitle')->set_value_type('url'),
        ))

        ->add_tab('Реалізовані проєкти', array(
            Field::make('complex', 'project_photo_list', 'Фото галереи')
                ->add_fields(array(
                        Field::make('image', 'project_photo', 'Фото галереи')->set_value_type('url'),
                        Field::make('textarea', 'project_photo_title', 'Заголовок картинки')->set_width(50),
                    )
                ),
        ))
        ->add_tab('Види робіт', array(
            Field::make('complex', 'type_work_list', 'Вид роботи')
                ->add_fields(array(
                        Field::make('text', 'type_work_number', __('Номер порядку', 'crb'))->set_width(50),
                        Field::make('text', 'type_work_title', __('Заголовок', 'crb'))->set_width(50),
                        Field::make('textarea', 'type_work_subtitle', __('Текст', 'crb'))->set_width(100),
                    )
                ),
        ))
        ->add_tab('Тарифи та розцінкa', array(
            Field::make('image', 'cart_photo', 'Фото заднього фону')->set_value_type('url'),
            Field::make('complex', 'tariffs_list', 'Тариф')
                ->add_fields(array(
                        Field::make('text', 'tariffs_title', __('Заголовок', 'crb'))->set_width(50),
                        Field::make('textarea', 'tariffs_text', __('Текст', 'crb'))->set_width(50),
                    )
                ),
        ))
        ->add_tab('Будівельні матеріали', array(
            Field::make('complex', 'materials_list', 'Матеріали')
                ->add_fields(array(
                        Field::make('image', 'materials_photo', 'Фото колонки')->set_value_type('url'),
                        Field::make('text', 'materials_title', __('Заголовок', 'crb'))->set_width(50),
                        Field::make('textarea', 'materials_text', __('Вид товару', 'crb'))->set_width(50),
                    )
                ),
            Field::make('textarea', 'materials_text_bottom', __('Основний текст', 'crb'))->set_width(100),
        ));
}


function wp_globus_translate_array($string)
{
    return $string . '_' . WPGlobus::Config()->language;
}

function wp_globus_translate_array_string($arr_ua, $arr_ru, $arr_en)
{

    switch (WPGlobus::Config()->language) {
        case 'en':
            return $arr_en;
            break;

        case 'uk':
            return $arr_ua;
            break;
        case 'ru':
            return $arr_ru;
            break;

        default:
            return '';
            break;
    }
}

function wpGlobusTranslateOption($str = '')
{
    return carbon_get_theme_option($str . '_' . WPGlobus::Config()->language);
}

function wpGlobusTranslatePost($id = 0, $str = '')
{
    return carbon_get_post_meta($id, $str . '_' . WPGlobus::Config()->language);
}

function wpGlobusShortCode($en, $uk)
{
    if (WPGlobus::Config()->language == 'en') {
        echo do_shortcode($en);
    } elseif (WPGlobus::Config()->language == 'uk') {


        echo do_shortcode($uk);
    }
}

add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu() {
   // remove_menu_page('options-general.php'); // Удаляем раздел Настройки
   // remove_menu_page('tools.php'); // Инструменты
    //remove_menu_page('users.php'); // Пользователи
   // remove_menu_page('plugins.php'); // Плагины
    //remove_menu_page('themes.php'); // Внешний вид
   // remove_menu_page('edit.php'); // Посты блога
    remove_menu_page('upload.php'); // Медиабиблиотека
    //remove_menu_page('edit.php?post_type=page'); // Страницы
    remove_menu_page('edit-comments.php'); // Комментарии
    remove_menu_page('link-manager.php'); // Ссылки
    //remove_menu_page('wpcf7');   // Contact form 7
   // remove_menu_page('duplicator');   // Contact form 7
    //remove_menu_page('mlang');   // Contact form 7
    remove_menu_page('wpseo_dashboard');   // Contact form 7
    remove_menu_page('options-framework'); // Cherry Framework
}
function custom_globus_change()
{
    if (class_exists('WPGlobus')) {
        $enabled_languages = apply_filters('wpglobus_extra_languages', WPGlobus::Config()->enabled_languages, WPGlobus::Config()->language);
        $a = '';
        $span = '';
        if (WPGlobus::Config()->language == 'ru') {
            $enabled_languages = array_reverse($enabled_languages);
        }
        foreach ($enabled_languages as $language) {
            $url = null;

            if ($language != WPGlobus::Config()->language) {
                $url = WPGlobus_Utils::localize_current_url($language);
                $a .= '<div class="leng_bl">';
                $a .= '<a href="' . $url . '"><img src="' . get_template_directory_uri() . '/img/' . $language . '.svg"></a>';
                $a .= '</div>';

            } else {
                $span .= '<div class="leng_bl-ch">';
                $span .= '<span><img src="' . get_template_directory_uri() . '/img/' . $language . '.svg"></span>';
                $span .= '</div>';
            }
        }
        $result = $span . $a;

        return $result;
    }
}

add_action('customize_register', 'wpb_customize_register');
register_nav_menus(array(
    'top' => 'Верхнее меню'
));

add_theme_support('post-thumbnails');


register_nav_menus(array(
    'top' => 'Главное меню',
    'conditions' => 'Условия меню',
    'company' => 'Компания меню',
    'loyalty' => 'Лояльность меню',
    'additional_services' => 'Дополнительные услуги ',
));


//add_action('init', 'true_register_post_type_init'); // Использовать функцию только внутри хука init

function true_register_post_type_init()
{
    $labels = array(
        'name' => 'Новости',
        'singular_name' => 'Новости', // админ панель Добавить->Функцию
        'add_new' => 'Добавить машину',
        'add_new_item' => 'Добавить новую машину', // заголовок тега <title>
        'edit_item' => 'Редактировать машину',
        'new_item' => 'Новая услуга',
        'all_items' => 'Все Новости',
        'view_item' => 'Просмотр Новости на сайте',
        'search_items' => 'Искать Новости',
        'not_found' => 'Новости не найдено.',
        'not_found_in_trash' => 'В корзине нет машин.',
        'menu_name' => 'Новости' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'has_archive' => true,
        'rewrite' => true,
        'menu_icon' => 'dashicons-car', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'revisions', 'post-formats'),
        //'taxonomies'          => array( 'category' ),

    );
    register_post_type('cars', $args);

    $args = array(
        'labels' => array(
            'name' => 'Класс машины', // основное название во множественном числе
            'singular_name' => 'Класс машины', // название единичного элемента таксономии
            'menu_name' => 'Класс машины', // Название в меню. По умолчанию: name.
            'all_items' => 'Все классы машины',
            'edit_item' => 'Изменить класс машины',
            'view_item' => 'Просмотр классы машины', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item' => 'Обновить класс машины',
            'add_new_item' => 'Добавить новый класс машины',
            'new_item_name' => 'Название нового класса машины',
            'parent_item' => 'Родительский класс машины', // только для таксономий с иерархией
            'parent_item_colon' => 'Родительский класс машины:',
            'search_items' => 'Искать классы машины',
            'popular_items' => 'Популярные классы машины', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте классы машины запятыми',
            'add_or_remove_items' => 'Добавить или удалить классы машины',
            'choose_from_most_used' => 'Выбрать из часто используемых классов машин',
            'not_found' => 'Класс машины не найдено',
            'back_to_items' => '← Назад к классам машин',

        ),
        'rewrite' => true,
    );
    register_taxonomy('car_class', 'cars', $args);

    $args = array(
        'labels' => array(
            'name' => 'Города', // основное название во множественном числе
            'singular_name' => 'Город', // название единичного элемента таксономии
            'menu_name' => 'Города', // Название в меню. По умолчанию: name.
            'all_items' => 'Все Города',
            'edit_item' => 'Изменить город',
            'view_item' => 'Просмотр город', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item' => 'Обновить город',
            'add_new_item' => 'Добавить новый город',
            'new_item_name' => 'Название нового город',
            'parent_item' => 'Родительский город', // только для таксономий с иерархией
            'parent_item_colon' => 'Родительский город:',
            'search_items' => 'Искать города',
            'popular_items' => 'Популярные города', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте города запятыми',
            'add_or_remove_items' => 'Добавить или удалить города',
            'choose_from_most_used' => 'Выбрать из часто используемых городов',
            'not_found' => 'Город не найдено',
            'back_to_items' => '← Назад к городам',

        )
    );
    register_taxonomy('cities', 'cars', $args);
}

add_filter('excerpt_length', function () {
    return 20;
});



function breadcrumbs()
{

    // получаем номер текущей страницы
    $page_num = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $separator = ''; //  разделяем обычным слэшем, но можете чем угодно другим

    // если главная страница сайта
    if (is_front_page()) {

        if ($page_num > 1) {
            echo '<a href="' . site_url() . '">Главная</a>' . $separator . $page_num . '-я страница';
        } else {
            echo 'Вы находитесь на главной странице';
        }

    } else { // не главная

        echo '<li class="list-item "><a href="' . site_url() . '">Головна</a></li>' . $separator;


        if (is_single()) { // записи

$arg = get_the_category();

            echo '<li class="list-item active"><a href="'.get_category_link($arg[0]->term_id).'">'.$arg[0]->name.'</a></li>';
            echo $separator;
            echo '<li class="list-item active">'.get_the_title().'</li>';

        } elseif (is_page()) { // страницы WordPress

            echo '<li class="list-item active">'.get_the_title().'</li>';

        } elseif (is_category()) {

            '<span>'.single_cat_title().'</span>';

        } elseif (is_tag()) {

            single_tag_title();

        } elseif (is_day()) { // архивы (по дням)

            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $separator;
            echo get_the_time('d');

        } elseif (is_month()) { // архивы (по месяцам)

            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo get_the_time('F');

        } elseif (is_year()) { // архивы (по годам)

            echo get_the_time('Y');

        } elseif (is_author()) { // архивы по авторам

            global $author;
            $userdata = get_userdata($author);
            echo 'Опубликовал(а) ' . $userdata->display_name;

        } elseif (is_404()) { // если страницы не существует

            echo 'Ошибка 404';

        }

        if ($page_num > 1) { // номер текущей страницы
            echo ' (' . $page_num . '-я страница)';
        }

    }

}

function _getParam($array, $alias)
{
    foreach ($array as $item) {
        if ($item['alias'] == $alias) {
            return $item;
        }
    }
    return null;
}


/*
 * Функция создает дубликат поста в виде черновика и редиректит на его страницу редактирования
 */
function true_duplicate_post_as_draft()
{
    global $wpdb;
    if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'true_duplicate_post_as_draft' == $_REQUEST['action']))) {
        wp_die('Нечего дублировать!');
    }

    /*
     * получаем ID оригинального поста
     */
    $post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
    /*
     * а затем и все его данные
     */
    $post = get_post($post_id);

    /*
     * если вы не хотите, чтобы текущий автор был автором нового поста
     * тогда замените следующие две строчки на: $new_post_author = $post->post_author;
     * при замене этих строк автор будет копироваться из оригинального поста
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    /*
     * если пост существует, создаем его дубликат
     */
    if (isset($post) && $post != null) {

        /*
         * массив данных нового поста
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $new_post_author,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            'post_name' => $post->post_name,
            'post_parent' => $post->post_parent,
            'post_password' => $post->post_password,
            'post_status' => 'draft', // черновик, если хотите сразу публиковать - замените на publish
            'post_title' => $post->post_title,
            'post_type' => $post->post_type,
            'to_ping' => $post->to_ping,
            'menu_order' => $post->menu_order
        );

        /*
         * создаем пост при помощи функции wp_insert_post()
         */
        $new_post_id = wp_insert_post($args);

        /*
         * присваиваем новому посту все элементы таксономий (рубрики, метки и т.д.) старого
         */
        $taxonomies = get_object_taxonomies($post->post_type); // возвращает массив названий таксономий, используемых для указанного типа поста, например array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        /*
         * дублируем все произвольные поля
         */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos) != 0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }


        /*
         * и наконец, перенаправляем пользователя на страницу редактирования нового поста
         */
        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Ошибка создания поста, не могу найти оригинальный пост с ID=: ' . $post_id);
    }
}

add_action('admin_action_true_duplicate_post_as_draft', 'true_duplicate_post_as_draft');

/*
 * Добавляем ссылку дублирования поста для post_row_actions
 */
function true_duplicate_post_link($actions, $post)
{
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="admin.php?action=true_duplicate_post_as_draft&post=' . $post->ID . '" title="Дублировать этот пост" rel="permalink">Дублировать</a>';
    }
    return $actions;
}

add_filter('post_row_actions', 'true_duplicate_post_link', 10, 2);


add_action('init', 'setCurrency');

function setCurrency()
{
    if (!isset($_COOKIE['currency'])) {
        setcookie('currency', 'uah', time() + 31556926, COOKIEPATH, COOKIE_DOMAIN);
    }

    if ($_COOKIE['currency'] != 'uah' && $_COOKIE['currency'] != 'usd') {
        setcookie('currency', 'uah', time() + 31556926, COOKIEPATH, COOKIE_DOMAIN);
    }
}

if (is_user_logged_in()) {
    add_action('wp_ajax_setLang', 'setLang');
} else {
    add_action('wp_ajax_nopriv_setLang', 'setLang');
}

function setLang()
{

    check_ajax_referer('currency', 'security');
    if (isset($_POST['currency'])) {
        if ($_POST['currency'] == 'uah' || $_POST['currency'] == 'usd') {
            setcookie('currency', $_POST['currency'], time() + 31556926, COOKIEPATH, COOKIE_DOMAIN);
        }
    }
}

function getCurrency()
{
    return $_COOKIE['currency'];
}

function getPrice($price, $currency)
{
    if ($currency == 'uah') {
        return $price . ' грн';
    } else {
        $usd = carbon_get_theme_option('usd');
        $price = $price / $usd;
        return round($price, 2) . ' $';
    }
}