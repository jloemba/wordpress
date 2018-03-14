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
define('DB_NAME', 'esgi-3iw2');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Fr|v- Ya<:6#q]3XfKK8PZf*13ayZHRdp oVr-Gz<44FRo$A=7u$yu*ay*:CLrrG');
define('SECURE_AUTH_KEY',  'C,clk)WT3<EKsGkC3;oKS}[z}&t5-?>-b&{.dzGYRjq=S-6mHoF*Y*zmSS*Pjj !');
define('LOGGED_IN_KEY',    '-F=_;_URW34OMrxW:4H)[p-m(>;U7($MiI!bF|NriF@3>d6fZ<WpC!Vymw2hmIN#');
define('NONCE_KEY',        'za~V`SvYF#SF[mfB_a7l#e#L!3@44[~$7;Dhebp+Y<{UX?QYqqFeUk<Ww1A/oK!b');
define('AUTH_SALT',        ':WY{GB{b:5L,px&hbkI22zmpVG_,nQ3{xYB2{I?!{5mXL,^13@=8 BcwUQPKLavF');
define('SECURE_AUTH_SALT', 'Ia@%eC${)h]}g+9`heV;GNJ-R}BdatXyBlN0g~E=?%Vd$<px&A2Q:5<wPgE=rx*L');
define('LOGGED_IN_SALT',   'ujKLThFq!whKqyhI7~uYiKG[JdEJY19 r* t[cMAoThI;y>aw!$11#xvs(Wb70uE');
define('NONCE_SALT',       'xj|T*d+m_nk1m !u4cz^ m03?eE?K][B1]fsrk;[NS#Ohk?iZj/JmbZ%->YPMTQS');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'tbl12_';

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
