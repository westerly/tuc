<?php
App::uses('AppModel', 'Model');
/**
 * Horaire Model
 *
 */
class Horaire extends AppModel {

	public $displayField = 'horaire';
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'horaires';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'horaire_id';
	
	public $hasMany = array(
        'Defi' => array(
            'className'     => 'Defi',
            'foreignKey'    => 'horaire',
            'conditions'    => '',
            'order'         => '',
            'limit'         => '',
            'dependent'     => ''
        )
    );

}
