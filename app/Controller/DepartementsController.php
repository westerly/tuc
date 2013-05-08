<?php
App::uses('AppController', 'Controller');
/**
 * Departements Controller
 *
 * @property Departement $Departement
 */
class DepartementsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Departement->recursive = 0;
		$this->set('departements', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Departement->exists($id)) {
			throw new NotFoundException(__('Invalid departement'));
		}
		$options = array('conditions' => array('Departement.' . $this->Departement->primaryKey => $id));
		$this->set('departement', $this->Departement->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Departement->create();
			if ($this->Departement->save($this->request->data)) {
				$this->Session->setFlash(__('The departement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The departement could not be saved. Please, try again.'));
			}
		}
		$regions = $this->Departement->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Departement->exists($id)) {
			throw new NotFoundException(__('Invalid departement'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Departement->save($this->request->data)) {
				$this->Session->setFlash(__('The departement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The departement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Departement.' . $this->Departement->primaryKey => $id));
			$this->request->data = $this->Departement->find('first', $options);
		}
		$regions = $this->Departement->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Departement->id = $id;
		if (!$this->Departement->exists()) {
			throw new NotFoundException(__('Invalid departement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Departement->delete()) {
			$this->Session->setFlash(__('Departement deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Departement was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
