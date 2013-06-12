<div class="superviseurs form">
<?php echo $this->Form->create('Superviseur'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Superviseur'); ?></legend>
	<?php
		echo $this->Form->input('superviseur_id');
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('fonction');
		echo $this->Form->input('email');
		echo $this->Form->input('tel');
		echo $this->Form->input('entite_id');
		echo $this->Form->input('entite_type');
		echo $this->Form->input('Defi');
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
