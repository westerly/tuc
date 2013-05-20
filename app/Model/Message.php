<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 * @property Entite $Entite
 */
class Message extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';


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
}
