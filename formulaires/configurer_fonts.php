<?php
if (!defined('_ECRIRE_INC_VERSION')) return;
 
/**
 * Un simple formulaire de config,
 * on a juste à déclarer les saisies
 **/
function formulaires_configurer_fonts_saisies_dist(){
    // $saisies est un tableau décrivant les saisies à afficher 
    // dans le formulaire de configuration
    include_spip('inc/fonts_fonctions');
    
    $titre = _T("metronome:fonts");
    $liste_fonts = chercher_fonts_installes();
    
    $saisies = [
    	// CASIER
    	[
		    'saisie' => 'hidden',
		    'options' => ['nom' => '_meta_casier', 'defaut' => 'metronome_fonts']
    	],
    	// ENTETE
    	[
    		'saisie' => 'explication',
    		'options' => [
				'nom' => 'entete',
				'inserer_debut' => "<h3 class='titrem'>$titre</h3>",
				'texte' => '<:metronome:fonts_explication:>'
    		]
    	],
    	// SELECTION
    	[
			'saisie' => 'checkbox',
			'options' => [
				'nom' => 'sel_fonts_heberges',
				'label' => '<:metronome:fonts_heberges:>',
				'data' => $liste_fonts
			]
		],
		// EDITION
	];
	
	$sel_fonts = lire_config('metronome_fonts/sel_fonts_heberges');
	if ($sel_fonts){
		foreach($sel_fonts as $nom_font){
			$info = info_font($nom_font);
			$saisies[] = [
				'saisie' => 'fieldset',
				'options' => ['nom' => $nom_font, 'label' => $info['nom'], 'pliable' => 'oui', 'plie' => 'oui'],
				'saisies' => [
					[
						'saisie' => 'checkbox',
						'options' => [
							'nom' => "$nom_font:formats",
							'label' => '<:metronome:format_inclus:>',
							'data' => $info['fonts']
						]
					],
					[
						'saisie' => 'selection',
						'options' => [
							'nom' => "$nom_font:display",
							'label' => '<:metronome:font-display:>',
							'data' => font_display_options(),
							'defaut' => font_display_options(true)
						]
					]
				]
			];
		}
	}

    return $saisies;
}
