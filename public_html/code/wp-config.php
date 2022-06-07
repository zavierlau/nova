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

if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') !== false) { $_SERVER['HTTPS'] = 'on'; }

else
   $_SERVER['HTTPS']='off';


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nova' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Rootsecret1' );

/** Database hostname */
define( 'DB_HOST', '172.31.82.56' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

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
define( 'AUTH_KEY',         'Y k}vfg>m-+q,z.K%IkK{}B}Y<rn-Gr 7;dz<g-upn^W$nD3sIJ&C3;`4j|IyuQR' );
define( 'SECURE_AUTH_KEY',  ' +g?[{}g:lwJ~VQQiDq/WoZfmF)U)21_2ed^f#-)KFZPWf% rIKE>L7-R@T24c]*' );
define( 'LOGGED_IN_KEY',    'hTNb]@@%ph;#pElI?3xuA_cgb-D+%bk]tq%lG]<8CT!ECzQ5%6z0&j7DQ:pgF}7]' );
define( 'NONCE_KEY',        '?b$eLsp?Nc:*`#TEq]cewy,+(7v-R/8+OAo5[,?i17phbM|=3(q[T4(8!CMH@Jm?' );
define( 'AUTH_SALT',        '_p:?-@HH~!_,C]b>kJ]=lB;:U|`r28p{!x&+`ZsB~pzo5fdh/ILdc6#-Y`|6B+Vl' );
define( 'SECURE_AUTH_SALT', '{P}pIjU5>zt$07Yz|(o-Q:F!Ez>`b=xGCr*!2=!y J3D8R70v,QqajL&Q3 GtC@c' );
define( 'LOGGED_IN_SALT',   'AD`q!A$&$_O_1`%h(NK3a?GX:e5:Eh-jkr?)*j04]l/sM)!#]izc@v~0BA6[.Ok<' );
define( 'NONCE_SALT',       'w1{11im*d<}+KZYJ%w*=Ypf/}I*~?c^5`x<!v>tLmdaH,O@ZFshf=pI*hd(GA@SW' );

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
