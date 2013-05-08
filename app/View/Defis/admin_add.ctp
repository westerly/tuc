<div class="defis form">
<?php echo $this->Form->create('Defi'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Defi'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Defis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Localisations'), array('controller' => 'localisations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localisation'), array('controller' => 'localisations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Horaires'), array('controller' => 'horaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horaire'), array('controller' => 'horaires', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis Clans'), array('controller' => 'defis_clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defis Clan'), array('controller' => 'defis_clans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clans'), array('controller' => 'clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entites'), array('controller' => 'entites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entite'), array('controller' => 'entites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiels'), array('controller' => 'materiels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiel'), array('controller' => 'materiels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partenaires'), array('controller' => 'partenaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profils'), array('controller' => 'profils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Superviseurs'), array('controller' => 'superviseurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superviseur'), array('controller' => 'superviseurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
