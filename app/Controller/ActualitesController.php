<?php 

class ActualitesController extends AppController{
	
	//var $name = 'NewsController';
	
	public $helpers = array('Form', 'Html', 'Js', 'Time');
	
	public $paginate = array(
		'Actualite' => array(
				'limit' => 5,
				'order' => array('Actualite.date' => 'Desc')
	));
	
	
	/* Envoi des informations sur les actualit�s � la vue dans la variable actualites (toutes les informations sont envoy�es)
	   Les actualit�s sont tri�es par ordre de cr�ation d�croissante
	*/
	function index(){
		$p = $this->paginate('Actualite');
		$this->set('actualites', $p);
		
	}
	
	
	/* Permet l'ajout d'une actualit� */
	function add(){	
		// Si les variables ont �t� post�es, on sauvegarde en BD gr�ce au mod�le 
		if(isset($this->data)){
			$this->Actualite->save($this->data);
		}
		
		
	}
	
	
}


?>