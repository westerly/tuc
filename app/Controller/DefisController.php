<?php
App::uses('AppController', 'Controller');
/**
 * Defis Controller
 *
 * @property Defi $Defi
 */
class DefisController extends AppController {


	var $paginate = array(
		'Defi' => array(
				'limit' => 20,
				'order' => array(
						'Defi.date_soumission' => 'Desc'
						)
		),
		'Photo' => array(
				'limit' => 5,
				'order' => array(
						'Photo.date_upload' => 'Desc'
				)
		)
			
	);
	
	
	// Definit les règles d'accès utilisateurs pour les actions sur les photos
	public function isAuthorized($user) {
	
		// Connexion de type admin
		if(!isset($user["clan_id"])){
			return true;
		}
		
		// Tous les users inscrits peuvent visualiser un defi
		if (isset($user["id"]) && in_array($this->action, array('admin_view'))) {
			return true;
		}
	
		return parent::isAuthorized($user);
	}
	
	

	public function beforeFilter() {
        
		parent::beforeFilter();
    }

	
	public function index() {
		$this->Defi->recursive = 2;
		$this->layout = 'front';
		$this->set('defis', $this->paginate('Defi', array('Defi.afficher' => 1)));
             
		//$this->set('defis', $this->paginate());
	}
	
	public function view($id = null) {
		if (!$this->Defi->exists($id) || $this->Defi->field('afficher', array('id' => $id)) != 1 ) {
			throw new NotFoundException(__('Invalid defi'));
		}
		$this->Defi->recursive = 2;
		$options = array('conditions' => array('Defi.' . $this->Defi->primaryKey => $id));
		$this->set('defi', $this->Defi->find('first', $options));
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
		$this->set('photos', $this->paginate('Photo', array ("Photo.defi_id = " => $id)));
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
				$this->Session->setFlash('Le défi a été enregistrée avec succès.', 'default', array(), 'ok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Le défi n\'a pas été enregistrée.', 'default', array(), 'nok');
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
				$this->Session->setFlash('Le défi a été enregistrée avec succès.', 'default', array(), 'ok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Le défi n\'a pas été enregistrée.', 'default', array(), 'nok');
			}
		} else {
			$options = array('conditions' => array('Defi.' . $this->Defi->primaryKey => $id));
			$this->request->data = $this->Defi->find('first', $options);
		
			$this->set('photos', $this->paginate('Photo', array ("Photo.defi_id = " => $id)));
			
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
			$this->Session->setFlash('Le défi a été supprimée avec succès.', 'default', array(), 'ok');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Le défi n\'a pas été supprimée.', 'default', array(), 'nok');
		$this->redirect(array('action' => 'index'));
	}
}
