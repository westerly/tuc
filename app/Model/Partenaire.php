<?php
App::uses('AppModel', 'Model');
/**
 * Partenaire Model
 *
 * @property Departement $Departement
 * @property DefisPartenaire $DefisPartenaire
 */
class Partenaire extends AppModel {

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
