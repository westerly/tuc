<?php
App::uses('AppController', 'Controller');
/**
 * Partenaires Controller
 *
 * @property Partenaire $Partenaire
 */
class PartenairesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Partenaire->recursive = 0;
		$this->set('partenaires', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Partenaire->exists($id)) {
			throw new NotFoundException(__('Invalid partenaire'));
		}
		$options = array('conditions' => array('Partenaire.' . $this->Partenaire->primaryKey => $id));
		$this->set('partenaire', $this->Partenaire->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Partenaire->create();
			if ($this->Partenaire->save($this->request->data)) {
				$this->Session->setFlash(__('The partenaire has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partenaire could not be saved. Please, try again.'));
			}
		}
		$departements = $this->Partenaire->Departement->find('list');
		$defis = $this->Partenaire->Defi->find('list');
		$this->set(compact('departements', 'defis'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Partenaire->exists($id)) {
			throw new NotFoundException(__('Invalid partenaire'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Partenaire->save($this->request->data)) {
				$this->Session->setFlash(__('The partenaire has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partenaire could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Partenaire.' . $this->Partenaire->primaryKey => $id));
			$this->request->data = $this->Partenaire->find('first', $options);
		}
		$departements = $this->Partenaire->Departement->find('list');
		$defis = $this->Partenaire->Defi->find('list');
		$this->set(compact('departements', 'defis'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Partenaire->id = $id;
		if (!$this->Partenaire->exists()) {
			throw new NotFoundException(__('Invalid partenaire'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Partenaire->delete()) {
			$this->Session->setFlash(__('Partenaire deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Partenaire was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
