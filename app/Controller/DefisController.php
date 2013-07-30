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
		
		$this->Defi->recursive = 0;
		$this->layout = 'front';
				
		$defis = $this->paginate('Defi', array('Defi.afficher' => 1));
		for($i=0;$i<count($defis);$i++){
			$defis[$i]["Photo"] = array();
			$defis[$i]["Photo"] = $this->Defi->Photo->find('all', array('conditions' => array('Photo.afficher' => '1', "Photo.defi_id" => $defis[$i]["Defi"]["id"])));
			$defis[$i]["Vote"] = array();
			$defis[$i]["Vote"] = $this->Defi->Vvotecount->find('all', array('conditions' => array("Vvotecount.defi_id" => $defis[$i]["Defi"]["id"])));
		}
		
		$this->set('defis', $defis);
	}

	public function view($id = null) {
		if (!$this->Defi->exists($id) || $this->Defi->field('afficher', array('id' => $id)) != 1 ) {
			throw new NotFoundException(__('Invalid defi'));
		}
		$this->Defi->recursive = 2;
		$options = array('conditions' => array('Defi.' . $this->Defi->primaryKey => $id));
		$this->set('defi', $this->Defi->find('first', $options));
                $this->layout = 'ajax';
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
	
	public function admin_afficher($id = null, $afficher) {
	
		$user = $this->Auth->user();
		$this->Defi->id = $id;
		if (!$this->Defi->exists()) {
			throw new NotFoundException(__('Le défi n\'existe pas.'));
		}
	
		$this->Defi->read(null, $id);
	
	
		$query = "UPDATE form_photos SET afficher = ";
		if($afficher == true){
			$this->Defi->set(array(
					'afficher' => '1'
			));
		}else{
			$this->Defi->set(array(
					'afficher' => '0'
			));
		}
		$query .= " WHERE id = ".$id;
	
		if ($this->Defi->save()) {
	
			if($afficher){
				$this->Session->setFlash('Le défi est maintenant affiché dans la partie publique du site.', 'default', array(), 'ok');
			}else{
				$this->Session->setFlash('Le défi n\'est plus affiché dans la partie publique du site', 'default', array(), 'ok');
			}
			$this->redirect(array('action' => 'index', 'admin' => true)); // Permet de rediriger vers la page appelante
		}
		$this->Session->setFlash('Un problème est survenu, l\'action n\'a pas été effectuée.', 'default', array(), 'nok');
		$this->redirect(array('action' => 'index', 'admin' => true)); // Permet de rediriger vers la page appelante
	
	}
	
	public function video($photo = null) {
		$this->layout = '';
		$p = $this->Defi->Photo->find('first',array('chemin_fichier'=>$photo));
		if (!isset($p)) {
			echo "erreur";
			//throw new NotFoundException(__('Cette vidéo n\'existe pas.'));
		}
		
		$this->set("photo", $photo);
	}
	
	
	public function vote($defi = null, $clan = null, $type = null) {
		$this->layout = '';
		
		
		$code = 0;
		$desc = "Success";
		$pour = null;
		$contre = null;
		
		if(!isset($defi) || !isset($clan) || !isset($type)) {
			return;
		}
		
		if(isset($_COOKIE["$defi-$clan"])) {
			$code = 4;
			$desc = "Vous avez déjà voté pour ce défi pour ce clan";
		} else {
			// Si les inputs sont corrects
			if ($type == 0 || $type == 1) {
				if (!empty($defi) && preg_match('#^[0-9]+$#',$defi)
				     && !empty($clan) && preg_match('#^[0-9]+$#',$clan)) {
					// Recherche du défi clan
					$defis = $this->Defi->find('first',array('conditions' => array('id' => $defi)));
					$defi_clan = null;
					foreach($defis['DefisClan'] as $dc) {
						if($dc['clan_id'] == $clan) {
							$defi_clan = $dc['id'];
						}
					}
					// Si le défi existe en BD (normalement oui) :
					if (isset($defi_clan)) {
						$ip = check_ip_proxy();
						// Si proxy :
						if ($ip[0] == 1) {
							// verifier que user existe et recuperer :
							$this->loadModel('ProxyUsers');
							$user = $this->ProxyUsers->find('first',array('conditions' => array('ip' => $ip[1], 'proxy' => $ip[2])));
							$continue = true;
							
							$user_id;
							$this->loadModel('VoteProxy');
							if (empty($user)) {
								// creer l'user
								$this->ProxyUsers->create();
								$this->ProxyUsers->set(array('ip' => $ip[1]));
								$this->ProxyUsers->set(array('proxy' => $ip[2]));
								$this->ProxyUsers->save();
								$user_id = $this->ProxyUsers->id;
							} else {
								$user_id = $user['ProxyUsers']['id'];
								$vote = $this->VoteProxy->find('all',array('conditions' => array('user' => $user_id)));
								foreach($vote as $v) {
									if($v['VoteProxy']['defi_clan'] == $defi_clan) {									
										$code = 5;
										$desc = "Vous avez déjà voté pour ce défi pour ce clan";
										// Durée de vie du cookie : 500 jours
										setcookie("$defi-$clan",'1',time()+3600*24*500);
										$continue = false;
									}
								}
							}
							
							if ($continue) {
								// Durée de vie du cookie : 500 jours
								setcookie("$defi-$clan",'1',time()+3600*24*500);
								$this->VoteProxy->create();
								$this->VoteProxy->set(array('user' => $user_id));
								$this->VoteProxy->set(array('defi_clan' => $defi_clan));
								$this->VoteProxy->set(array('type' => $type));
								$this->VoteProxy->set(array('date_vote' => date('Y-m-d H:s')));
								$this->VoteProxy->save();
								$count = $this->Defi->Vvotecount->find('first', array('conditions' => array("id" => $defi_clan)));
								$pour = $count['Vvotecount']['pour'];
								$contre = $count['Vvotecount']['contre'];
								$code = 0;
								$desc = "ok";
							}
						// si pas proxy :
						} else if ($ip[0] == 0) {
							// verifier que user existe et recuperer :
							$this->loadModel('NoProxyUsers');
							$user = $this->NoProxyUsers->find('first',array('conditions' => array('ip' => $ip[1])));
							$continue = true;
							
							$user_id;
							$this->loadModel('Vote');
							if (empty($user)) {
								// creer l'user
								$this->NoProxyUsers->create();
								$this->NoProxyUsers->set(array('ip' => $ip[1]));
								$this->NoProxyUsers->save();
								$user_id = $this->NoProxyUsers->id;
							} else {
								$user_id = $user['NoProxyUsers']['id'];
								$vote = $this->Vote->find('all',array('conditions' => array('user' => $user_id)));
								foreach($vote as $v) {
									if($v['Vote']['defi_clan'] == $defi_clan) {									
										$code = 5;
										$desc = "Vous avez déjà voté pour ce défi pour ce clan";
										// Durée de vie du cookie : 500 jours
										setcookie("$defi-$clan",'1',time()+3600*24*500);
										$continue = false;
									}
								}
							}
								
							if ($continue) {
								// process vote
								// Durée de vie du cookie : 500 jours
								setcookie("$defi-$clan",'1',time()+3600*24*500);
								$this->Vote->create();
								$this->Vote->set(array('user' => $user_id));
								$this->Vote->set(array('defi_clan' => $defi_clan));
								$this->Vote->set(array('type' => $type));
								$this->Vote->set(array('date_vote' => date('Y-m-d H:s')));
								$this->Vote->save();
								$count = $this->Defi->Vvotecount->find('first', array('conditions' => array("id" => $defi_clan)));
								$pour = $count['Vvotecount']['pour'];
								$contre = $count['Vvotecount']['contre'];
								$code = 0;
								$desc = "ok";
							}
						// Proxy Anonyme :
						} else {
							$code = 6;
							$desc = "Il semble que vous utilisez un proxy afin de masquer votre identité, vote impossible.";
						}
					} else {
						$code = 2;
						$desc = "Bad Argument DC : ".$defi."-".$clan;
					}
				} else {
					$code = 1;
					$desc = "Empty/Incorrect defi_clan ID given";
				}
			} else {
				$code = 7;
				$desc = "Bad Argument T : ".$type;
			}
		}

		$this->set("code", $code);
		$this->set("desc", $desc);
		$this->set("pour", $pour);
		$this->set("contre", $contre);
		$this->set("defi", $defi);
		$this->set("clan", $clan);
		
	
	}
}



