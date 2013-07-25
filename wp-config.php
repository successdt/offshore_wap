<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wap');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'i3[xVsQl^,{&y7yLx$#seI/L1Yr)m7t_)J;irYuM:kQLgpL}{we)[r{`$)| vs] ');
define('SECURE_AUTH_KEY',  '?}2NUP<//G]>v_7]v$mO<kk!m/]e|VdVWDWg#6kibSUB}m#4]UG#5&G%#4_6?=Z6');
define('LOGGED_IN_KEY',    '!wd.Q)Mu*6tk4nRCSM7V#)C>W]5}/MV!j^|-4SK$gfZ^6cgY3(9hFxpe@owtz+KD');
define('NONCE_KEY',        '}wJWO8+e2)lU>&G@(#b:c,ZH(1CF{.&#L:P)4$q8R@6U8N+; btPK40jxJr`KjZ~');
define('AUTH_SALT',        'csA3ZNaAN[^IHH+Y,+xK9$.m*zX-17_4^{32^EGz.&bolI22V]33Tu0bj]v_<6,#');
define('SECURE_AUTH_SALT', 'CU=4<[-l83hcN%j]NS;i~=FO6>3#A>)?!0NG(goMTLhDp,4jjuPs{F;uU~>DF=16');
define('LOGGED_IN_SALT',   '|u;$6Gpr: vBi03U9(( )C?B~*OP(tr)mmc<?GsAnDB0AX~]17[]7-or|D+}ka@)');
define('NONCE_SALT',       'Z<N2.u{6D6!QAnlanC03hX VY-<| lt6{,]dGN~@x&~Dpb,T#+GRjNN9<A?1I5g{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
