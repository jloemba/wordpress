<?php
/* add_action -> Méthode du CORE du Wordpress où l'on assigne le nom d'une méthode à executer associé
 à un  état (init ->au chargement ) */


//Création zones de menus
add_action('init', 'theme_menus');


/* Indique que je veux implémenter les menus 'Menu Principal' & 'Menu du pied de page' via la fonction
 theme_menus().  */
function theme_menus() {
	/*Dans le back-office , on retrouvera ce menu où l'on ajoutera, modifiera et supprimer les liens
		http://localhost/wordpress/wp-admin/nav-menus.php?action=locations
	*/
	register_nav_menu('main_menu', 'Menu Principal');//Utilisé dans le header.php
	register_nav_menu('footer_menu', 'Menu du pied de page');//Utilisé dans le footer.php
}

//Création des zones de widgets
add_action('widgets_init', 'theme_widgets_zones');

/* Indique que je veux implémenter un widget au footer .  */
function theme_widgets_zones() {
	register_sidebar();
	register_sidebar(array(
		'id' => 'footer_widgets',
		'name' => 'Pied de page',
		'description' => 'Ces widgets vont dans le pied de page'
	));
}

//Création d'un Widget simple
add_action('widgets_init', 'custom_simple_widget');

//Implémenter mon widget customisé dans le coeur de WordPress via la fonction custom_simple_widget().
function custom_simple_widget() {
	/*Dans le back-office , on retrouvera ce menu où l'on ajoutera, modifiera et supprimer les liens
		http://localhost/wordpress/wp-admin/widgets.php
	*/
	register_widget('CustomWidget');
}

/* On crée un Widget customisé (héritant l'objet parent dédié aux Widget) pour implémenter
 plusieurs fonctions à la fois*/
class CustomWidget extends WP_Widget
{
	// Constructeur
	function __construct()
	{ //A l'instance de l'objet , on attribue un nom à ce widget , un nom de classe CSS déjà prédéfini via un array
		parent::__construct(false, "Widget Custom Link");
		$options = array(
			'classname' => 'custom-link-widget',
			'description' => 'Mon widget perso'
		);
		$this->WP_Widget('custom-link-widget', 'Widget Custom Link', $options);
	}
	//Affichage en Front
	function widget($args, $d) {
		echo'<a href="'.$d['url'].'">'.$d['name'].'</a>';
	}
	//Affichage en Back
	function form($d) {// $d -> la valeur saisie dans le champs de saisie

			$default = array(
				'name' => 'Google',
				'url' => 'http://google.com'
			);
			$d = wp_parse_args($d, $default);
		echo '
		<p>
		<label for="'.$this->get_field_id('name').'">Texte du lien:</label>
		<input id="'.$this->get_field_id('name').'" name="'.$this->get_field_name('name').'" value="'.$d['name'].'" type="text"/>
		</p>
		<p>
		<label for="'.$this->get_field_id('url').'">URL du lien:</label>
		<input id="'.$this->get_field_id('url').'" name="'.$this->get_field_name('url').'" value="'.$d['url'].'" type="text"/>
		</p>
		';
	}

	function update($new, $old) {
		return $new;
	}
}

/*
	add_shortcode -> Un hook pour implémenter UNIQUEMENT DU code court
Créer un shortcode [hello] */
add_shortcode('hello', 'hello_func');

function hello_func() {
	return '<h2>HELLO</h2>';
}

?>
