<?php
App::uses('AppController', 'Controller');
/**
 * Associations Controller
 *
 * @property Association $Association
 */
class AssociationsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Association->recursive = 0;
		$this->set('associations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Association->exists($id)) {
			throw new NotFoundException(__('Invalid association'));
		}
		$options = array('conditions' => array('Association.' . $this->Association->primaryKey => $id));
		$this->set('association', $this->Association->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Association->create();
			if ($this->Association->save($this->request->data)) {
				$this->Session->setFlash(__('The association has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The association could not be saved. Please, try again.'));
			}
		}
		$defis = $this->Association->Defi->find('list');
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
		if (!$this->Association->exists($id)) {
			throw new NotFoundException(__('Invalid association'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Association->save($this->request->data)) {
				$this->Session->setFlash(__('The association has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The association could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Association.' . $this->Association->primaryKey => $id));
			$this->request->data = $this->Association->find('first', $options);
		}
		$defis = $this->Association->Defi->find('list');
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
		$this->Association->id = $id;
		if (!$this->Association->exists()) {
			throw new NotFoundException(__('Invalid association'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Association->delete()) {
			$this->Session->setFlash(__('Association deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Association was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
