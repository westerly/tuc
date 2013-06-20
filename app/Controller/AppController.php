<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cak
 
 
 e Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'Session',
		'Auth' => array(
			//'loginRedirect' => array('admin'=>true, 'controller' => 'defis', 'action' => 'index'),
			//'logoutRedirect' => array('admin'=>false, 'controller'=>'defis','action'=>'index'),
			'authorize' => array('Controller'), // Ligne ajout�e
			'loginAction' => array('admin' => true, 'controller' => 'users', 'action' => 'login'),
			'userModel' => "User",
			
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'User',
					// Map les champs de la BD avec les champs conventionelles de l'authentification CakePHP
					'fields' => array(
						'username' => 'login',
						'password' => 'password'
					)
				)
			)
		)
	);
	

	public function isAuthorized($user) {
		$user = $this->Auth->user();
		// Admin peut accéder à toute action (Compte non associé à un clan, champ clan_id = NULL)
		if(!isset($user['clan_id'])){
			return true;
		}

		// Refus par défaut
		return false;
	}
	
	// Permet de rendre accessible toutes las actions index, view... de l'ensemble des controllers de l'application
	public function beforeFilter() {
        $this->Auth->allow('index', 'view','add', 'confirmation', 'admin_login', 'video', 'vote');
        
		$this->log("Here: {$this->here}, coming from: " . $this->referer(), LOG_DEBUG);
		
		$user = $this->Auth->user();
		
		App::uses('Clan', 'Model');
		$Clan = new Clan();
		
		$clans = $Clan->find("list");
		$this->set('clans_menu',$clans);
		
		// Set de la variable adminCo pour savoir si un admin est co et en en fonction afficher le menu qui va bien dans le layout admin
		if(isset($user['id']) && !isset($user['clan_id'])){
			$this->set('adminCo', true);
			$this->set('clanCo', false);
		}else{
			if(isset($user['id'])){
				$this->set('adminCo', false);
				$this->set('clanCo', true);
			}else{
				$this->set('adminCo', false);
				$this->set('clanCo', false);
			}
		}
		
		
    }
    
	function beforeRender() {
	    if($this->name == 'CakeError') {
	    	if(preg_match('/^admin/', $this->action)){
	    		$this->layout ="default";
	    	}else{
	    		$this->layout ="front";
	    	}
	    }
	}

	//var $components = array('Auth');

}
