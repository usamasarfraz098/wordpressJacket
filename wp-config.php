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
define( 'DB_NAME', 'geniune_leather_jackets' );

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
define( 'AUTH_KEY',         'v7(r6:rp>q.U8H$.F`PVf|Ac{tfGju&-7h9GKV4ld+P6]YnCnPT$;1;)FI<]4@,H' );
define( 'SECURE_AUTH_KEY',  '^-v+pv5?)2<p3uA7PP<,(0 h;3-H|x%w~h)gx4,Yj(EzR% A2dB!~Lh8Rhb[B/R>' );
define( 'LOGGED_IN_KEY',    '6.YqAJ_5Do#EgL@fJ@,%St9`L/&:P<N+mJn-p=rL(Y4m2Fynrtt@Uw7%Hi86ev@1' );
define( 'NONCE_KEY',        'n(P}=cACxhKcZ0Z$Ze7(vm -~-zh#]>xT)|`wDq-e4P6S.0E|x3|;BzTb7u/uazD' );
define( 'AUTH_SALT',        'owFgoQOH;6VTedrH`j^*Z1[#Gc)(qWCGBVg3nQuT#{A5S5svstOy62.lj^R+t;Lt' );
define( 'SECURE_AUTH_SALT', 'nIhX2><Q<> o#JN?q%VrxupP.ZW,$Y-&&73:>r7,|)hCUB9ehl;)3}r E/XM(w))' );
define( 'LOGGED_IN_SALT',   'i6+-S-FRr}N|y}!&=O0te~sivFtg6oZdDU4H==8~3A]E<1$mA%RXmzM5&bxgjMV`' );
define( 'NONCE_SALT',       '[b.Q)teDD3PpT|c<8QCe67c28>fD+PFz#7u#.l4F<:UAGyi(J>4/j8 ,VtuV5U<2' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
