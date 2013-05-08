<?php
App::uses('AppController', 'Controller');
/**
 * Entites Controller
 *
 * @property Entite $Entite
 */
class EntitesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Entite->recursive = 0;
		$this->set('entites', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Entite->exists($id)) {
			throw new NotFoundException(__('Invalid entite'));
		}
		$options = array('conditions' => array('Entite.' . $this->Entite->primaryKey => $id));
		$this->set('entite', $this->Entite->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Entite->create();
			if ($this->Entite->save($this->request->data)) {
				$this->Session->setFlash(__('The entite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entite could not be saved. Please, try again.'));
			}
		}
		$defis = $this->Entite->Defi->find('list');
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
		if (!$this->Entite->exists($id)) {
			throw new NotFoundException(__('Invalid entite'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Entite->save($this->request->data)) {
				$this->Session->setFlash(__('The entite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entite.' . $this->Entite->primaryKey => $id));
			$this->request->data = $this->Entite->find('first', $options);
		}
		$defis = $this->Entite->Defi->find('list');
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
		$this->Entite->id = $id;
		if (!$this->Entite->exists()) {
			throw new NotFoundException(__('Invalid entite'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entite->delete()) {
			$this->Session->setFlash(__('Entite deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Entite was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
