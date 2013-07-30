<?php
App::uses('AppModel', 'Model');
/**
 * Clan Model
 *
 * @property Defi $Defi
 */
class ProxyUser extends AppModel {

	
	public $hasMany = array(
		'VoteProxy' => array(
			'className' => 'vote_proxys',
			'foreignKey' => 'user',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
