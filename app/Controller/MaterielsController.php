<?php
App::uses('AppController', 'Controller');
/**
 * Materiels Controller
 *
 * @property Materiel $Materiel
 */
class MaterielsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Materiel->recursive = 0;
		$this->set('materiels', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Materiel->exists($id)) {
			throw new NotFoundException(__('Invalid materiel'));
		}
		$options = array('conditions' => array('Materiel.' . $this->Materiel->primaryKey => $id));
		$this->set('materiel', $this->Materiel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Materiel->create();
			if ($this->Materiel->save($this->request->data)) {
				$this->Session->setFlash(__('The materiel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The materiel could not be saved. Please, try again.'));
			}
		}
		$defis = $this->Materiel->Defi->find('list');
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
		if (!$this->Materiel->exists($id)) {
			throw new NotFoundException(__('Invalid materiel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Materiel->save($this->request->data)) {
				$this->Session->setFlash(__('The materiel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The materiel could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Materiel.' . $this->Materiel->primaryKey => $id));
			$this->request->data = $this->Materiel->find('first', $options);
		}
		$defis = $this->Materiel->Defi->find('list');
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
		$this->Materiel->id = $id;
		if (!$this->Materiel->exists()) {
			throw new NotFoundException(__('Invalid materiel'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Materiel->delete()) {
			$this->Session->setFlash(__('Materiel deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Materiel was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
