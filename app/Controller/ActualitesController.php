<?php 

class ActualitesController extends AppController{
	
	//var $name = 'NewsController';
	
	public $helpers = array('Form', 'Html', 'Js', 'Time');
	
	public $paginate = array(
		'Actualite' => array(
				'limit' => 5,
				'order' => array('Actualite.date' => 'Desc')
	));
	
	
	/* Envoi des informations sur les actualités à la vue dans la variable actualites (toutes les informations sont envoyées)
	   Les actualités sont triées par ordre de création décroissante
	*/
	function index(){
		$p = $this->paginate('Actualite');
		$this->set('actualites', $p);
		
	}
	
	
	/* Permet l'ajout d'une actualité */
	function add(){	
		// Si les variables ont été postées, on sauvegarde en BD grâce au modèle 
		if(isset($this->data)){
			$this->Actualite->save($this->data);
		}
		
		
	}
	
	
}


?>