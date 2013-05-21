<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');


echo '<div class="photos form">';

echo $this->Form->create('Photo', array('type' => 'file')); 

	echo"<fieldset>";
		echo "<legend>";
		 echo __('Admin Add Photo');
		echo "</legend>";

		//echo $this->Form->input('chemin_fichier');
		echo $this->Form->input('photo_fichier', array('label' => 'Uploader une photo', 'type' => 'file'));
		echo $this->Form->input('afficher');
		echo $this->Form->input('clan_id');
		echo $this->Form->input('defi_id');
		//echo $this->Form->input('date_upload');

	echo"</fieldset>";
 	echo $this->Form->end(__('Submit')); 
echo"</div>";


echo'<div class="actions">';
	
		echo"<h3>";
			echo  __('Actions');
		echo"</h3>";
		
		echo"<ul>";
			echo"<li>". $this->Html->link(__('List Photos'), array('action' => 'index')). "</li>";
			echo"<li>". $this->Html->link(__('List Clans'), array('controller' => 'clans', 'action' => 'index'))."</li>";
			echo"<li>". $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add'))."</li>";
			echo"<li>". $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index'))."</li>";
			echo"<li>". $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add'))."</li>";
		echo "</ul>";
echo"</div>";

?>