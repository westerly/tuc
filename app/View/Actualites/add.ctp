<?php 

	echo $this->form->create('Actualite', array('url' => array('action' => 'add')));
	
	echo $this->form->input('Actualite.titre', array('label'=>'Titre: '));
	echo $this->form->input('Actualite.contenu', array('label'=>'Contenu: '));
	echo $this->form->input('Actualite.date', array('dateFormat' => 'DMY', 'label'=>'Date de création: '));
	echo $this->form->end("Envoyer");

?> 