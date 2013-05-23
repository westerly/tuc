<?php
App::uses('AppController', 'Controller');
/**
 * Clans Controller
 *
 * @property Clan $Clan
 */
class ClansController extends AppController {
	
	// Definit les règles d'accès utilisateurs pour les actions sur les photos
	public function isAuthorized($user) {
	
		// Tous les users inscrits peuvent visualiser un defi
		if (isset($user["id"]) && in_array($this->action, array('admin_view'))) {
			return true;
		}
	
		return parent::isAuthorized($user);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Clan->recursive = 0;
		$this->set('clans', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Clan->exists($id)) {
			throw new NotFoundException(__('Invalid clan'));
		}
		$options = array('conditions' => array('Clan.' . $this->Clan->primaryKey => $id));
		$this->set('clan', $this->Clan->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Clan->create();
			if ($this->Clan->save($this->request->data)) {
				$this->Session->setFlash(__('The clan has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clan could not be saved. Please, try again.'));
			}
		}
		$defis = $this->Clan->Defi->find('list');
		$this->set(compact('defis'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Clan->exists($id)) {
			throw new NotFoundException(__('Invalid clan'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Clan->save($this->request->data)) {
				$this->Session->setFlash(__('The clan has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Clan.' . $this->Clan->primaryKey => $id));
			$this->request->data = $this->Clan->find('first', $options);
		}
		$defis = $this->Clan->Defi->find('list');
		$this->set(compact('defis'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Clan->id = $id;
		if (!$this->Clan->exists()) {
			throw new NotFoundException(__('Invalid clan'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Clan->delete()) {
			$this->Session->setFlash(__('Clan deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Clan was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
