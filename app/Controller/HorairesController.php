<?php
App::uses('AppController', 'Controller');
/**
 * Horaires Controller
 *
 * @property Horaire $Horaire
 */
class HorairesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Horaire->recursive = 0;
		$this->set('horaires', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Horaire->exists($id)) {
			throw new NotFoundException(__('Invalid horaire'));
		}
		$options = array('conditions' => array('Horaire.' . $this->Horaire->primaryKey => $id));
		$this->set('horaire', $this->Horaire->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Horaire->create();
			if ($this->Horaire->save($this->request->data)) {
				$this->Session->setFlash(__('The horaire has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The horaire could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Horaire->exists($id)) {
			throw new NotFoundException(__('Invalid horaire'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Horaire->save($this->request->data)) {
				$this->Session->setFlash(__('The horaire has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The horaire could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Horaire.' . $this->Horaire->primaryKey => $id));
			$this->request->data = $this->Horaire->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Horaire->id = $id;
		if (!$this->Horaire->exists()) {
			throw new NotFoundException(__('Invalid horaire'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Horaire->delete()) {
			$this->Session->setFlash(__('Horaire deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Horaire was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
