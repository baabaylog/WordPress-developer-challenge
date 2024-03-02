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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-developer-challenge' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '_]~IFi)NSCQn]b2 }hX$xngyfdR:RF0>S^c8}5TmXi%As)GMB7VO+~~*2~mCVx9D' );
define( 'SECURE_AUTH_KEY',  '$kzJk;g}OwXZ~)[,AXv]V%^C4`rGuTh][Zk6v=]fr!GmG64 JV1K[d0*P$e2C$e>' );
define( 'LOGGED_IN_KEY',    '&K/P@:W=F_Hm)h^SdH(C9Z)GX:ch#I/n#SgOJT*JT$}pMeKT&X4j9V`;Q5pq5&jC' );
define( 'NONCE_KEY',        '.x13(#X}|}w9/0kYjONK>P0%E*os>!Hrj#QdTq!h`Rm(X;,fEE:5fm)7t]2E/-Dj' );
define( 'AUTH_SALT',        '!p8`f0t|I=D,e1ak#f:4*f)/<oy4wKcp0H8:.P]g(ZT$$v`m,;%pmT8hFP?<c+&z' );
define( 'SECURE_AUTH_SALT', '8Oy&<vep7#DScO.p)H=,7`pc ^?d3D-[]Z0(8L?9^( *.Ks@1fiI5n$5POfLueO|' );
define( 'LOGGED_IN_SALT',   '/!bi`w%(s[odY1>9!aV(e(=PUSNF0$fM;Eppq`nrT;Td}_X!]+3o2ce]#oIw5Q:s' );
define( 'NONCE_SALT',       '742zN(&o }~}2~`Z,To25v`Qd4/ wMh_gvDx^=#(YY9#0bNb/Y2%V#CLQAw_F/U4' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
