<?php
App::uses('Message', 'Model');

/**
 * Message Test Case
 *
 */
class MessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.message',
		'app.entite',
		'app.superviseur',
		'app.defi',
		'app.localisation',
		'app.horaire',
		'app.defis_clan',
		'app.clan',
		'app.photo',
		'app.association',
		'app.defis_association',
		'app.defis_entite',
		'app.materiel',
		'app.defis_materiel',
		'app.partenaire',
		'app.departement',
		'app.region',
		'app.defis_partenaire',
		'app.profil',
		'app.defis_profil',
		'app.defis_superviseur'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Message = ClassRegistry::init('Message');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Message);

		parent::tearDown();
	}

}
