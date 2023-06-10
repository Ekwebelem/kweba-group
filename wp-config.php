<?php
define( 'WP_CACHE', true );

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define( 'DB_NAME', 'myfuycnk_wp524' );

/** MySQL database username */
define( 'DB_USER', 'myfuycnk_wp524' );

/** MySQL database password */
define( 'DB_PASSWORD', 'pB2S-d43c-' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'orkfftx7gj1r1mabxfyztyrfpw561ft8kdiiuhz5sc6zurkb2qyjvbfewdsshzz7' );
define( 'SECURE_AUTH_KEY',  '3csmjht84ajl8w2u6mjknoq4lymcmexgoaeqz31xqtk4g9xgk4itlezjib6vaeuf' );
define( 'LOGGED_IN_KEY',    'jtel1idh5jtt7qbghsobwoiqkcmry7ehmahgmkgcrrer2rmpmryeaz2jllij0myx' );
define( 'NONCE_KEY',        'dbyqwgolltadyrnytafes0hh6d5k3jpgmy88phn0iesoxzqr0yccu68jxvsfk5tg' );
define( 'AUTH_SALT',        'n8ibtu0ss4hnu35uhiyfqje6dygkconqr66tdjegvvqfx5kafsuxatowgkxtj3f3' );
define( 'SECURE_AUTH_SALT', 'qyzr3s4n394hgbvianl2fsfx0tryq9oosilhq45v4im2siewwyxywnbdwztrajni' );
define( 'LOGGED_IN_SALT',   'fzj2vxu6vnona7rbmihet1vmli2u7yr6mj2iamdfn0y9imycgm3acgtj4mgdomlk' );
define( 'NONCE_SALT',       'qfyuewej4szewwotbnwlnhakdyalu6s5qedsbnwh8zliomtnbjy8voxjccrdrgxa' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp12_';

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
