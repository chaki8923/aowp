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
define( 'DB_NAME', 'sweeet' );

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
define( 'AUTH_KEY',         'p8|4^49]t@=5=:;Ac%UZ*FbY>ev|}wg}kh<dwdCC(r4xVjL@W_m+_#dVsnXR1;C1' );
define( 'SECURE_AUTH_KEY',  '&Jt.GKnA~#h8;iT@@N3^pNhFQ:|t3-_hxPsvJ>bUYtg)uHd3LD8BcAYCYEkz)#VY' );
define( 'LOGGED_IN_KEY',    '#fw//vn;d`hXT|KZ&s.O&E9B[5F6KbHuUb?>[6kj!kG4qkff(a+AAHLh;k<RUy>1' );
define( 'NONCE_KEY',        '9dH!g_4}>|>C!= fyHvkbUL(DdXn2wh9FfWXqRmu6B{10F6{dOdt=*SiSwbu2,C+' );
define( 'AUTH_SALT',        '~S]gasj1Uk<A0zqssIaw8KHfb=WMTMV Tu9|po7QBy?qTa$++e_i,5(yi,:!$I`$' );
define( 'SECURE_AUTH_SALT', '*P$<|IFfe*y|v%y(693Q>sW$5d5!]>:*D+v;?)XZs>NRHaVi~/l5}Z$gr?V6jG;Q' );
define( 'LOGGED_IN_SALT',   'UE|Vzo=C[`7LSMBi/J_!3Qaaw/K<BhmkO?B^{a|I^]a|*`uI}%IlZX>@#l~ky+jh' );
define( 'NONCE_SALT',       'e]!#9>Q =h@^mE#s_0gKdg@?W[d(Z>ca]j*>|GV:UPn]$c# $dplY2T~ mNNrQh/' );

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
