<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bitnami_wordpress');

/** MySQL database username */
define('DB_USER', 'bn_wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'b92987543a');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '1606296f48ec3abe9594809fa35d99c37d12b00238d80c3623bd50f0b3e3c47b');
define('SECURE_AUTH_KEY', '91565686c42d47682cc532ea440c3d50d8507613327a23860217bf2fc8efa1d8');
define('LOGGED_IN_KEY', '3819bd3d681729619cee2f88d2bc2f974a6e6d0cda418c864de91e5156a9c636');
define('NONCE_KEY', 'df118ccbe9d9f4fff31ee21980c0b502aba29e67f87f5eec4fdf8089a3f6cd43');
define('AUTH_SALT', '016642ef4f1fa023b7d896d5a23b744beb1882ed3a16e8519730af267861a9a8');
define('SECURE_AUTH_SALT', 'f49f373fb87520ea2d7c86173716cb1f39243b51267026ea8459e440c8fb553e');
define('LOGGED_IN_SALT', 'f100a484f56140423873c0fcb49ee8ca7460fb57febcd0d090202a96d6d89003');
define('NONCE_SALT', 'b93346d97cdffe52e17542de4830fb423e2ed4261879906756b316e10adb9f3d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);


/* That's all, stop editing! Happy blogging. */
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/wordpress/tmp');


define('FS_METHOD', 'ftpext');
define('FTP_BASE', '/opt/bitnami/apps/wordpress/htdocs/');
define('FTP_USER', 'bitnamiftp');
define('FTP_PASS', 'jU8f46fH6hcM972QmCtNUNqTVali5fNln9I0C07xHy7mNAICBO');
define('FTP_HOST', '127.0.0.1');
define('FTP_SSL', false);

