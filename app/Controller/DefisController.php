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
		
		if(!isset($defi) || !isset($clan) || !isset($type)) {
			return;
		}
		
		if(isset($_COOKIE["$defi-$clan"])) {
			$code = 4;
			$desc = "Vous avez déjà voté pour ce défi pour ce clan";
		} else {
			if ($type == 0 || $type == 1) {
				if (!empty($defi) && preg_match('#^[0-9]+$#',$defi)
				     && !empty($clan) && preg_match('#^[0-9]+$#',$clan)) {
					$defi_clan = $this->Defi->DefisClan->find(array('defi_id' => $defi, 'clan_id' => $clan));
					// Si le défi existe en BD (normalement oui) :
					if (isset($defi_clan)) {
						$ip = check_ip_proxy();
						// Si proxy :
						if ($ip[0] == 1) {
							$user = $defi_clan->VoteProxy->ProxyUser->find(array('ip' => $ip[1], 'proxy' => $ip[2]));
							
							$continue = false;
							// Si l'user n'existe pas :
							if (!isset($user)) {
// ###################################################################################################################
								//TODO
								$query2 = $db->prepare("INSERT INTO form_proxy_users(ip,proxy) VALUES ('"
												.$ip[1]."','".$ip[2]."');");
								$query2->execute();
								$query->execute();
								$res = $query->fetchAll();
								$user = $res['id'];
								$continue = true;
							} else {
								$user = $res['id'];
								$user->VoteProxy->find()
								$query = $db->prepare("SELECT max(date_vote) AS 'last_date' FROM form_vote_proxy "
												."WHERE defi_clan = '".$defi_clan."'  "
												."AND user = ".$user.";");
								$query->execute();
								$res = $query->fetchAll();
							
								$lastDate = strtotime($res['last_date']);
								// now - 1h :
								$limit = time() - 3600;
								// on limite a un vote par heure pour un ordinateur public (proxy)
								if($lastDate > $limit) {
									$code = 3;
									$desc = "Le dernier vote depuis cet ordinateur est trop récent";
								} else {
									$continue = true;
								}
								
								// Si utilisateur existant ET last_vote pas trop récent
								if($continue) {
									// Durée de vie du cookie : 500 jours
									setcookie("$defi-$clan",'1',time()+3600*24*500);
									// insertion en BD
									$query = $db->prepare("INSERT INTO form_vote_proxy VALUES ('".$user
													."','".$defi_clan."','".$type."','".date("d-m-Y H:i",time())
													."');");
									$query->execute();
								}
							}
						// si pas proxy :
						} else if ($ip[0] == 0) {
							// verifier que user existe et recuperer :
							$query = $db->prepare("SELECT id FROM form_no_proxy_users "
											."WHERE ip LIKE '".$ip[1]."'");
							$query->execute();
							$res = $query->fetchAll();
							$continue = false;
							
							if (empty($res)) {
								// creer l'user
								$query2 = $db->prepare("INSERT INTO form_no_proxy_users(ip) "
												 ."VALUES ('".$ip[1]."')");
								$query2->execute();
								$query->execute();
								$res = $query->fetchAll();
								$user = $res[0]['id'];
								$continue = true;
							} else {
								$user = $res[0]['id'];
								$query = $db->prepare("SELECT * FROM form_vote "
												."WHERE defi_clan = '".$defi_clan."'  "
												."AND user = '".$user."';");
								$query->execute();
								$res = $query->fetchAll();
								
								if (empty($res)) {
									$continue = true;
								} else {
									$code = 5;
									$desc = "Vous avez déjà voté pour ce défi pour ce clan";
									// Durée de vie du cookie : 500 jours
									setcookie("$defi-$clan",'1',time()+3600*24*500);
								}
							}
								
							if ($continue) {
								// Durée de vie du cookie : 500 jours
								setcookie("$defi-$clan",'1',time()+3600*24*500);
								$query = $db->prepare("INSERT INTO form_vote VALUES ('"
												.$user."','".$defi_clan."','".$type."',NOW());");
								$query->execute();
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