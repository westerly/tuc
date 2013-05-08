<?php
App::uses('AppModel', 'Model');
/**
 * Superviseur Model
 *
 * @property Entite $Entite
 * @property Defi $Defi
 */
class Superviseur extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'superviseur_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Entite' => array(
			'className' => 'Entite',
			'foreignKey' => 'entite_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Defi' => array(
			'className' => 'Defi',
			'joinTable' => 'defis_superviseurs',
			'foreignKey' => 'superviseur_id',
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
