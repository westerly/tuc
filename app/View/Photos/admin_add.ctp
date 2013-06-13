<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');


echo '<div class="photos form">';

echo $this->Form->create('Photo', array('type' => 'file')); 

	echo"<fieldset>";
		echo "<legend>";
		 echo __('Ajouter une photo');
		echo "</legend>";

		//echo $this->Form->input('chemin_fichier');
		echo $this->Form->input('photo_fichier', array('label' => 'Uploader une photo (PNG, JPG, JPEG)', 'type' => 'file'));
		echo $this->Form->input('afficher');
		
		if(isset($clanCo) && $clanCo){
		}else{
			echo $this->Form->input('clan_id');
		}
		
		echo $this->Form->input('defi_id');
		//echo $this->Form->input('date_upload');

	echo"</fieldset>";
 	echo $this->Form->end(__('Valider')); 
echo"</div>";


echo'<div class="actions">';
	
		echo"<h3>";
			echo  __('Actions');
		echo"</h3>";
		
		echo"<ul>";
			echo '<a href="../photos">Retour</a>';
		echo "</ul>";
echo"</div>";

?>