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
define( 'DB_USER', 'user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'k8-mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** The home url you want to redirect.*/
define('WP_HOME', 'http://IP:5050' );

/** The site url you want to redirect.*/
define('WP_SITEURL', 'http://IP:5050' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0j@?:LYBL9[J5lYxIIP?x*vujVJ=Pt+Ehh^/*]20TM~xD6`1HU&58=feOAjJP6+%' );
define( 'SECURE_AUTH_KEY',  'V)]Si{{!/a0]_432ae-KBQwHJ hjtUbSCkgoDL9`Jjvovm` ~{GEr,R`yg.%tfoP' );
define( 'LOGGED_IN_KEY',    'LK.GOxU&zs%Hb$-EUT0G/5QIdy=mVusRy5d,|SVAp2:0AFmW(!oGQ`]5BDaEL(4B' );
define( 'NONCE_KEY',        '%rI1}T_Sdg%q[Pa%lyLiN;G@nCL84+tp?(vF~aicDRP9-f5paHmApWm<]_{P9>|U' );
define( 'AUTH_SALT',        'Xvs`6Z4VfE^7PNw,dcF=iPtY(xdfooz4n^<WYISLvJLwG)i*PwIC`-j{rqu=r.7l' );
define( 'SECURE_AUTH_SALT', 'Rc}_Evj|HzWA7 p&5yTT~=dd*.doRo[2:!ndt?:xalJSQR5]O6O0Y#V{sOkuTt@W' );
define( 'LOGGED_IN_SALT',   'v|I7OSwJl:v<DZb~hEdL/Ozm4#rl4kJ1ByR1{:<Q&n!^x=l^?4$~]c4) ?N)HOU1' );
define( 'NONCE_SALT',       '(`4O=AiV6+U{4.ph2-&! W]R:*cwf.6_nRY1Y?B`XwsW rC%,#+oq%r$>_7*.,79' );

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