<?php
App::uses('AppController', 'Controller');

App::uses('File', 'Utility');
/**
 * Partenaires Controller
 *
 * @property Partenaire $Partenaire
 */
class PartenairesController extends AppController {

	public $msgConfirmation; // Représeente le message de confirmation à afficher lorsque l'utilisateur a effectué une action avec succès (exemple: enregistrement du partenaire avec succès)
	
	// Action permettant l'affiche du message de confirmation à l'utilisateur (ex: confirmation de l'enregistrement du partenaire)
	public function confirmation()
	{
		var_dump($this->viewVars);
		//$this->Session->setFlash(__($this->msgConfirmation));
	}

	public function index() {
		$this->Partenaire->recursive = 0;
		$this->set('partenaires', $this->paginate('Partenaire', array('Partenaire.afficher' => 1)));
	}
	
	public function view($id = null) {
		if (!$this->Partenaire->exists($id) || $this->Partenaire->field('afficher', array('partenaire_id' => $id)) != 1) {
			throw new NotFoundException(__('Invalid partenaire'));
		}
		$options = array('conditions' => array('Partenaire.' . $this->Partenaire->primaryKey => $id));
		$this->set('partenaire', $this->Partenaire->find('first', $options));
	}
	
	/**
		Permet l'ajout d'un partenaire dans la partie publique
	
	**/
	public function add(){
	
		if ($this->request->is('post')) {
			if(!isset($this->request->data["Partenaire"]["new_fichierLogo"]["name"]) || $this->request->data["Partenaire"]["new_fichierLogo"]["name"] == "")
			{
				$needUpload = false;
				unset($this->request->data["Partenaire"]["new_fichierLogo"]); // Permet d'éviter les erreurs avec la rule de type "extension" lorsque aucun fichier n'est pas envoyé par le formulaire.
			}else{
				$needUpload = true;
			}
		
			$this->Partenaire->create();

			if($needUpload){
				// Sauvegarde des infos pour l'upload
				$infosUpload = $this->request->data["Partenaire"]["new_fichierLogo"];
				
				// La constante APP est la variable permettant d'accéder au path du dossier app 
				$dossier = "partenaires/logos/";
				$extension = strrchr($this->request->data["Partenaire"]["new_fichierLogo"]['name'], '.');
				
				// Génration d'un nombre automatique pour le nom du fichier
				$fichier = rand().$extension;
				
				$this->request->data["Partenaire"]["fichierLogo"] = $dossier.$fichier;
			}
		
			if ($this->Partenaire->save($this->request->data)) {
				
				if($needUpload)
				{
					//Si on a pu save le partenaire on effectue l'upload du fichier (tout à été testé pour que ça passe normalement)
					if(move_uploaded_file($infosUpload["tmp_name"], IMG.$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					{
						 // Envoi du message de confirmation à la vue
						//$this->set('message', 'Votre enregistrement a été effectué avec succès.');
						
						$this->Session->setFlash('Votre enregistrement a été effectué avec succès, il sera examiné par notre équipe le plus rapidement possible.', 'default', array(), 'ok');
						$this->redirect(array('action' => 'index', "admin" => false));
						
					}
					else //Sinon (la fonction renvoie FALSE).
					{
						 // L'upload a fail il faut supprimer le dernier partenaire enregistré en BD
						 $this->Partenaire->delete($this->Partenaire->getLastInsertID());
						 //$this->Session->setFlash(__("Problème lors de l'upload du fichier sur le serveur, nous n'avons pas pu vous enregistrer."));
						 $this->Session->setFlash('Problème lors de l\'upload du fichier sur le serveur, nous n\'avons pas pu vous enregistrer.', 'default', array(), 'nok');
					}
				}else{	
					$this->Session->setFlash('Votre enregistrement a été effectué avec succès, il sera examiné par notre équipe le plus rapidement possible.', 'default', array(), 'ok');
					$this->redirect(array('action' => 'index', "admin" => false));
					//$this->set('message', 'Votre enregistrement a été effectué avec succès.');
				}
			} else {
				$this->Session->setFlash("Un problème est survenu lors de votre enregistrement, réessayer s'il vous plaît.", 'default', array(), 'nok');
			}
		}
		$departements = $this->Partenaire->Departement->find('list');
		$this->set(compact('departements'));
	}

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
			if($this->request->data["Partenaire"]["new_fichierLogo"]["name"] == "")
			{
				$needUpload = false;
				unset($this->request->data["Partenaire"]["new_fichierLogo"]); // Permet d'éviter les erreurs avec la rule de type "extension" lorsque aucun fichier n'est pas envoyé par le formulaire.
			}else{
				$needUpload = true;
			}
		
			$this->Partenaire->create();

			if($needUpload){
				// Sauvegarde des infos pour l'upload
				$infosUpload = $this->request->data["Partenaire"]["new_fichierLogo"];
				
				// La constante APP est la variable permettant d'accéder au path du dossier app 
				$dossier = "partenaires/logos/";
				$extension = strrchr($this->request->data["Partenaire"]["new_fichierLogo"]['name'], '.');
				
				// Génration d'un nombre automatique pour le nom du fichier
				$fichier = rand().$extension;
				
				$this->request->data["Partenaire"]["fichierLogo"] = $dossier.$fichier;
			}
		
			if ($this->Partenaire->save($this->request->data)) {
				
				if($needUpload)
				{
					//Si on a pu save le partenaire on effectue l'upload du fichier (tout à été testé pour que ça passe normalement)
					if(move_uploaded_file($infosUpload["tmp_name"], IMG.$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					{
						 // Envoi du message de confirmation à la vue
						//$this->set('message', 'Votre enregistrement a été effectué avec succès.');
						
						$this->Session->setFlash('Le partenaire a été enregistré avec succès.', 'default', array(), 'ok');
						$this->redirect(array('action' => 'index', "admin" => true));
						
					}
					else //Sinon (la fonction renvoie FALSE).
					{
						 // L'upload a fail il faut supprimer le dernier partenaire enregistré en BD
						 $this->Partenaire->delete($this->Partenaire->getLastInsertID());
						 //$this->Session->setFlash(__("Problème lors de l'upload du fichier sur le serveur, nous n'avons pas pu vous enregistrer."));
						 
						 $this->Session->setFlash("Problème lors de l'upload du fichier sur le serveur, nous n'avons pas pu vous enregistrer.", 'default', array(), 'nok');
						 	
					}
				}else{	
					// Envoi du message de confirmation à la vue
					//$this->set('message', 'Votre enregistrement a été effectué avec succès.');
					$this->Session->setFlash('Le partenaire a été enregistré avec succès.', 'default', array(), 'ok');
					$this->redirect(array('action' => 'index', "admin" => true));
				}
			} else {
					$this->Session->setFlash("Le partenaire n'a pas été enregistrée.", 'default', array(), 'nok');
			}
		}
		$departements = $this->Partenaire->Departement->find('list');
		$this->set(compact('departements'));
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
			
			if($this->request->data["Partenaire"]["new_fichierLogo"]["name"] == "")
			{
				$needUpload = false;
				unset($this->request->data["Partenaire"]["new_fichierLogo"]); // Permet d'éviter les erreurs avec la rule de type "extension" lorsque aucun fichier n'est pas envoyé par le formulaire.
			}else{
				$needUpload = true;
			}
						
			if($needUpload){
				// Sauvegarde des infos pour l'upload
				$infosUpload = $this->request->data["Partenaire"]["new_fichierLogo"];
			
				// La constante APP est la variable permettant d'accéder au path du dossier app
				$dossier = "partenaires/logos/";
				$extension = strrchr($this->request->data["Partenaire"]["new_fichierLogo"]['name'], '.');
			
				// Génération d'un nombre automatique pour le nom du fichier
				$fichier = rand().$extension;
			
				$this->request->data["Partenaire"]["fichierLogo"] = $dossier.$fichier;
			}
			
			$old_path_logo = $this->Partenaire->field('fichierLogo', array('partenaire_id' => $id));
			
			if ($this->Partenaire->save($this->request->data)) {
				
				if($needUpload)
				{
					//Si on a pu save le partenaire on effectue l'upload du fichier (tout à été testé pour que ça passe normalement)
					if(move_uploaded_file($infosUpload["tmp_name"], IMG.$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					{
						// Il faut supprimer l'ancien logo
						if($old_path_logo!=""){
							$file = new File(IMG.$old_path_logo, false, 0777);
							$file->delete();
						}
						
						$this->Session->setFlash('Le partenaire a été enregistré avec succès.', 'default', array(), 'ok');
						$this->redirect(array('action' => 'index', "admin" => true));
				
					}
					else //Sinon (la fonction renvoie FALSE).
					{
							
						$this->Session->setFlash("Problème lors de l'upload du fichier sur le serveur.", 'default', array(), 'nok');
				
					}
				}else{
					
					$this->Session->setFlash('Le partenaire a été enregistré avec succès.', 'default', array(), 'ok');
					$this->redirect(array('action' => 'index', "admin" => true));
				}
				
			} else {
				$this->Session->setFlash("Le partenaire n'a pas été enregistré.", 'default', array(), 'nok');
			}
		}else{
			$options = array('conditions' => array('Partenaire.' . $this->Partenaire->primaryKey => $id));
			$this->request->data = $this->Partenaire->find('first', $options);
			$this->set('partenaire', $this->Partenaire->find('first', $options));
		}
		//$options = array('conditions' => array('Partenaire.' . $this->Partenaire->primaryKey => $id));
		//$this->set('partenaire', $this->Partenaire->find('first', $options));
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
		
		
		$file = new File(IMG.$this->Partenaire->field('fichierLogo', array('partenaire_id' => $id), false, 0777));
		
		
		if ($file->delete() && $this->Partenaire->delete()) {

			$this->Session->setFlash('Le partenaire a été supprimé avec succès.', 'default', array(), 'ok');
			//$this->redirect(array('action' => 'index'));
			$this->redirect($this->referer()); // Permet de rediriger vers la page appelante
		}else{
			$this->Session->setFlash("Le partenaire n'a pas été supprimé.", 'default', array(), 'nok');
			$this->redirect($this->referer()); // Permet de rediriger vers la page appelante
			//$this->redirect(array('action' => 'index'));
		}

	}
}
