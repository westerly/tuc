<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>


<div class="defis form">
<?php echo $this->Form->create('Defi'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un défi'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('demandeur');
		echo $this->Form->input('horaire');
		//echo $this->Form->input('ip_demandeur');
		echo $this->Form->input('nature');
		echo $this->Form->input('localisation_id');
		echo $this->Form->input('nbr_etu');
		echo $this->Form->input('principe_orga');
		echo $this->Form->input('orga_equipe_projet');
		echo $this->Form->input('precautions');
		echo $this->Form->input('resultats');
		echo $this->Form->input('valo_citoyenne');
		echo $this->Form->input('valo_media');
		echo $this->Form->input('etapes');
		echo $this->Form->input('commentaires');
		echo $this->Form->input('date_soumission');
		echo $this->Form->input('afficher');
		echo $this->Form->input('Association');
		echo $this->Form->input('Clan');
		echo $this->Form->input('Entite');
		echo $this->Form->input('Materiel');
		echo $this->Form->input('Partenaire');
		echo $this->Form->input('Profil');
		echo $this->Form->input('Superviseur');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
