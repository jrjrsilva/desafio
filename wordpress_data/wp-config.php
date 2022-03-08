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

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', '' );


/** Database hostname */

define( 'DB_HOST', 'mariadb:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         '45heq,zK/R_!mq[9_3@b&Aq3l<0S_`H#)Fi|O5`oC*g4{L{YHtaaI$34E6?;JAt*' );

define( 'SECURE_AUTH_KEY',  '7m9/N+]8#%Z%ST@mIF@a:C0zbgv:$*<)jY~sv)Y}IW`%@BGc:P*u[.IB=dSchJ>3' );

define( 'LOGGED_IN_KEY',    'jxdh-E4ZL8*YTd:C|4PB3z2w(4Sz._D8i5*4uq$<q>F(2rfW`Whza|6zpiabe32+' );

define( 'NONCE_KEY',        'Nf,s{*Kob%I-TxTLU/CujC&raPiGQU$I9ogS7m(:#i>i=vzR!7b_pZ?4npdQo3Da' );

define( 'AUTH_SALT',        'iBC`Uc&)!|gN,n[@`MdBl}2p+L{C[d(j:#o~{vH~Jkn2TnLuR_mezGZ]:`Rhjq_F' );

define( 'SECURE_AUTH_SALT', 'OLTB*IwrYp<)<_T|7SqIUX(n>4Gf+*a_Inez[,q)GuEu[Lk*j!rQ( A[/o]DUBX^' );

define( 'LOGGED_IN_SALT',   ':Cq=<^iB>W8R#zfNUsvg/^,k<u2TyAR! P.8;5R!^&{j@oV]z !2@4U2EETpq(Ww' );

define( 'NONCE_SALT',       'yF>?FYAR}_k}uu:XvN#q(fgVkCnkg}[7(e.C*YG!A6T~h0<2}DE1H3IDLUD|:>5F' );


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




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
