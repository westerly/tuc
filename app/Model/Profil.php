<?php
App::uses('AppModel', 'Model');
/**
 * Profil Model
 *
 * @property Defi $Defi
 */
class Profil extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'profil_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'profil';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Defi' => array(
			'className' => 'Defi',
			'joinTable' => 'defis_profils',
			'foreignKey' => 'profil_id',
			'associationForeignKey' => 'defi_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
