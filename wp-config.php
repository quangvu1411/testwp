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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jrfitnesswp' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

/** Database hostname */
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
define( 'AUTH_KEY',         'CfoM?^?$yr]f*_-BSDEG:1hsPST]@3.D9{A_ $Y4upSG!!bIHpZIlhytofSlXE|R' );
define( 'SECURE_AUTH_KEY',  'h/VV:/wiz%G|xH6#ib+ZxT4$z9~Pb<*dzv8^9;bkYjfe0V@!PubemPCU`{jWS SH' );
define( 'LOGGED_IN_KEY',    '&3mTsp4}]]7h;Hd^v!Ukz1U1aICSXDJ~zOW1(@I=fK:v0Q;&7cQOt!af9?mo&M`_' );
define( 'NONCE_KEY',        '7M=V~jP7=R}-7TOn(M._Lt_.U]6=]~#KK75WSC3B}l<t~SMOjgAGu4~SVSR3HOU]' );
define( 'AUTH_SALT',        'Z=k{jPXF)7mSU6F0k!pVFjE8DRmLi0>$jt_%c6@i9Vg.X%I^R)&= {T[2B+lV=XV' );
define( 'SECURE_AUTH_SALT', '8@e_%qBNg+ fj$GslbR:?u*4x$vFF>TaZf;cDD).{Nd=4z!wp<RW%oI7bAD2Z]lp' );
define( 'LOGGED_IN_SALT',   ']s/z[2.o(TJ5JWvo>oV/m?{(TPt,K)wznMvE+c 74aPBfa3Nr-_( +6z{=zBV}.G' );
define( 'NONCE_SALT',       'nq[3`dk8%PY!QSH%:4k%*PCl&dwe 0FPvkWsln4Q{GTw%x+]pN)&w0^+{_!xK,X4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'jr_';

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
