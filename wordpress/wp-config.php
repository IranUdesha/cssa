<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'V+}GUPP#U^$4O&iALgN.YMJ=`Mg3,0Qnr%hzaqm+s;8MyG3^UBa*8vyO/^t;gCqB' );
define( 'SECURE_AUTH_KEY',  '])&=>1oi+iJii&eA9m.G&-qZ#2^Zr3b+Y8hC~b9od=LOT _ j$h.|[Hp&$BU0=_E' );
define( 'LOGGED_IN_KEY',    '9KU:a#@(HWxe?/.*qq/Nz3iKlbku[wxlIVC9{.K1o}{a.bR~~xCQ%q42Vpzcy@t%' );
define( 'NONCE_KEY',        's*72D[n~w>=66:C.~yN?pQB}H$Z0B<*.XPl?tQJ+GfLVY}B$_?w=qRxId1t9!L]l' );
define( 'AUTH_SALT',        'moW;ez!.y;<qD7EJiFhWiJ8G!8]`ceasnsHsL..>OiF-!j:7tIw,(-(oOO=uelgb' );
define( 'SECURE_AUTH_SALT', '31V `5X)}>[j#*~V.[[`H=C5*Q0+*n9I^ThU1SH~>?3yd`.{ >=>?IipFgtTDMN.' );
define( 'LOGGED_IN_SALT',   'HaB8cIRrdpUDBZbs|`||J11sauPHn8+P!]zR_-1$#1UL|6Y2asE6I|E{z},)vxBw' );
define( 'NONCE_SALT',       '^$BKz6.]hZmyz]ZtF<CrOYxiD=tq~xHo/X~}Z{@qP[!aEc8)=qr^cZmPoGtAvqNv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
