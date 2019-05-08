<?php
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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/viral/web/viral.com.ua/public_html/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'viral_viral' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'viral_viral' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '5RS16tneP9' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'L$N!ER%o]o.C|MM.}*rL>}o:WHRLl5.hMQ~+]7.dvU&r=+>/-o!ZS!yRXUHpba}c' );
define( 'SECURE_AUTH_KEY',  'f)#w[/-;nDs={5fo&<r)uza.<eXsQ5zX:K}d,g-y?EwW/mU;rdjn{2?>]n!]ZWfm' );
define( 'LOGGED_IN_KEY',    '<f$@t (_tf%spZ*bExmuay/V 6kErf,D,4+-Y:G,LsRc(NN J~d3F$q8TMu5B[J}' );
define( 'NONCE_KEY',        'fYt#iKtp3fO^jm*U98dg_97oCkIOVo/HC;zno3ML/^sI8e$>or`2iv/oKb~`Ydd5' );
define( 'AUTH_SALT',        'lt4UIHJ},8q%W6PTl^=?NX|t??5/Nd|5&68&!OcmXBh2z8!!Gt0z{cv;!3Zd,[}+' );
define( 'SECURE_AUTH_SALT', 'Lv8oi+MsGXOuVTinJptdPMSRodto,TZyvxv<2eJ~>Wh3lsM7u02-a$a|bqwPeGVw' );
define( 'LOGGED_IN_SALT',   '7Ko?v1@%p`@, b$LA5=4O0TXIf HiqGh, /uvN.vixEgKW=fChcef.3Y&?z@EE12' );
define( 'NONCE_SALT',       'KR/Bch$o|fkK))81w_I8RwoEGi23845z}mECIX9:rt][3|/( ZuPr~jf08%|42A0' );

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
