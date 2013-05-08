<?php
App::uses('AppModel', 'Model');
/**
 * Localisation Model
 *
 */
class Localisation extends AppModel {

	public $displayField = 'lieu';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'localisations';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'localisation_id';
	
	public $hasMany = array(
        'Defi' => array(
            'className'     => 'Defi',
            'foreignKey'    => 'localisation_id',
            'conditions'    => '',
            'order'         => '',
            'limit'         => '',
            'dependent'     => ''
        )
    );

}
