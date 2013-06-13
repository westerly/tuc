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
		echo $this->Form->input('nom', array('label'=> 'Nom'));
		echo $this->Form->input('demandeur');
		echo $this->Form->input('afficher', array('label'=> 'Afficher le défi'));
		echo $this->Form->input('horaire');
		//echo $this->Form->input('ip_demandeur');
		echo $this->Form->input('nature');
		echo $this->Form->input('localisation_id');
		echo $this->Form->input('nbr_etu', array('label'=> 'Nombre d\'étudiants'));
		echo $this->Form->input('principe_orga', array('label'=> 'Principe et organisation'));
		echo $this->Form->input('orga_equipe_projet', array('label'=> 'Organisation équipe projet'));
		echo $this->Form->input('precautions', array('label'=> 'Précautions'));
		echo $this->Form->input('resultats', array('label'=> 'Résultats'));
		echo $this->Form->input('valo_citoyenne', array('label'=> 'Valorisation citoyenne'));
		echo $this->Form->input('valo_media', array('label'=> 'Valorisation médiatique'));
		echo $this->Form->input('etapes', array('label'=> 'Les étapes'));
		echo $this->Form->input('commentaires');
		echo $this->Form->input('date_soumission', array('label'=> 'Date de soumission'));
		echo $this->Form->input('Association', array('label'=> 'Associations liées'));
		echo $this->Form->input('Clan',array('label'=> 'Clans liés'));
		echo $this->Form->input('Entite', array('label'=> 'Entités liées'));
		echo $this->Form->input('Materiel', array('label'=> 'Matériel nécessaire'));
		echo $this->Form->input('Partenaire', array('label'=> 'Partenaires'));
		echo $this->Form->input('Profil', array('label'=> 'Profils'));
		echo $this->Form->input('Superviseur', array('label'=> 'Superviseurs'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
