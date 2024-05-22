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
define( 'DB_NAME', 'vetsexpo' );

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
define( 'AUTH_KEY',         '~3N/Dk!^`TbaMx82IYegy2iVqyRkZ3.oh>=8c%]g!hM7hU(:Fzi1>GQDI2[EBc6/' );
define( 'SECURE_AUTH_KEY',  'FpOft:P|Cd2 #AI&|V7G8^K;k4MMCX3EVKra 6L^f%pzL|t)`_Q J/A} UCopW)b' );
define( 'LOGGED_IN_KEY',    'yM7ZUlI`c_[:zUg@ZD|0vURH+[Uzy0RQz#kBA$0*~_XO>G=RULSt|@i{.`S36@_S' );
define( 'NONCE_KEY',        'VE+.]YR6-5`nBBbpUdodzC6p.lMdRh^l8x}%k18IQu/:z=7S,mFdyQmX>M1W-~x5' );
define( 'AUTH_SALT',        '09$/!YVBfW*-y-ie/3-at%!V2IS_N+>E9+nm: $Torlq: >nI/{43jrE0Rnx-$`S' );
define( 'SECURE_AUTH_SALT', 'K2pPk%.,/3<[7wo7B}IwvqSe3PB|V-H?XZTRW_n;xkF/mM}0W[/MC!y({ lWF)Lz' );
define( 'LOGGED_IN_SALT',   '[`(y,qbe9wZU($z(hCQC1w,&i;m3Y(d;eYC^oK#DpOz?E/7!wr3~EgoNF,Q;gDa]' );
define( 'NONCE_SALT',       '9uL5Ffn e~1hLomHW*m79CESqUu07LEJzuF.cSL2-IuS13~B`Eaf,Xr}^*dS0p8{' );

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
