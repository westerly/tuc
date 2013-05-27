<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 * @property Clan $Clan
 * @property Defi $Defi
 */

class Photo extends AppModel {
	
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	
	public $actsAs = array('Upload');
	
	// Permet de définir les règles de validation des données
	// Attention la clé rule doit toujours être présente
	public $validate = array(
// 			'photo_fichier' => array(
// 				'ruleExtension'  => array(
// 					'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
// 					'message' => 'L\'extension du ficher fourni n\'est pas valide.',
// 					'last' => true
// 			),
// 			'ruleFileSize' => array(
// 				'rule' => array('fileSize', '<=', '2MB'),
// 				'message' => 'La taille de l\'image ne doit pas dépasser 50MB.',
// 				'last' => true
// 			)
// 		)
			
			'photo_fichier' => array(
					'rulePhotoVideo'  => array(
							'rule' => "checkUploadPhotoVideo",
							'last' => true
					)
			)
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 * 
 */
	public $belongsTo = array(
		'Clan' => array(
			'className' => 'Clan',
			'foreignKey' => 'clan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Defi' => array(
			'className' => 'Defi',
			'foreignKey' => 'defi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	
	
	
	
}
