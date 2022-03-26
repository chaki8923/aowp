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
define( 'DB_NAME', 'CLUB' );

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
define( 'AUTH_KEY',         'f[U/8%70MR.F{K07B8H3.<~R6>5Ie88(tMOR)vFHp2Z^rjn0jnM@M>] FZ$|bJ2U' );
define( 'SECURE_AUTH_KEY',  ',5zKJ&PhQ,5f=%l$ZDW:}25s7,Z7E}-[kV[z)iG^r0IHBOL&f].zz[]I6HK_@n@d' );
define( 'LOGGED_IN_KEY',    'ow(.B}w?Xgr./fyFeaedqBvjG$jQ}Ct%?# p`sqH(1{$]D/ob/ k*]{KomDZZ>6_' );
define( 'NONCE_KEY',        'lDo@hyURw50<m1P`nfN;-YnnMDWz:V.N9RA?=jq:T8L&0@PM!l9!>%/q+T=rK=/2' );
define( 'AUTH_SALT',        'Wqw3d#/AtA):}nXkGN$=S]]]ix%=[IGMS*-!Q:%fT$T~`=4pDyG[0/e!K.XW)Yin' );
define( 'SECURE_AUTH_SALT', '/9)P*kEDs_Q?Gb)R;UeCubpVL.C5yEuxC)wm)ygc5zO$uMg#z]txlt94l,fM0(u.' );
define( 'LOGGED_IN_SALT',   '0)ved%{6t5aR(=XDF&0cLj5vvF@/tr)akQJKbz<k>W7*_}9e->OxtN/46gAZHn>:' );
define( 'NONCE_SALT',       ']<PELV0A$i^EE/;_<%X3F9rmYr{`RHHXt>m>rNOaEu/)ak_;AV)OFC%65fswpe]`' );

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


define('ALLOW_UNFILTERED_UPLOADS', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
