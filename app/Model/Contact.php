<?php
App::uses('AppModel', 'Model');
/**
 * Clan Model
 *
 * @property Defi $Defi
 */
class Contact extends AppModel {

	public $useTable = false; // This model does not use a database table
	
	public $validate = array(
			'message' => array(
					'message' => array(
							'rule' => array('minlength', 50),
							//'allowEmpty' => false,
							'message'    => 'Votre message doit contenir au moins 50 caractères.'
					)
			),
			'email' => array(
					'email' => array(
							'rule' => array('maxLength', 100),
							'last'    => false, // Permet d'afficher à la fois le message d'erreur associé à rule1 et à rule2 si rule1 et rule2 échouent
							'message'    => 'L\'adresse email ne doit pas dépasser 100 caractères.'
					),
					'email' => array(
							'rule'    => array('email', false),
							'message' => 'L\adresse email n\'est pas valide.'
					)
			),
			'nom' => array(
					'nom' => array(
							'rule' => array('maxLength', 50),
							'last'    => false, // Permet d'afficher à la fois le message d'erreur associé à rule1 et à rule2 si rule1 et rule2 échouent
							'message'    => 'Le nom ne doit pas dépasser 50 caractères.'
					)
			),
			'prenom' => array(
					'prenom' => array(
							'rule' => array('maxLength', 50),
							'last'    => false, // Permet d'afficher à la fois le message d'erreur associé à rule1 et à rule2 si rule1 et rule2 échouent
							'message'    => 'Le prénom ne doit pas dépasser 50 caractères.'
					)
			)
	);

}
