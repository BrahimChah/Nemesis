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
define( 'DB_NAME', 'wp_nemesis' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Ux[:mO[Fr.$W*MlR2i}hmdMk-!kx~4AL+]FR%`6g=9WXTi[]8R/!_tenSY(?-~NC' );
define( 'SECURE_AUTH_KEY',  'sN~QPWGrQJ[cNM8>cu1Q[tVqgS%<$Y$~MMdHi)G$8$;52/#Py,84*mJID O/r6S.' );
define( 'LOGGED_IN_KEY',    '[sX2]qhSt^e.t,ZOGFq@>p,{n~lCBrg@4(2b/&caW!WiYn*6k*;J?l(5F#09<gj0' );
define( 'NONCE_KEY',        '/HLAGm]y3r?xzHhTX8 13{;c<f@{|dNQrK1^tjKG^KyFc`QFPv7=r8hFO?F L?=N' );
define( 'AUTH_SALT',        '^(bu96rHPyg`8iW~asEK27Rc?fOarg!yi0;>lf>nADHpn|}-.G&i.C$i(4M^yAq_' );
define( 'SECURE_AUTH_SALT', '4;YERR3]aeo_f1NT!x}:`:iJsZ)ragT^Jv7`Hl;Gn@.sG(ceL9em 9@W>fw>&JjZ' );
define( 'LOGGED_IN_SALT',   '7c?/^&U1LCb0B~r9+ip91&5i!Os9KH=1sy?VRo[Ec$dF)Y6 f(Nh!2:SoE O$;:&' );
define( 'NONCE_SALT',       'fvVI2Z9db_4FUsTjO[~~wTin`n-&|JoT~8Vgg[Iz(H-.2:7- ZFf .a.CS:G;v9l' );

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
