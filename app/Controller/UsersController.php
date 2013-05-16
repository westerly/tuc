<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	// Definit les règles d'accès utilisateurs pour les actions sur les users
	public function isAuthorized($user) {
	
		$user = $this->Auth->user();
		// Toute personne connecté peut se déconnecter
		if(isset($user) && $this->action === 'admin_logout'){
			return true;
		}
		
		// Toute personne qui est déjà connecté n'a pas le droit d'accéder à la page de login
		// if (isset($user) && $this->action === 'admin_login' ) {
			// return false;
		// }else{
			//Toute personne non co peut accéder à la page de login
			// return true;
		// }

		return parent::isAuthorized($user);
	}



	function admin_login(){	
	
		if ($this->request->is('post')) {
		
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				// Connexion de type admin
				if($user['clan_id'] == NULL){
					 $this->Auth->loginRedirect = array('admin'=>true, 'controller' => 'defis', 'action' => 'index');
				}else{
					// L'user connecté est un chef de clan
					 $this->Auth->loginRedirect = array('admin'=>true, 'controller' => 'photos', 'action' => 'add');
				}
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Nom d\'user ou mot de passe invalide, réessayer'));
			}
		}
	
		// if ($this->request->is('post')) {
			
			//Couple login mdp incorrect
			// $user = $this->User->findByLoginAndPassword($this->request->data['User']['login'], Security::hash($this->request->data['User']['password'],null,true));
			// if(empty($user))
			// {
				// $this->set('errorMessage', 'Login et mot de passe incorrects.');
			// }else{
				
				//Si la connexion est de type admin
				// if(!isset($user['User']['clan_id'])){
					// var_dump($user);
					// $this->Auth->allow('*');
					// $this->redirect(array('controller' => 'Defis', 'action' => 'admin_index'));
				// }else{
				//La connexion est de type clan
				
				// }
			// }
		// }
		
	}
	
	function admin_logout(){
		$this->Auth->logout();
		$this->redirect(array('admin'=>false, 'controller' => 'defis', 'action' => 'index'));
	} 

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$clans = $this->User->Clan->find('list');
		array_unshift($clans, "");
		$this->set(compact('clans'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$clans = $this->User->Clan->find('list');
		array_unshift($clans, "");
		$this->set(compact('clans'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
