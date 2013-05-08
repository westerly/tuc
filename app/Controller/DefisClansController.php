<?php
App::uses('AppController', 'Controller');
/**
 * DefisClans Controller
 *
 * @property DefisClan $DefisClan
 */
class DefisClansController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DefisClan->recursive = 0;
		$this->set('defisClans', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DefisClan->exists($id)) {
			throw new NotFoundException(__('Invalid defis clan'));
		}
		$options = array('conditions' => array('DefisClan.' . $this->DefisClan->primaryKey => $id));
		$this->set('defisClan', $this->DefisClan->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DefisClan->create();
			if ($this->DefisClan->save($this->request->data)) {
				$this->Session->setFlash(__('The defis clan has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The defis clan could not be saved. Please, try again.'));
			}
		}
		$defis = $this->DefisClan->Defi->find('list');
		$clans = $this->DefisClan->Clan->find('list');
		$this->set(compact('defis', 'clans'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->DefisClan->exists($id)) {
			throw new NotFoundException(__('Invalid defis clan'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DefisClan->save($this->request->data)) {
				$this->Session->setFlash(__('The defis clan has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The defis clan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DefisClan.' . $this->DefisClan->primaryKey => $id));
			$this->request->data = $this->DefisClan->find('first', $options);
		}
		$defis = $this->DefisClan->Defi->find('list');
		$clans = $this->DefisClan->Clan->find('list');
		$this->set(compact('defis', 'clans'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->DefisClan->id = $id;
		if (!$this->DefisClan->exists()) {
			throw new NotFoundException(__('Invalid defis clan'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DefisClan->delete()) {
			$this->Session->setFlash(__('Defis clan deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Defis clan was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
