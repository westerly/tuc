<?php
App::uses('AppModel', 'Model');
/**
 * Departement Model
 *
 * @property Region $Region
 * @property Partenaire $Partenaire
 */
class Departement extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'num_departement';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Region' => array(
			'className' => 'Region',
			'foreignKey' => 'num_region',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Partenaire' => array(
			'className' => 'Partenaire',
			'foreignKey' => 'departement_id',
			'dependent' => false,
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

}
