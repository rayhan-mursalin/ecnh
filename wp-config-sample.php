<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '@1b[}a_ZEPEY$[yfBf$juRX|Zx!z^@sA6CLO_Z^NX,&mW3J-]-[wB]:UdC15soI~');
define('SECURE_AUTH_KEY',  'A<IdrSa;yY.djHlO7_|^_f3TCqovORZ+BceVSJ9@;4d!>6Hl!RRJ[zewQ#A1V?&s');
define('LOGGED_IN_KEY',    '?YT-)m_g>;w{z;d/C)[36_e(J|j#|-}|**m$kW30 l/HaV{~-LA_s,jg|455x<A0');
define('NONCE_KEY',        '8K!YE+KZ07qkt)78+bGZX,@~g`%_-EE3}5j(,JF<Ba#D]!zBc}F{h0Pn3:rIot]D');
define('AUTH_SALT',        'eT%BBn6G I`0ouOCTXQ&,lMg2&]vF[P2RK?iP&)y(F;#+|:dnfdF@a1iL4^H,Fa(');
define('SECURE_AUTH_SALT', '@Tz=7Vv=b= Fb-|6!y`UhYPzxf]:$s]Km@.B8Bf-9C[-(52yj/{`T*t3Xty^sVo0');
define('LOGGED_IN_SALT',   'U+M$-7I+~+3.I|ou<]#jn`5C-ip$/`*)?udRUNkHK)4NKy[IW)8zR]?L{p04]SpD');
define('NONCE_SALT',       'SV1[u?|=-C+n}?[@-2G@>,Td/~t=UEvI6N:#!4OhQIHNr#Si3mN+-0QGK|[yx?A7');
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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
