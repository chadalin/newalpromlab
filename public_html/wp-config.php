<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'promalplab_wordp' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'promalplab_wordp' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'm0t0r0la' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );
//Для переноса на новый домен, в админ-панели поменял адреса сайта на новый домен.
define('WP_HOME','https://new.promalplab.ru/');

define('WP_SITEURL','https://new.promalplab.ru/');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '<4s$*z<-nld;G^Kr/]G:|xG>TKlee{Hh{anDycgK a2{cH(o0~=}PID^Wr{{0!1%' );
define( 'SECURE_AUTH_KEY',  ' m,{PP8nNX&E+XQC;Xa!G(l~H3@8z%Nz]3Y|Cv.T`Nd{!15_F <l,v04=sTy*jtn' );
define( 'LOGGED_IN_KEY',    'jsY:kx<z&TFJn9hGd9z]?.d.I.L*/u:h.k%2{o@7,KLv8>IP:`Y;;;k]cN$Z;tc=' );
define( 'NONCE_KEY',        'tw$;K*a~4DF5#M:$VEkz,un0d([Og]>J7-RP2INT#c86Gbb8BJ7~tX%F;xp$Prr[' );
define( 'AUTH_SALT',        ')s9bf~o3v}rFp!2dP(%uKvVQ|JKpAjoy7N/CRlS-5/9$I65g$b#X=U@pc1{8gMNM' );
define( 'SECURE_AUTH_SALT', 'Cm,zyA>o3;,]>pbFmv>%i$$8.WcJ;vht|^l^O)boL9u*FVQAc!7Q7#wzb3V]+G|M' );
define( 'LOGGED_IN_SALT',   'U:`Vq4yT#E{*Bh/Z86[5Gd.Sog??5`4Ul2Usto8?N_-`?GFabz.biykigT)x7TIz' );
define( 'NONCE_SALT',       '.ur~6)@Ju]j1?(t^e?IznNg&OC+4Zep}Xd_wG8@<3Q9&A-l{(vU =-fD-d7{PkYi' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
