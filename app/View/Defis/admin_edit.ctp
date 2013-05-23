<div class="defis form">
<?php echo $this->Form->create('Defi'); ?>
	<fieldset>
		<legend><?php echo __('Edition du défi'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('demandeur');
		echo $this->Form->input('horaire');
		echo $this->Form->input('ip_demandeur');
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
		echo $this->Form->input('Entite');
		echo $this->Form->input('Materiel');
		echo $this->Form->input('Partenaire');
		echo $this->Form->input('Profil');
		echo $this->Form->input('Superviseur');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

