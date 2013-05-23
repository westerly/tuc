<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');


echo'<div class="partenaires form">';
echo $this->Form->create('Partenaire', array('type' => 'file'));

	echo'<fieldset>';
		echo"<legend> S'inscrire en tant que partenaire </legend>";
	
		echo $this->Form->input('partenaire', array('label' => 'Nom'));
		echo $this->Form->input('adresseWeb', array('label' => 'Site Web'));
		echo $this->Form->input('adresse', array('label' => 'Adresse'));
		echo $this->Form->input('cp', array('label' => 'Code postal'));
		echo $this->Form->input('departement_id', array('label' => 'Département'));
		echo $this->Form->input('ville', array('label' => 'Ville'));
		echo $this->Form->input('description', array('label' => 'Description'));
		echo $this->Form->input('new_fichierLogo', array('label' => 'Logo', 'type' => 'file'));

	echo'</fieldset>';
echo $this->Form->end(__('Submit'));

echo '</div>';

?>
