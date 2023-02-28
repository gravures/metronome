<?php
/**
 * Plugin Metronome
 * (c) 2023 Gilles Coissac
 * Licence GNU/GPL
 */
 
if (!defined('_ECRIRE_INC_VERSION')) return;
 
function metronome_scss_variables($variables){	
	/** ScssPhp permet l’injection de variables, 
	*   directement depuis php, via un array.
	* 	 - Les variables dans les fichiers doivent êtres 
	*      initalisés avec le flag !default
	*	 - la valeur de la variable est de type chaine/string 
	*      et est interprété comme du scss
	*    - le tableau n’est pas multi-dimentionnel : les valeur 
	*      de type array ne sont pas converties en scss maps, 
	*      il faut les rédiger comme une chaine
	*/
	
	$variables = array(
		'grid-columns' => lire_config('metronome/grille/grid-columns'),
		'grid-gutter-width' => lire_config('metronome/grille/grid-gutter-width') . 'px',
	);
	return $variables;
}
