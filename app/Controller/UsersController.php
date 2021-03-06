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
		
		return parent::isAuthorized($user);
	}



	function admin_login(){	
		
		$user = $this->Auth->user();
		if(isset($user)){
			$this->redirect(array('admin'=>true, 'controller' => 'defis', 'action' => 'index'));
		}
	
		if ($this->request->is('post')) {
		
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				// Connexion de type admin
				if($user['clan_id'] == NULL){
					 $this->redirect(array('admin'=>true, 'controller' => 'defis', 'action' => 'index'));
				}else{
					// L'user connecté est un chef de clan
					 $this->redirect(array('admin'=>true, 'controller' => 'photos', 'action' => 'index'));
				}
			} else {
				$this->Session->setFlash('Login ou mot de passe invalide, réessayer.', 'default', array(), 'nok');
			}
		}
                $this->layout = 'front';
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

			// Allows the program to avoid SQL errors when we want to create Admin User (not connected to a Clan)
			if(isset($this->request->data["User"]["clan_id"]) && $this->request->data["User"]["clan_id"]==0){
				$this->request->data["User"]["clan_id"] = NULL;
			}
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('L\'utilisateur a été enregistré avec succès.', 'default', array(), 'ok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('L\'utilisateur ne peut être enregistré.', 'default', array(), 'nok');
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
			// Allows the program to avoid SQL errors when we want to create Admin User (not connected to a Clan)
			if(isset($this->request->data["User"]["clan_id"]) && $this->request->data["User"]["clan_id"]==0){
				$this->request->data["User"]["clan_id"] = NULL;
			}
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('L\'utilisateur a été enregistré avec succès.', 'default', array(), 'ok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('L\'utilisateur n\'a pas été enregistré.', 'default', array(), 'nok');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			$this->request->data["User"]["password"] = "";
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
		$user = $this->User->find('first', array( "conditions" => array("User.id = ".$id)));
		
		if(!isset($user["User"]["clan_id"])){
			$options = array('conditions' => array('User.clan_id' => null));
			$nbrAdmins = $this->User->find('count', $options);
			if($nbrAdmins == 1){
				$this->Session->setFlash('Impossible de supprimer ce compte car il correspond au dernier compte "super administrateur".', 'default', array(), 'nok');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		if ($this->User->delete()) {
			$this->Session->setFlash('L\'utilisateur a été supprimé avec succès.', 'default', array(), 'ok');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('L\'utilisateur n\'a pas été supprimé.', 'default', array(), 'nok');
		$this->redirect(array('action' => 'index'));
	}
}
