<?php
App::uses('AppModel', 'Model');
/**
 * Materiel Model
 *
 * @property Defi $Defi
 */
class Materiel extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'materiel_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'materiel';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Defi' => array(
			'className' => 'Defi',
			'joinTable' => 'defis_materiels',
			'foreignKey' => 'materiel_id',
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
