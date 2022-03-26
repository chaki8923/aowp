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
define( 'DB_NAME', 'company' );

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
define( 'AUTH_KEY',         'qE4wBIoxNZ-M|Yw8R&1jo2=TzDi^%gAWxD3CW,nFyM%`wh_~pFi@47`K:[A7$&_f' );
define( 'SECURE_AUTH_KEY',  ')$|+.HCW`e9rK6Bm!=-3B#A{WXBE:LB+,%eyC%i,Yz#Vv_v|AMEyv.io7Bt] @g2' );
define( 'LOGGED_IN_KEY',    '5%BS&3J3PD`Uav$jHI4X@=nU)tezSi{6TP[CfYwwc|P%~;s/ <nz@#0/9:>2b[v_' );
define( 'NONCE_KEY',        'dn|a=:k#=Q `_X!z})/W5R[C:cZ{W4|1Rac9L(Qsf8t>cWl$[t`a?7G<i?y0s@Sj' );
define( 'AUTH_SALT',        'nWx($R|-Y5]eH:$WGuB`Jtf9Ajper^]H_g)QmP-iP.vrcU)%Ki}SMg$iiqZ3^:+x' );
define( 'SECURE_AUTH_SALT', 'ME.(Jqlh4$1&S;p#EhS5 *??se*UA3G~b !Bga3(5C}W~B_%[ip<#}(pj1*VhKP^' );
define( 'LOGGED_IN_SALT',   'w5>_fOKf:v,Q{[iCZjyHTnre3Wcid=#(p]54v<kS}}Nh)3k&Q[.ni__i-G}qY-9)' );
define( 'NONCE_SALT',       '7B=cCBH4*GQrS9%0r,Ca:$7LDz4^yh{0Cb/=iM^_2vrblDcJ:,%9@7@LimsJYH[a' );

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
