<?php
App::uses('AppModel', 'Model');
/**
 * Clan Model
 *
 * @property Defi $Defi
 */
class NoProxyUsers extends AppModel {

	
	public $hasMany = array(
		'Vote' => array(
			'className' => 'votes',
			'foreignKey' => 'user',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	/*
	public static function getByIp($ip) {
		$npu = new NoProxyUsers();
		return $npu
	}
	*/
}
