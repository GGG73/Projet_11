<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'motaphoto' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'TOhe=|kM@-I-.1auA1O3^RpDLb]ocsQ&9FG)+P,F$WbZ[M/T$5z)@?=>}0stQs?C' );
define( 'SECURE_AUTH_KEY',  '.LFsoRa<y++G!>>a]1YE58HLyFU$$:$!jbpidc*c-Zqkxeq@b>mEuUq1+V>crghA' );
define( 'LOGGED_IN_KEY',    '|e,$Xj&x/J*BO(pE)7[L[& *vs,3RpEJ|M(vFr:oT@%oo/ye2zagl,bs,;uN5I[0' );
define( 'NONCE_KEY',        'nXcDc.]NnLj^Q!PaI@C:wh!In3LS65~!<]}Ivg2ziZL]b`<Z6J-L]yTA0$$O=sN!' );
define( 'AUTH_SALT',        'B`e<|PAPx0ZXfXC;y)Cc_({2AQi&nP_IyN~7;t9l}}iQVA$.<u6O9[!GH$ry67NN' );
define( 'SECURE_AUTH_SALT', 'tBnaHMYA u3{^`H:q9xVHKETUYr~l)Y_&w{ucdw~(EqaSf?Ktx8]4$g2`5Lqrfv>' );
define( 'LOGGED_IN_SALT',   ')l8rX {y#|1YZwVW6d7{z*G{RpPvF9dxSxn&[Ws?fcNSV9C6NH~>`S[;kcbvf+ko' );
define( 'NONCE_SALT',       'zLt~F(-G`oScu+lg_`;:GN|[`bB@Il~+SJ5avan]Ur2t*_gC+pclW!@v0b?`5Rtl' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );


/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
