<?php
App::uses('AppModel', 'Model');
/**
 * Defi Model
 *
 * @property Localisation $Localisation
 * @property Horaire $Horaire
 * @property Association $Association
 * @property Clan $Clan
 * @property Entite $Entite
 * @property Materiel $Materiel
 * @property Partenaire $Partenaire
 * @property Profil $Profil
 * @property Superviseur $Superviseur
 */
class Defi extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Localisation' => array(
			'className' => 'Localisation',
			'foreignKey' => 'localisation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Horaire' => array(
			'className' => 'Horaire',
			'foreignKey' => 'horaire',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
		'DefisClan' => array(
			'className' => 'DefisClan',
			'foreignKey' => 'defi_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'defi_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(

		'Association' => array(
			'className' => 'Association',
			'joinTable' => 'defis_associations',
			'foreignKey' => 'defi_id',
			'associationForeignKey' => 'association_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Clan' => array(
			'className' => 'Clan',
			'joinTable' => 'defis_clans',
			'foreignKey' => 'defi_id',
			'associationForeignKey' => 'clan_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Entite' => array(
			'className' => 'Entite',
			'joinTable' => 'defis_entites',
			'foreignKey' => 'defi_id',
			'associationForeignKey' => 'entite_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Materiel' => array(
			'className' => 'Materiel',
			'joinTable' => 'defis_materiels',
			'foreignKey' => 'defi_id',
			'associationForeignKey' => 'materiel_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Partenaire' => array(
			'className' => 'Partenaire',
			'joinTable' => 'defis_partenaires',
			'foreignKey' => 'defi_id',
			'associationForeignKey' => 'partenaire_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Profil' => array(
			'className' => 'Profil',
			'joinTable' => 'defis_profils',
			'foreignKey' => 'defi_id',
			'associationForeignKey' => 'profil_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Superviseur' => array(
			'className' => 'Superviseur',
			'joinTable' => 'defis_superviseurs',
			'foreignKey' => 'defi_id',
			'associationForeignKey' => 'superviseur_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
