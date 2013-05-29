<?php
App::uses('AppController', 'Controller');
/**
 * Actualites Controller
 *
 * @property Actualite $Actualite
 */
class ActualitesController extends AppController {

	var $paginate = array(
		'Actualite' => array(
				'limit' => 5,
				'order' => array(
						'Actualite.date_creation' => 'Desc'
						)
	));

	public function index(){
		$this->Actualite->recursive = 0;
                $this->layout = 'front';
		$this->set('actualites', $this->paginate());
	}

/**
 * admin_index method
 *
 * @return void
 */
	
	public function admin_index() {
		$this->Actualite->recursive = 0;
		$this->set('actualites', $this->paginate());
	}
	
	public function view($id = null) {
		if (!$this->Actualite->exists($id)) {
			throw new NotFoundException(__('Invalid actualite'));
		}
		$options = array('conditions' => array('Actualite.' . $this->Actualite->primaryKey => $id));
		$this->set('actualite', $this->Actualite->find('first', $options));
                $this->layout = 'ajax';
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Actualite->exists($id)) {
			throw new NotFoundException(__('Invalid actualite'));
		}
		$options = array('conditions' => array('Actualite.' . $this->Actualite->primaryKey => $id));
		$this->set('actualite', $this->Actualite->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Actualite->create();
			if ($this->Actualite->save($this->request->data)) {
				$this->Session->setFlash(__('The actualite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actualite could not be saved. Please, try again.'));
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
		if (!$this->Actualite->exists($id)) {
			throw new NotFoundException(__('Invalid actualite'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Actualite->save($this->request->data)) {
				$this->Session->setFlash(__('The actualite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actualite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Actualite.' . $this->Actualite->primaryKey => $id));
			$this->request->data = $this->Actualite->find('first', $options);
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
		$this->Actualite->id = $id;
		if (!$this->Actualite->exists()) {
			throw new NotFoundException(__('Invalid actualite'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Actualite->delete()) {
			$this->Session->setFlash(__('Actualite deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Actualite was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
