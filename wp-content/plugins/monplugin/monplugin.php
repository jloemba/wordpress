<?php
/*
Plugin Name: Mon Plugin
Plugin URI: http://monplugin.org
Description: Mon premier plugin sur Wordpress
Author: Moi
Author URI: http://moi.com
Version: 0.1
License: CC
*/

/*
		Un plugin est censé pouvoir s'installer (créer sa table en BDD) ,
		se désinstaller et avoir les méthodes dédiés à lui-même.
		Notre plugin Newsletter aura donc un objet qui aura pour méthode install(),
		uninstall() et save_mail().
 */


//Appelle d'un hook pour mettre le texte dans le footer
add_action('wp_footer', 'Add_Text');

function Add_Text() {
	echo "<p>Quand le pied de page est chargé, cette phrase de mon plugin va s'afficher!</p>";
}

/* ------  ------ */

/*  */
class Mon_Plugin {

	public function __construct() {
		/*A son instance , on utilise le hook d'activitation et de desactivation du plugin en y assignant
			les méthodes dédiées.
			On implémente par défaut l'action de soumettre un mail pour l'insérer en BDD.*/
		include_once plugin_dir_path(__FILE__).'/newsletter.php';
		register_activation_hook(__FILE__, array('Mon_Plugin', 'install'));
		register_uninstall_hook(__FILE__, array('Mon_Plugin', 'uninstall'));
		add_action('wp_loaded', array($this, 'save_email'));
	}

	public static function install() {
		global $wpdb;
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ma_newsletter_list
			 (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
	}

	public static function uninstall() {
		global $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ma_newsletter_list;");
	}

	public function save_email(){
		if (isset($_POST['ma_newsletter_email']) && !empty($_POST['ma_newsletter_email'])) {
			global $wpdb;
			$email = $_POST['ma_newsletter_email'];
			$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}ma_newsletter_list WHERE email = '$email'");
				if (is_null($row)) {
					$wpdb->insert("{$wpdb->prefix}ma_newsletter_list", array('email' => $email));
				}
		}
	}
}
new Mon_Plugin();
