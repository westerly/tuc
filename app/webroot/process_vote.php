<?php
	
	$code = 0;
	$desc = "Success";
	
	if(isset($_POST['defi'])) {
		$defi = $_POST['defi'];
	} else {
		return;
	}
	if(isset($_POST['clan'])) {
		$clan = $_POST['clan'];
	} else {
		return;
	}
	if(isset($_POST['type'])) {
		$type = $_POST['type'];
	} else {
		return;
	}
	
	if(isset($_COOKIE["$defi-$clan"])) {
		$code = 4;
		$desc = "Vous avez déjà voté pour ce défi pour ce clan";
	} else {
		if ($type == 0 || $type == 1) {
			if (!empty($defi) && preg_match('#^[0-9]+$#',$defi)
			     && !empty($clan) && preg_match('#^[0-9]+$#',$clan)) {
				$db = new PDO('mysql:host=localhost;dbname=tuc','root');
				
				$query = $db->prepare(
						"SELECT id FROM form_defis_clans WHERE defi_id = '".$defi."' AND clan_id = '".$clan."';");
				
				$query->execute();
				$res = $query->fetchAll();
				// Si le défi existe en BD (normalement oui) :
				if (!empty($res)) {
					$defi_clan = $res[0]['id'];
					$ip = check_ip_proxy();
					// Si proxy :
					if ($ip[0] == 1) {
						$query = $db->prepare("SELECT id FROM form_proxy_users "
										."	WHERE ip LIKE '".$ip[1]."' "
										."	AND proxy LIKE '".$ip[2]."';");
						$query->execute();
						$res = $query->fetchAll();
						$user;
						$continue = false;
						// Si l'user n'existe pas :
						if (empty($res)) {
							$query2 = $db->prepare("INSERT INTO form_proxy_users(ip,proxy) VALUES ('"
											.$ip[1]."','".$ip[2]."');");
							$query2->execute();
							$query->execute();
							$res = $query->fetchAll();
							$user = $res['id'];
							$continue = true;
						} else {
							$user = $res['id'];
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

	$doc = new DOMDocument('1.0', 'utf-8');

	$root = $doc->appendChild($doc->createElement("root"));
	
	$el_code = $doc->createElement("code",$code);
	$root->appendChild($el_code);
	
	
	$el_desc = $doc->createElement("description",$desc);
	$root->appendChild($el_desc);
	
	echo $doc->saveXML();
	$doc->save('test.xml');
	
	
	
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
?>