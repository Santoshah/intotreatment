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
define('DB_NAME', 'intotreatment');

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
define('AUTH_KEY',         'g~yr!xb:>G@wihCmnS[sLi_|u1pf~GbmENCM_hp#TUXl<|5e}|a.^^LA|@l){T77');
define('SECURE_AUTH_KEY',  'uh>XDn_#1R&N4WU)wq(vj7Z(>:Q}c7(KQV=a il(@Yl;2ZDeKx}!XE*UF}bkw8hC');
define('LOGGED_IN_KEY',    ';i_5QIvcVRRCgC/Lj}dDs%`9G??4CtlU Gb56?,c`jxYTgc~T6^8/u#RP@Z?1E~D');
define('NONCE_KEY',        '9Zn#@ddHU_x{8ujyu:6fLPYd}@{rm8>9;W1EcX>T.~F~Q[G8:tKA.xY%B]IlZu,h');
define('AUTH_SALT',        'u=U[$M^@U~%dfum%W?D#jidinp|GJSTOk`G(@6}GK;4JFtN-L!$]Trr@]%H#yP|@');
define('SECURE_AUTH_SALT', '.{Iiul%eE[H0+Wn[+t2^kgmd!%,+iJ?lZ `c?RS|;VM0DBTs<gK!Sq4K18%AxQm{');
define('LOGGED_IN_SALT',   '_v,7-r%KQ*$t/4]No;XY|UNJF1CelO,WZ<:s5RgIAQ:}%KRbJmI&Z{-fMlh}VvRu');
define('NONCE_SALT',       'fu0=0y/J~io2s31(gXL29IO&8sMHLSNA3<|di3s7|VZ%o/i^hW3I;|R<//Gq<V4,');

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