// Recupération IP réelle du client
function get_ip() {
	if($_SERVER) {
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
	} else {
		if (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		} else if(getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		} else {
			$ip = getenv('REMOTE_ADDR');
		}
	}
	return $ip;
}


 /* Detection du type de proxy :
  A tester à l'utc puis simplifier
 */
function check_ip_proxy() {
	$myIP = get_ip();
	$proxyIp = null;
	$scan_headers = array(
		'HTTP_VIA',
		'HTTP_X_FORWARDED_FOR',
		'HTTP_FORWARDED_FOR',
		'HTTP_X_FORWARDED',
		'HTTP_FORWARDED',
		'HTTP_CLIENT_IP',
		'HTTP_FORWARDED_FOR_IP',
		'VIA',
		'X_FORWARDED_FOR',
		'FORWARDED_FOR',
		'X_FORWARDED',
		'FORWARDED',
		'CLIENT_IP',
		'FORWARDED_FOR_IP',
		'HTTP_PROXY_CONNECTION'
	);
 
	$flagProxy = false;
	$codeProxy = 0;
	foreach ($scan_headers as $i) {
		if (!empty($_SERVER[$i])) {
			$flagProxy = true;
		}
	}
 
	if ((in_array($_SERVER['REMOTE_PORT'], array(8080,80,6588,8000,3128,553,554))
	    || @fsockopen($_SERVER['REMOTE_ADDR'], 80, $errno, $errstr, 30)
	     ) && $myIP != $_SERVER['REMOTE_ADDR'])
	{
		$flagProxy = true;
	}
 
	// Proxy LookUp
	if ( $flagProxy == true &&
	   isset($_SERVER['REMOTE_ADDR']) && 
	   !empty($_SERVER['REMOTE_ADDR']))
	{
		$proxyIp = $_SERVER['REMOTE_ADDR'];
		if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && 
		      !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			// Transparent Proxy
			// REMOTE_ADDR = proxy IP
			// HTTP_X_FORWARDED_FOR = your IP 
			if ($_SERVER['HTTP_X_FORWARDED_FOR'] == $myIP)
			{
				$codeProxy = 1;
			}
			// Anonymous Proxy
			else
			{
				$codeProxy = 3;
			}
		} else {
			$codeProxy = 3;
		}
	}
	
	return array($codeProxy, $myIP, $proxyIp);
}