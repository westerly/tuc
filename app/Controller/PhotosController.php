<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 */
class PhotosController extends AppController {

	var $paginate = array(
		'Photo' => array(
				'limit' => 5,
				'order' => array(
						'Photo.date_upload' => 'Desc'
						)
	));


	// Definit les règles d'accès utilisateurs pour les actions sur les photos
	public function isAuthorized($user) {
		
		// Connexion de type admin
		if(!isset($user["clan_id"])){
			return true;
			
		}
	
		// Tous les users inscrits peuvent ajouter des photos et accéder à l'index des photos
		if (isset($user["id"]) && in_array($this->action, array('admin_add', 'admin_index', 'admin_view'))) {
			return true;
		}
		
		
		//Le propriétaire de la photo peut l'éditer et la supprimer
		if (in_array($this->action, array('admin_edit', 'admin_delete'))) {
			$photoId = $this->request->params['pass'][0];
			if (isset($photoId) && $this->Photo->field('clan_id', array('id' => $photoId)) == $user["clan_id"]) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
	
	
	public function index($clan_id = null) {
	
		if(isset($clan_id))
		{
			$this->set('photos', $this->paginate('Photo', array('Photo.clan_id' => $clan_id, 'Photo.afficher' => 1, "Defi.afficher" => 1)));
		}else{
			$this->set('photos', $this->paginate('Photo', array('Photo.afficher' => 1, "Defi.afficher" => 1)));
		}
	}
	
	public function view($id = null){
		
		if ($this->Photo->exists($id) || $this->Photo->field('afficher', array('id' => $id)) == 1 ) {
			$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
			$newTest = $this->Photo->find('first', $options);
 			// Permet de contrôler si le défi associé à la photo est affichable
			if($newTest["Defi"]["afficher"] != 1){
				throw new NotFoundException(__('Invalid Photos'));
			}else{
				$this->set('photo', $newTest);
			}
		}else{
			throw new NotFoundException(__('Invalid Photos'));
		}
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$user = $this->Auth->user();
		
		$this->Photo->recursive = 0;
		// Connexion de type admin, on affiche toutes les photos
		if(!isset($user["clan_id"])){
			$this->set('photos', $this->paginate());
		}else{
			// Connexion de type clan, on affiche toutes les photos postées par le clan
			$this->set('photos', $this->paginate('Photo', array('Photo.clan_id' => $user["clan_id"])));
		}
		
		
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->set('photo', $this->Photo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		
		if ($this->request->is('post')) {
			
			$this->Photo->create();
			
			// Sauvegarde des infos pour l'upload
			$infosUpload = $this->request->data["Photo"]["photo_fichier"];
			
			// La constante APP est la variable permettant d'accéder au path du dossier app
			$dossier = "defis/photos/";
			$extension = strrchr($this->request->data["Photo"]["photo_fichier"]['name'], '.');
			
			// Génration d'un nombre automatique pour le nom du fichier
			$fichier = rand().$extension;
			
			$this->request->data["Photo"]["chemin_fichier"] = $dossier.$fichier;
			
			if ($this->Photo->save($this->request->data)) {
			
					//Si on a pu save la photo on effectue l'upload du fichier (tout à été testé pour que ça passe normalement)
					if(move_uploaded_file($infosUpload["tmp_name"], IMG.$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					{
						$this->Session->setFlash('Votre photo a été enregistrée avec succès.', 'default', array(), 'ok');
						$this->redirect(array('action' => 'index'));
					}
					else //Sinon (la fonction renvoie FALSE).
					{
						// L'upload n'a pas marché il faut supprimer la dernière photo enregistré en BD
						$this->Photo->delete($this->Photo->getLastInsertID());
						$this->Session->setFlash('Problème lors de l\'upload du fichier sur le serveur.', 'default', array(), 'nok');
					}
			
			} else {
				$this->Session->setFlash('La photo ne peut être enregistrée.', 'default', array(), 'nok');
			}
			
		}
		
		$user = $this->Auth->user();
		
		// Connexion de type Admin
		if(!isset($user["clan_id"])){
			$clans = $this->Photo->Clan->find('list');
		}else{
			$options = array('conditions' => array('Clan.' . $this->Photo->Clan->primaryKey => $user["clan_id"]));
			$clans = $this->Photo->Clan->find("list", $options);
		}
		
		$defis = $this->Photo->Defi->find('list');
		$this->set(compact('clans', 'defis'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
// 	public function admin_edit($id = null) {
// 		if (!$this->Photo->exists($id)) {
// 			throw new NotFoundException(__('Invalid photo'));
// 		}
// 		if ($this->request->is('post') || $this->request->is('put')) {
// 			if ($this->Photo->save($this->request->data)) {
// 				$this->Session->setFlash(__('The photo has been saved'));
// 				$this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
// 			$this->request->data = $this->Photo->find('first', $options);
// 		}
// 		$clans = $this->Photo->Clan->find('list');
// 		$defis = $this->Photo->Defi->find('list');
// 		$this->set(compact('clans', 'defis'));
// 	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		
		$user = $this->Auth->user();
		$this->Photo->id = $id;
		if (!$this->Photo->exists() || $this->Photo->field('clan_id') != $user["clan_id"]) {
			throw new NotFoundException(__('Photo invalide.'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$file = new File($this->Photo->field('chemin_fichier', array('id' => $id)));
		$file->delete();
		
		if ($this->Photo->delete()) {
			
			$this->Session->setFlash('Photo supprimée avec succès.', 'default', array(), 'ok');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('La photo n\'a pas été supprimée.', 'default', array(), 'nok');
		$this->redirect(array('action' => 'index'));
	}
}
