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
define( 'DB_NAME', 'elsharqlms_nw_bd' );

/** MySQL database username */
define( 'DB_USER', 'root' );
define( 'WP_DEBUG', true );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         '?Fkh?qwH8p!s,&-T;Dj)R|,j:Q`wrQ)z0Sb7o}A-sa)GUlztL-jKw>,P5ncv?o]e' );
define( 'SECURE_AUTH_KEY',  '|q@@>XNl1;>baohLwyE}fIe_Gw0NxGcjk8qw%EH< jY~^b=,nK;_p0hJ3()+gT2`' );
define( 'LOGGED_IN_KEY',    '@UCUD0=Set,lj{%Uz0X>C`[C$i-1Uh;o/>#ol~*GZ_.eFIM@BNLJIYT?i1lD$*0J' );
define( 'NONCE_KEY',        '.wu@2p>uWmHoK43;y06GGG!Fi)*B-7m]cfPhzS&NaFn-(VH,%!*M]mdv0Kx=FhI5' );
define( 'AUTH_SALT',        '&Aj:3EX{B6fxuH<Z+GudUUhx+POllU 7_(gnXmd?sMi?pnM|q/qkcW1[{,Q[vaVj' );
define( 'SECURE_AUTH_SALT', '#LrGq+1H<Vb9V]u2fyaI&`j36-Rs}:)jh4z;|k%{&*pET$3gnXAbJ]Zy4!H`m6ym' );
define( 'LOGGED_IN_SALT',   'Bok8]j5RKDY*Dfxur:rvlH +*C|aIJ!3fH5gq#33d2m0J5c2XVyg-jL+Um$i|`=F' );
define( 'NONCE_SALT',       'TA.RbsYF0VXMUW`aesaA@;6VLOz|B[eV-zxLCc_}&NB(KGF=HgSsE;<pmS_LTm$}' );

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
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
