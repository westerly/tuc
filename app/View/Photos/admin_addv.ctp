<?php
	//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
	echo $this->Session->flash('ok');
	echo $this->Session->flash('nok');
?>

<div class="photos form">

<?php
	echo $this->Form->create('Photo'); 
?>
	<fieldset>
		<legend>
			Ajouter une vidéo
		</legend>
	<?php
		//echo $this->Form->input('chemin_fichier');
		echo $this->Form->input('video_url', array('label' => 'Insérer le lien Youtube :', 'type' => 'text'));
		echo $this->Form->input('afficher');
		echo $this->Form->input('clan_id');
		echo $this->Form->input('defi_id');
		//echo $this->Form->input('date_upload');
	?>
	</fieldset>
	<?php
		echo $this->Form->end(__('Valider'));
	?>
</div>


<div class="actions">
	<h3>Actions</h3>
	<ul>
		<a href="../photos">Retour</a>
	</ul>
</div>
