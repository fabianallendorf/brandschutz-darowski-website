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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kd52609_wp' );

/** MySQL database username */
define( 'DB_USER', 'kd52609_wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'H8Kllm9f1D5D' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'iY)kiWf&yVHK*3bS,4&rUTJ,`!/F{C^O4X_P)UC:ful$piAa~Vk+RzYt}XgAs? y' );
define( 'SECURE_AUTH_KEY',  '(&QQ0YhdP w>``jJhFh~{!EZt>=HRkVAUNQ#hZ1(MUW|nYU>Rt3+})4*yp05#8+C' );
define( 'LOGGED_IN_KEY',    '$%+pU3eP4](N6w>;:^SE,)c ;v7o]Q6Tec{1h&L7V1EAdsp:|1Gn}1Tb:]%<)HeQ' );
define( 'NONCE_KEY',        'LXs_u4C[21U>l~_:n?|Np9EA{K&75_^BJ<,g*}g5n4Zhe$Y1qDmHXu!Zk9Qv&]eB' );
define( 'AUTH_SALT',        'U2^3<hj/8V(?z9y!.1 >zMFZ_}0?R?UMyyVbK(LwFAs~]#740Q?p6G^bMpZ=?e|z' );
define( 'SECURE_AUTH_SALT', 'hE%L:i1S_F=_GJZuOq)azS!L+8JR*cs?Hx<UUa?^<*ej]CMe%?p5ZFne< GGNdYV' );
define( 'LOGGED_IN_SALT',   'c=sw@(kuz9T4do0NvKRk=OT8cLpL#85,D:>`;k$7v:Z~E#!C]u73(O50.GHX*zZJ' );
define( 'NONCE_SALT',       ';Our;5)*s4aOp@$<5q +_~)ea*)ecrpXhJ.y+&4=b&4Y7+7GmGgZ.VA4ZLt?C1_6' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
