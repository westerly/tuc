<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 */
class PhotosController extends AppController {

	var $paginate = array(
		'Photo' => array(
				'limit' => 5,
				'order' => array(
						'Photo.date_upload' => 'Desc'
						)
	));


	// Definit les r�gles d'acc�s utilisateurs pour les actions sur les photos
	public function isAuthorized($user) {
	
		// Tous les users inscrits peuvent ajouter des photos
		if ($this->action === 'admin_add') {
			return true;
		}

		// Le propri�taire de la photo peut l'�diter et la supprimer
		// if (in_array($this->action, array('edit', 'delete'))) {
			// $photoId = $this->request->params['pass'][0];
			// if ($this->Photo->isOwnedBy($photoId, $user['id'])) {
				// return true;
			// }
		// }

		return parent::isAuthorized($user);
	}
	
	
	public function index($clan_id = null) {
	
		if(isset($clan_id))
		{
			//$this->set('photos',$this->Photo->find('all', array('conditions' => array('Photo.clan_id' => $clan_id, 'Photo.afficher' => 1))));
			$this->set('photos', $this->paginate('Photo', array('Photo.clan_id' => $clan_id, 'Photo.afficher' => 1)));
		}
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Photo->recursive = 0;
		$this->set('photos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->set('photo', $this->Photo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Photo->create();
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		}
		$clans = $this->Photo->Clan->find('list');
		$defis = $this->Photo->Defi->find('list');
		$this->set(compact('clans', 'defis'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
			$this->request->data = $this->Photo->find('first', $options);
		}
		$clans = $this->Photo->Clan->find('list');
		$defis = $this->Photo->Defi->find('list');
		$this->set(compact('clans', 'defis'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Photo->delete()) {
			$this->Session->setFlash(__('Photo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Photo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
