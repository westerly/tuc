<?php
App::uses('AppModel', 'Model');
/**
 * Clan Model
 *
 * @property Defi $Defi
 */
class ProxyUsers extends AppModel {

	
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
