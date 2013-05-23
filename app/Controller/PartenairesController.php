<?php
App::uses('AppController', 'Controller');
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
				$dossier = APP."webroot\img\partenaires\logos\\";
				$extension = strrchr($this->request->data["Partenaire"]["new_fichierLogo"]['name'], '.');
				
				// Génration d'un nombre automatique pour le nom du fichier
				$fichier = rand().$extension;
				
				$this->request->data["Partenaire"]["fichierLogo"] = $dossier.$fichier;
			}
		
			if ($this->Partenaire->save($this->request->data)) {
				
				if($needUpload)
				{
					//Si on a pu save le partenaire on effectue l'upload du fichier (tout à été testé pour que ça passe normalement)
					if(move_uploaded_file($infosUpload["tmp_name"], $dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					{
						 // Envoi du message de confirmation à la vue
						$this->set('message', 'Votre enregistrement a été effectué avec succès.');
					}
					else //Sinon (la fonction renvoie FALSE).
					{
						 // L'upload a fail il faut supprimer le dernier partenaire enregistré en BD
						 $this->Partenaire->delete($this->Partenaire->getLastInsertID());
						 $this->Session->setFlash(__("Problème lors de l'upload du fichier sur le serveur, nous n'avons pas pu vous enregistrer."));
					}
				}else{	
					// Envoi du message de confirmation à la vue
					$this->set('message', 'Votre enregistrement a été effectué avec succès.');
				}
			} else {
				$this->Session->setFlash(__('The partenaire could not be saved. Please, try again.'));
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
				$dossier = APP."webroot\img\partenaires\logos\\";
				$extension = strrchr($this->request->data["Partenaire"]["new_fichierLogo"]['name'], '.');
				
				// Génration d'un nombre automatique pour le nom du fichier
				$fichier = rand().$extension;
				
				$this->request->data["Partenaire"]["fichierLogo"] = $dossier.$fichier;
			}
		
			if ($this->Partenaire->save($this->request->data)) {
				
				if($needUpload)
				{
					//Si on a pu save le partenaire on effectue l'upload du fichier (tout à été testé pour que ça passe normalement)
					if(move_uploaded_file($infosUpload["tmp_name"], $dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					{
						 // Envoi du message de confirmation à la vue
						$this->set('message', 'Votre enregistrement a été effectué avec succès.');
					}
					else //Sinon (la fonction renvoie FALSE).
					{
						 // L'upload a fail il faut supprimer le dernier partenaire enregistré en BD
						 $this->Partenaire->delete($this->Partenaire->getLastInsertID());
						 $this->Session->setFlash(__("Problème lors de l'upload du fichier sur le serveur, nous n'avons pas pu vous enregistrer."));
					}
				}else{	
					// Envoi du message de confirmation à la vue
					$this->set('message', 'Votre enregistrement a été effectué avec succès.');
				}
			} else {
				$this->Session->setFlash(__('The partenaire could not be saved. Please, try again.'));
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
