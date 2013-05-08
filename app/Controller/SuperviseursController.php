<?php
App::uses('AppController', 'Controller');
/**
 * Superviseurs Controller
 *
 * @property Superviseur $Superviseur
 */
class SuperviseursController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Superviseur->recursive = 0;
		$this->set('superviseurs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Superviseur->exists($id)) {
			throw new NotFoundException(__('Invalid superviseur'));
		}
		$options = array('conditions' => array('Superviseur.' . $this->Superviseur->primaryKey => $id));
		$this->set('superviseur', $this->Superviseur->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Superviseur->create();
			if ($this->Superviseur->save($this->request->data)) {
				$this->Session->setFlash(__('The superviseur has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The superviseur could not be saved. Please, try again.'));
			}
		}
		$entites = $this->Superviseur->Entite->find('list');
		$defis = $this->Superviseur->Defi->find('list');
		$this->set(compact('entites', 'defis'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Superviseur->exists($id)) {
			throw new NotFoundException(__('Invalid superviseur'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Superviseur->save($this->request->data)) {
				$this->Session->setFlash(__('The superviseur has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The superviseur could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Superviseur.' . $this->Superviseur->primaryKey => $id));
			$this->request->data = $this->Superviseur->find('first', $options);
		}
		$entites = $this->Superviseur->Entite->find('list');
		$defis = $this->Superviseur->Defi->find('list');
		$this->set(compact('entites', 'defis'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Superviseur->id = $id;
		if (!$this->Superviseur->exists()) {
			throw new NotFoundException(__('Invalid superviseur'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Superviseur->delete()) {
			$this->Session->setFlash(__('Superviseur deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Superviseur was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
