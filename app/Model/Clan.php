<?php
App::uses('AppModel', 'Model');
/**
 * Clan Model
 *
 * @property Defi $Defi
 */
class Clan extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Defi' => array(
			'className' => 'Defi',
			'joinTable' => 'defis_clans',
			'foreignKey' => 'clan_id',
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
	
	public $hasMany = array(
		'DefisClan' => array(
			'className' => 'DefisClan',
			'foreignKey' => 'clan_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'clan_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Vvotecount' => array(
			'className' => 'Vvotecount',
			'foreignKey' => 'clan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);

}
