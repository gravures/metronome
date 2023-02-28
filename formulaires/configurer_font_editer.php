<?php
if (!defined('_ECRIRE_INC_VERSION')) return;
 

/**
 * Un simple formulaire de config,
 * on a juste à déclarer les saisies
 **/
function formulaires_configurer_font_editer_saisies_dist($nom_font){
    // $saisies est un tableau décrivant les saisies à afficher 
    // dans le formulaire de configuration
    include_spip('inc/fonts_fonctions');
    $info = info_font($nom_font);
   
    $saisies = [
    	[
		    'saisie' => 'hidden',
		    'options' => ['nom' => '_meta_casier', 'defaut' => "metronome/fonts/$nom_font"]
    	],
		// FONTS
		[
			'saisie' => 'fieldset',
			'options' => ['nom' => $nom_font, 'label' => $info['nom'], 'onglet' => 'oui'],
			'saisies' => [
				[
					'saisie' => 'checkbox',
					'options' => [
						'nom' => $info['nom'],
						'label' => '<:metronome:format_inclus:>',
						'data' => $info['fonts'],
						'obligatoire' => 'oui'
					],
				]
			]
		]
	];
    
    return $saisies;
}
