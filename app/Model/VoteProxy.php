<?php
App::uses('AppModel', 'Model');
/**
 * Clan Model
 *
 * @property Defi $Defi
 */
class Vote extends AppModel {

	
	public $belongsTo = array(
		'ProxyUser' => array(
			'className' => 'proxy_users',
			'foreignKey' => 'user',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
