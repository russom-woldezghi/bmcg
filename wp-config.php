<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bruce_monroe');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'JvG?5:i Tu5IuQbHhrQXYIvJ:=63HtT5^pq(iph6WRc/r/bAhP-U73iAjGCR;JqL');
define('SECURE_AUTH_KEY',  'R?=s;#O>JIrlZj<9bru+`T)a%^((z&0{R:!%}+*0^>$(!%5uG]i*q>$AhtZnf^Pz');
define('LOGGED_IN_KEY',    'WO`O`^Q)^^aF=<w}IS=x{Se0oOf[+8(LKY@>h?/s#0uriJB$U8unbnw-c2DpzCqC');
define('NONCE_KEY',        'Mv}>gW_w>c r_At`9*(Z9mzKjw/9m*)Zmu2wN}lcX6@@H);*6kSixk?<|Y#qQ.nm');
define('AUTH_SALT',        'ontoIE+tq&u!;j_d7BQ,-v5[l4=P/.P4V*;[Tb.nLPTf|$r:axgiCiGC`e(+&XGD');
define('SECURE_AUTH_SALT', '#[{4q>t;6)!DDZZ-IHK>r~bU0S^p`4}En%,I>e:u3XBL)(=~V9M|*E)cU~.(y0nK');
define('LOGGED_IN_SALT',   'fv4Bdq_J#/r_eTT=L#5eS)c#VA;sdX|o4rMt$sh$&d)gC+{cI8%p!D=;WFoef;n1');
define('NONCE_SALT',       't_HAcn#U&Pgu2co)7iToFd{7eJvj(yBV&OM HCsQ,Jt.{Yoag>G7x)o[asfBSX}v');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
