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


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
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
