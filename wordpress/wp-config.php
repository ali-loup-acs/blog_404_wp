<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';khhm91zomCX>rQRtAe>1=RS~=<ON(jf$)38%}Z$H1mlT3jE 9 9blyn0p6aGed^');
define('SECURE_AUTH_KEY',  'J~XEs#4ESq9pd~PI%*mW-,tsgu6DfmOX}F3L{5&G08#6Fzn:tk+Cz*e5$;2OU>GT');
define('LOGGED_IN_KEY',    '?t;rw<s;R*v-yk7T*iF9c+pI?VN4A]f`X-m,:=AmrY*lk&WockO(y`d~bPDvdHvR');
define('NONCE_KEY',        'N)y0hX<R@?l_BcZ3ldKsoBKkp~0B3FFt]7XY~n)XA66prkAp2TE1ie;6`_-c^2}H');
define('AUTH_SALT',        'cQ#1-]de5~7O7w{]c?+]4b-BFY)0==Rp4+#Yec0y[,.ktq:&`Rb^^S&L3V yF%s5');
define('SECURE_AUTH_SALT', 'x$b4:=43C3uZ8Gsg^VTP?J,x.pK}>_?Mut%=yz}=P%ft,Ub@#>:Oq>EMiMW2;aTD');
define('LOGGED_IN_SALT',   'b#Ls_hC<p%l#o6I$|dkp;nuB`EK?mXfrG3?s*ys]!1d4#Z`AlNja@PpaU+3wH7M~');
define('NONCE_SALT',       'iDFQ<a!L0bc0p3L%}6QJ]2w _XSvHx*$X-U);h,(3ZmTWz1sqWz%}w!J4S>x[;:1');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');