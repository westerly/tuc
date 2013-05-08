<?php
App::uses('AppController', 'Controller');
/**
 * Profils Controller
 *
 * @property Profil $Profil
 */
class ProfilsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Profil->recursive = 0;
		$this->set('profils', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Profil->exists($id)) {
			throw new NotFoundException(__('Invalid profil'));
		}
		$options = array('conditions' => array('Profil.' . $this->Profil->primaryKey => $id));
		$this->set('profil', $this->Profil->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Profil->create();
			if ($this->Profil->save($this->request->data)) {
				$this->Session->setFlash(__('The profil has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profil could not be saved. Please, try again.'));
			}
		}
		$defis = $this->Profil->Defi->find('list');
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
		if (!$this->Profil->exists($id)) {
			throw new NotFoundException(__('Invalid profil'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Profil->save($this->request->data)) {
				$this->Session->setFlash(__('The profil has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profil could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profil.' . $this->Profil->primaryKey => $id));
			$this->request->data = $this->Profil->find('first', $options);
		}
		$defis = $this->Profil->Defi->find('list');
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
		$this->Profil->id = $id;
		if (!$this->Profil->exists()) {
			throw new NotFoundException(__('Invalid profil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Profil->delete()) {
			$this->Session->setFlash(__('Profil deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Profil was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
