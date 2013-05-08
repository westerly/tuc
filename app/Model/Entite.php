<?php
App::uses('AppModel', 'Model');
/**
 * Entite Model
 *
 * @property Superviseur $Superviseur
 * @property Defi $Defi
 */
class Entite extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'entite_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'entite';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Superviseur' => array(
			'className' => 'Superviseur',
			'foreignKey' => 'entite_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
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
			'joinTable' => 'defis_entites',
			'foreignKey' => 'entite_id',
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
