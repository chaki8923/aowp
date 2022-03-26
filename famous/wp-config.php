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
define( 'DB_NAME', 'famous' );

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
define( 'AUTH_KEY',         'rx[3n07>#dot9#r~yEPy2@ALspv`Iv]`EG&gn^7(iGeJwUnP j<odlJ+X)+c_j<z' );
define( 'SECURE_AUTH_KEY',  '}Qcwh>T:?fS@l!B`qBW!02A_ExGcKq/Kv<lN.}sfrxw+oV&dB?K]pwhSUZ-$.CkW' );
define( 'LOGGED_IN_KEY',    'x2.SuvGbD>_%g3cm:i[N94^f$:72^[wU$>i=H:|j[;,@hC`J},-1G%C 1&TLj4>F' );
define( 'NONCE_KEY',        'uj$+p {-fHes=ntNy[VtG?^$b1j)sMT%*hU?CV+2u8XgP_~SK,LkBHqOe18e1Y[]' );
define( 'AUTH_SALT',        '>0=bU}2K_W!9owAZni.:WOik&?(8[[Q<0LYUJUyji,m~0NsC [[#32+zNOBz_*A=' );
define( 'SECURE_AUTH_SALT', 'Auw?=}K !{80cFPnMuI$I:>W^31Ud`+>YXo~D+Y[^JxamlY:r4~c=OuXYZg-uRhH' );
define( 'LOGGED_IN_SALT',   'Di{3x_M/:p3bN5;`}]0T$3$b;tMf|>sjI~6Ha+d5.51y=fC@GXE9U}O0eth@E/QL' );
define( 'NONCE_SALT',       ',P(rN&:QzbAwV`M&[%.0GRwhTb<Ji2anG{BJ[mUl>qMO<`/%7/0J}=tgaq&w|*WU' );

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
