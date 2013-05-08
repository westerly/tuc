<?php
App::uses('AppController', 'Controller');
/**
 * Defis Controller
 *
 * @property Defi $Defi
 */
class DefisController extends AppController {

	public function beforeFilter() {
        
		parent::beforeFilter();
    }

	
	public function index() {
		$this->Defi->recursive = 0;
		$this->set('defis', $this->paginate());
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Defi->recursive = 0;
		$this->set('defis', $this->paginate());
	}
 
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Defi->exists($id)) {
			throw new NotFoundException(__('Invalid defi'));
		}
		$options = array('conditions' => array('Defi.' . $this->Defi->primaryKey => $id));
		$this->set('defi', $this->Defi->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Defi->create();
			if ($this->Defi->save($this->request->data)) {
				$this->Session->setFlash(__('The defi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The defi could not be saved. Please, try again.'));
			}
		}
		$localisations = $this->Defi->Localisation->find('list');
		$horaires = $this->Defi->Horaire->find('list');
		$associations = $this->Defi->Association->find('list');
		$clans = $this->Defi->Clan->find('list');
		$entites = $this->Defi->Entite->find('list');
		$materiels = $this->Defi->Materiel->find('list');
		$partenaires = $this->Defi->Partenaire->find('list');
		$profils = $this->Defi->Profil->find('list');
		$superviseurs = $this->Defi->Superviseur->find('list');
		$this->set(compact('localisations', 'horaires', 'associations', 'clans', 'entites', 'materiels', 'partenaires', 'profils', 'superviseurs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Defi->exists($id)) {
			throw new NotFoundException(__('Invalid defi'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Defi->save($this->request->data)) {
				$this->Session->setFlash(__('The defi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The defi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Defi.' . $this->Defi->primaryKey => $id));
			$this->request->data = $this->Defi->find('first', $options);
		}
		$localisations = $this->Defi->Localisation->find('list');
		$horaires = $this->Defi->Horaire->find('list');
		$associations = $this->Defi->Association->find('list');
		$clans = $this->Defi->Clan->find('list');
		$entites = $this->Defi->Entite->find('list');
		$materiels = $this->Defi->Materiel->find('list');
		$partenaires = $this->Defi->Partenaire->find('list');
		$profils = $this->Defi->Profil->find('list');
		$superviseurs = $this->Defi->Superviseur->find('list');
		$this->set(compact('localisations', 'horaires', 'associations', 'clans', 'entites', 'materiels', 'partenaires', 'profils', 'superviseurs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Defi->id = $id;
		if (!$this->Defi->exists()) {
			throw new NotFoundException(__('Invalid defi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Defi->delete()) {
			$this->Session->setFlash(__('Defi deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Defi was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
