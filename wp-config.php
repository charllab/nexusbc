<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Project root path
$root = dirname(__DIR__);

// Composer autoloader
require_once $root.'/../vendor/autoload.php';

// dotenv
$dotenv = new Dotenv\Dotenv($root.'/../');
$dotenv->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_SERVER'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', getenv('SITE_URL'));
define('WP_SITEURL', getenv('SITE_URL').'/wordpress');

define('DISALLOW_FILE_EDIT', true);

define('WP_AUTO_UPDATE_CORE', true);

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']94(]+v7R(v<|Bd+ -1Xf&#z+~&/h; %f-qm>7LA/T%oRFiJSuxcE|uLE{lQnuw,');
define('SECURE_AUTH_KEY',  '=4tDdl9m*:9GuVw9XtwyU>O@)J/)H}+wQDQtXr5=%J!}(ATo>/vGiw*&Y.v1s0|D');
define('LOGGED_IN_KEY',    'sJPAN`lT^h7MMj{4:Y dwOyu+A]Ilj/(~ ^8Q?5jmDQ.SkJ>|yrH/2M6h7rAt2FZ');
define('NONCE_KEY',        'U8};?5SI)uR$.g,j-].c8z(1k;u?G)V`]~u 16Abki[P8-N;@5Zn&10C(ud1;uLI');
define('AUTH_SALT',        '2 I!+$9w;BH?mWj7ZDRI(c-EMmac&oYCI6-[@|5d3;|bRl$;;>G]z &;w#94pTV/');
define('SECURE_AUTH_SALT', 'Eg6.aA^<1J`T,X_CFXCiIn=[?o(V:,*.M,yZ-cq~3l|!SRXr#s$D!dUh]!s2w4q}');
define('LOGGED_IN_SALT',   'Idq5L:J5b,dM/JO&EMDUX|OE70.4~8>Sty;2D<6;}<^-ne%DEhY:QGg{ok9:tX;1');
define('NONCE_SALT',       '-*bl#2S2^_Rc>%B9j]>eX7ZqcPLeFm- RYEtF/grtdq>v+@?Oa,UBBrS%p!IMO|Y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_TABLE_PREFIX');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', filter_var(getenv('DEV_MODE'), FILTER_VALIDATE_BOOLEAN));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__).'/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
