<?php
App::uses('AppController', 'Controller');
/**
 * Defis Controller
 *
 * @property Defi $Defi
 */
class AccueilController extends AppController {

	public function index() {
		$this->layout = 'front';
	}

}
