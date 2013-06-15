<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * contacts Controller
 *
 * @property Clan $Clan
 */
class ContactsController extends AppController {
	
	public function index() {
		$this->layout = 'front';
		
		if ($this->request->is('post')) {
			
			
			
			$datas = $this->request->data["Contact"];
			
			//debug($datas);

			$errorMessage="";
			
			if(isset($datas["nom"])){$datas["nom"] = trim($datas["nom"], ' ');}
			if(isset($datas["prenom"])){$datas["prenom"] = trim($datas["prenom"], ' ');}
			if(isset($datas["email"])){$datas["email"] = trim($datas["email"], ' ');}
			if(isset($datas["entite"])){$datas["entite"] = trim($datas["entite"], ' ');}
			if(isset($datas["message"])){$datas["message"] = trim($datas["message"], ' ');}

			if(!isset($datas["nom"]) || (isset($datas["nom"]) && empty($datas["nom"]))){
				$errorMessage.="Le nom doit être renseigné.</br>";	
			}else{

				if(isset($datas["nom"]) && strlen($datas["nom"])>=50){
					$errorMessage.="Le nom ne doit pas dépasser 50 caractères.</br>";
				}
			}
			
			if(!isset($datas["prenom"]) || (isset($datas["prenom"]) && empty($datas["prenom"]))){
				$errorMessage.="Le prénom doit être renseigné.</br>";
			}else{
			
				if(isset($datas["prenom"]) && strlen($datas["prenom"])>=50){
					$errorMessage.="Le prénom ne doit pas dépasser 50 caractères.</br>";
				}
			}
			
			if(!isset($datas["email"]) || (isset($datas["email"]) && empty($datas["email"]))){
				$errorMessage.="L'email doit être renseigné.</br>";
			}else{
					
				if(isset($datas["email"]) && strlen($datas["email"])>=50){
					$errorMessage.="L'email ne doit pas dépasser 50 caractères.</br>";
				}
				
				if(isset($datas["email"]) && !filter_var($datas["email"], FILTER_VALIDATE_EMAIL)){  
				   $errorMessage.="L'email n'est pas valide.</br>";
				}
			}
			
			if(!isset($datas["entite"]) || (isset($datas["entite"]) && empty($datas["entite"]))){
				$errorMessage.="L'entité doit être renseignée.</br>";
			}else{
					
				if(isset($datas["entite"]) && strlen($datas["entite"])>=15){
					$errorMessage.="Problème avec l'entité renseignée.</br>";
				}
			}
			
			if(!isset($datas["message"]) || (isset($datas["message"]) && empty($datas["message"]))){
				$errorMessage.="Le message doit être renseignée.</br>";
			}else{	
				if(isset($datas["message"]) && strlen($datas["message"])>=1000){
					$errorMessage.="Le message ne peut pas dépasser 1000 caractères.</br>";
				}
				
				if(isset($datas["message"]) && strlen($datas["message"])<50){
					$errorMessage.="Le message doit comporter au moins 50 caractères.</br>";
				}
			}
						
			if($errorMessage!=''){
				$this->set('datas', $datas);
				$this->Session->setFlash($errorMessage, 'default', array(), 'nok');
			}else{
				// Pas d'erreurs, envoyer l'email
 				$Email = new CakeEmail();
				$Email->from(array('tucWebsite@utc.fr' => 'Tuc website'));
				$Email->to('tuc@assos.utc.fr');
				$Email->subject('Message de '.$datas["prenom"]." ".$datas["nom"]);
				
				try{
					$message = "Adresse mail de contact: ".$datas["email"]."\n Entité: ".$datas["entite"]."\n\n\n".$datas["message"];
					$Email->send($message);
					
 					$this->Session->setFlash("Votre message a bien été envoyé, nous vous répondrons le plus rapidement possible.", 'default', array(), 'ok');
					// success message
				}catch(Exception $e){
					// failure message details echo $e->getMessage();
					//$errorMessage = $e->getMessage();
					$this->Session->setFlash("Un problème est survenu, le message n'a pas pu être envoyé.", 'default', array(), 'nok');
				}
				
			}
			
			//$this->Session->setFlash('Le défi a été enregistrée avec succès.', 'default', array(), 'ok');
			//$this->redirect(array('action' => 'index'));
			//$this->Session->setFlash('Le défi n\'a pas été enregistrée.', 'default', array(), 'nok');
		}
	}
}
