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
define( 'DB_NAME', 'interia' );

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
define( 'AUTH_KEY',         'V^1j+3#fG?*[/l0tT`f1@;/{Zh_mR,@>F3LSj-lNkK!utl}Z*naOzq0Mq7ti37si' );
define( 'SECURE_AUTH_KEY',  'CK_|E}&5 1R+^wYC.l`BIM/{$/RS4^w<NLQCEUAUv4C0q7ze`aZK5Pzv0Co-7!$r' );
define( 'LOGGED_IN_KEY',    ' 5-LDvZKL_$_.3ki%gx>%/_`pm#0i6y,S;_J!,v)OgDZ2?|!^_a1%y|G?WP*W=T|' );
define( 'NONCE_KEY',        'Q{^WT~.w)4(y},jrFg +xJgVq3&Brq87M35*&TK>ZV2HLYKgMgc5*b,H/u{%/O^K' );
define( 'AUTH_SALT',        'Ng%v(l|  BNc*Vu?A~THkX_,<1U>tl/}3aJ=;y(yVfy#UB#ik#Ou .zmdw-lQJ2:' );
define( 'SECURE_AUTH_SALT', 'xJuIInO(& ^&#n+QGSjf%LsVvC]:qEs$rs;@`3^k*3+EG/dAv>$Z!nwclkG5b4mM' );
define( 'LOGGED_IN_SALT',   '?(2&J|^A+G%z5NT=_;A%+[3c#q>KRVDO}.O!>am3?W@kYUQe?V-vqZg#p0H0kI_0' );
define( 'NONCE_SALT',       '}$98Me*!O//$^Jufh !S_[SsD)ymH9I?j+?m|b@gJN*)a`F{V&(/!Ia`%^nWcH`d' );

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
