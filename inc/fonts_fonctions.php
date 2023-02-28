<?php

if (!defined('_ECRIRE_INC_VERSION')) return;
include_spip('lib/php-font-lib/autoload.inc');

/**
*/
function chercher_fonts_installes() {
	$liste_fonts = [];
	
	$liste_woff = find_all_in_path('css/fonts/', ".*.woff\b", true);
	foreach ($liste_woff as $fichier => $chemin) {
		$nom = nom_font($chemin);  
		$liste_fonts[basename($fichier, '.woff')] = $nom;
	}	
	return $liste_fonts;
}

/**
*/
function nom_font($chemin) {
	$font = \FontLib\Font::load($chemin);
	return $font->getFontFullName();
}

/**
*/
function info_font($nom_base) {
	$info = [];
	$fonts = [];
	$formats = ['woff', 'eot', 'ttf'];
	$info['nom'] = '_';
	
	foreach ($formats as $fmt) {
		$res= find_all_in_path('css/fonts/', "$nom_base.$fmt", true);
		if (count($res)) {
			$fonts[$fmt] = $res["$nom_base.$fmt"];
			if ($info['nom'] == '_') {
				$info['nom'] = nom_font($res["$nom_base.$fmt"]);  
			}
		}
	}
	$info['fonts'] = $fonts;
	return $info;
}

/**
*/
function font_display_options($defaut=false) {
	if ($defaut){
		return 'auto';
	} else {
		return [
			'auto' => 'auto',
			'block' => 'block', 
			'swap' => 'swap', 
			'fallback' => 'fallback', 
			'optional' => 'optional'
		];
	}
}