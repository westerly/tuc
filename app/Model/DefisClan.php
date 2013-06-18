<?php
App::uses('AppModel', 'Model');
/**
 * DefisClan Model
 *
 * @property Defi $Defi
 * @property Clan $Clan
 */
class DefisClan extends AppModel {

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
		'Defi' => array(
			'className' => 'Defi',
			'foreignKey' => 'defi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Clan' => array(
			'className' => 'Clan',
			'foreignKey' => 'clan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Vvotecount' => array(
			'className' => 'Vvotecount',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
