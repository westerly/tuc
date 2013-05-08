<?php
App::uses('AppModel', 'Model');
/**
 * Association Model
 *
 * @property Defi $Defi
 */
class Association extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'association_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'association';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Defi' => array(
			'className' => 'Defi',
			'joinTable' => 'defis_associations',
			'foreignKey' => 'association_id',
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
