<?php
App::uses('AppController', 'Controller');
/**
 * Localisations Controller
 *
 * @property Localisation $Localisation
 */
class LocalisationsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Localisation->recursive = 0;
		$this->set('localisations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Localisation->exists($id)) {
			throw new NotFoundException(__('Invalid localisation'));
		}
		$options = array('conditions' => array('Localisation.' . $this->Localisation->primaryKey => $id));
		$this->set('localisation', $this->Localisation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Localisation->create();
			if ($this->Localisation->save($this->request->data)) {
				$this->Session->setFlash(__('The localisation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localisation could not be saved. Please, try again.'));
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
		if (!$this->Localisation->exists($id)) {
			throw new NotFoundException(__('Invalid localisation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Localisation->save($this->request->data)) {
				$this->Session->setFlash(__('The localisation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localisation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Localisation.' . $this->Localisation->primaryKey => $id));
			$this->request->data = $this->Localisation->find('first', $options);
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
		$this->Localisation->id = $id;
		if (!$this->Localisation->exists()) {
			throw new NotFoundException(__('Invalid localisation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Localisation->delete()) {
			$this->Session->setFlash(__('Localisation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Localisation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
