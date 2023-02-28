<?php
if (!defined('_ECRIRE_INC_VERSION')) return;
 
/**
 * Un simple formulaire de config,
 * on a juste à déclarer les saisies
 **/
function formulaires_configurer_grille_saisies_dist(){
    // $saisies est un tableau décrivant les saisies à afficher 
    // dans le formulaire de configuration
    $titre = _T("metronome:grille");
    
    $saisies = [
    	// CASIER
    	[
		    'saisie' => 'hidden',
		    'options' => ['nom' => '_meta_casier', 'defaut' => 'metronome/grille']
    	],
    	// ENTETE
    	[
    		'saisie' => 'explication',
    		'options' => [
    			'nom' => 'entete' ,
    			'inserer_debut' => "<h3 class='titrem'>$titre</h3>",
    			'texte' => '<:metronome:grille_explication:>'
    		]
    	],
    	// GRILLE
    	[
			'saisie' => 'fieldset',
			'options' => ['nom' => 'grille', 'label' => '<:metronome:configurer_grille:>', 'onglet' => 'oui'],
			'saisies' => [
				[
					'saisie' => 'nombre',
					'options' => [
						'nom' => 'grid-columns',
						'label' => '<:metronome:configurer_grid_columns:>',
						'defaut' => '12',
						'size' => '6'
					],
					'verifier' => ['type' => 'entier', 'options' => ['min' => 1, 'max' => 12]]
				],
				[
					'saisie' => 'nombre',
					'options' => [
						'nom' => 'grid-gutter-width',
						'label' => '<:metronome:configurer_grid_gutter_width:>',
						'decimales' => '3',
						'defaut' => '30',
						'size' => '6'
					],
					'verifier' => ['type' => 'decimal', 'options' => ['min' => 0, 'max' => 100]]
				],
			]
		],
	];
    
    return $saisies;
}
