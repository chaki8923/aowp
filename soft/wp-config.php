<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'soft' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h2I)/EF[:DpTVnk_q*)JuF%eQ^]zBMa0#nMDE(T:]/D4ls!5l2Mr,cc#[#;^pVw8' );
define( 'SECURE_AUTH_KEY',  'PU?/UpJ_y5OqR41&}[4,J_L`/4uE+hJG |!]TbJS$9!FL>e1Yn[lWSG&rYa9Drhb' );
define( 'LOGGED_IN_KEY',    'db$_~N.TLheSRJ!u(|In:^{k~/g|0I0p=,,v3t;B<rF)pt0]1UHfFB[ofg:MB^xS' );
define( 'NONCE_KEY',        'f5fI1.ypHqbe(CB^trvcrRHR}uh3L`$WMy=g )8L+K]`VmNH>U0lGUN>Tl8 2-&^' );
define( 'AUTH_SALT',        '?>HY.1d[1]|gR)YBrIi];;jh:x9sSnd|7,fX_,q]F@ %s!2mpJP^<@K^so Xmsb#' );
define( 'SECURE_AUTH_SALT', 'PK>*kiwlAZSju(WvK05o##NI`%`IZ $sNY4+=OVy>EleFO!eV1WOy9D?M2M<<,~r' );
define( 'LOGGED_IN_SALT',   'TLk,iA{TxxQyyhQWl[pc$MTRhJ1E^<oXTS?Wk7Yq_?TdQ|Xg?}uiXW<>dn.RInfG' );
define( 'NONCE_SALT',       '*G-;ZDZ,p8%oD.WxN?JMVI>D>j?Dlh{hwm;_-cs:[,p).N0sOAD*c3=22]M]JoYp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
