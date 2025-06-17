<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'masalembu' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'YQxa}6RDp~~[){4y::ecT=KkNo_bS5+4PlAo-PgCbP9C8t8w_dIG0%tSarKNU,Tl' );
define( 'SECURE_AUTH_KEY',  'HJ-Q6.5A/[KT?W^?}Fy$#w.+|3@D}EZ{}({lQUC^QMY8^<t!V^-QSn7S}1?B^KO&' );
define( 'LOGGED_IN_KEY',    'L-k&T$dELr`7=< x]PNiL+K`3o)R<2*6p}Qm)UO>[w$HjVT3YvD7j(TE,&YpSRYB' );
define( 'NONCE_KEY',        'mX|@;qUs?#RnN&hRP1l#5<(CV-]603M@2mLJxB&M6BJX7G,}h?4%{R3:1Wap:0Nr' );
define( 'AUTH_SALT',        'aqrt^|C#B1<C;kK$R!hR<FYbO8_Z<aP12*@AVK+})v0&kQCSK onxE53]+=P}5S,' );
define( 'SECURE_AUTH_SALT', 'lvfzPg>FP%OBeI{^dUB]3(?99$;ZER)|V~:C}R0MfsW(* HFNCZ)Xvoc6yPGzy{#' );
define( 'LOGGED_IN_SALT',   ':[UX8vmS_/<%|0=LH4#UvX$R#!cN6iE;l@y__%3+fGV7+1~.>n2::4lVMa6<EKAU' );
define( 'NONCE_SALT',       '`F,!;nR|{ F+ARi2qxM>G+b~RKC!uM<i0N5CVy{tJ6^Zz=FS(T)O* )F[FcFXhYS' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
