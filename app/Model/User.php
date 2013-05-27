<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Clan $Clan
 */
class User extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'login';
	
	// Permet de crypter le mot de passe avant de l'enregistrer en base de données
	function beforeSave()
	{
		$this->data['User']['password'] = Security::hash($this->data['User']['password'],null,true);
	}
	
	
	
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
		)
	);
}
