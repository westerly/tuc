<?php
App::uses('AppModel', 'Model');
/**
 * Partenaire Model
 *
 * @property Departement $Departement
 * @property DefisPartenaire $DefisPartenaire
 */
class Partenaire extends AppModel {
	
	public $actsAs = array('ImageUpload'); // Permet d'associer le Behaviour de ImageUpload au modèle Partenaire

	// Permet de définir les règles de validation des données
	// Attention la clé rule doit toujours être présente
	public $validate = array(
        'partenaire' => array(
			'rule1' => array(
				'rule' => array('maxLength', 50), 
				'required' => true,// Spécifie que le champ est obligatoire indique que la clé du tableau doit être présente - cela ne veut pas dire qu’elle doit avoir une valeur. Par conséquent, la validation échouera si le champ n’est pas présent dans le jeu de données, mais pourra réussir (en fonction de la règle) si la valeur soumise est vide (‘’)
				'allowEmpty' => false, // Si définie à false, la valeur du champ doit être non vide
				'last' => false, // Permet d'afficher à la fois le message d'erreur associé à rule1 et à rule2 si rule1 et rule2 échouent
				'message'    => 'Le nom du partenaire ne doit pas dépasser 50 caractères.'
			)
		),
		'adresseWeb' => array(
			'rule1' => array(
				'rule' => array('maxLength', 100), 
				'last'    => false, // Permet d'afficher à la fois le message d'erreur associé à rule1 et à rule2 si rule1 et rule2 échouent
				'required' => false, // A renseigner sinon par défault le champ devient obligatoire dès qu'on applique une règle dessus...
				'allowEmpty' => true, // A renseigner sinon par défault le champ devient obligatoire dès qu'on applique une règle dessus...
				'message'    => 'L\'adresse web ne doit pas dépasser 100 caractères.'
			),
			'rule2' => array(
				'rule' => 'url',
				'message'    => 'L\'adresse web semble être mal formée.'
			)
		),
		'adresse' => array(
			'rule1' => array(
				'rule' => array('maxLength', 255), 
				'message'    => 'L\'adresse ne doit pas dépasser 255 caractères.'
			)
		),
		'cp' => array(
			'rule1' => array(
				'rule' => '/^((0[1-9])|([1-8][0-9])|(9[0-8]))[0-9]{3}$/',
				'message'    => 'Le code postal est incorrect.'
			)
		),
		'ville' => array(
			'rule1' => array(
				'rule' => array('maxLength', 100), 
				'message'    => 'Le nom de la ville ne doit pas dépasser 100 caractères.'
			)
		),
		'description' => array(
			'rule1' => array(
				'rule' => array('minlength', 50), 
				'allowEmpty' => false,
				'message'    => 'La description doit contenir au moins 50 caractères.'
			)
		),
		'new_fichierLogo' => array(
			'ruleExtension'  => array(
				'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
				'required' => false,
				'allowEmpty' => true,
				'message' => 'L\'extension du ficher fourni n\'est pas valide.',
				'last' => true
			),
			'ruleFileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'La taille de l\'image ne doit pas dépasser 2MB.',
				'last' => true
			),
			'rule3' => array(
				'rule'=> array('isRightsOnFolderDestination','test/ezfh/'),
				'message'    => 'Il semble il y avoir un problème de droit d\'accès sur un dossier du serveur, nous ne pouvons pas upload votre logo.',
			)
		)
    );
	

	public $displayField = 'partenaire';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'partenaires';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'partenaire_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Departement' => array(
			'className' => 'Departement',
			'foreignKey' => 'departement_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasAndBelongsToMany = array(
        'Defi' =>
            array(
                'className'              => 'Defi',
                'joinTable'              => 'defis_partenaires',
                'foreignKey'             => 'partenaire_id',
                'associationForeignKey'  => 'defi_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );

}
