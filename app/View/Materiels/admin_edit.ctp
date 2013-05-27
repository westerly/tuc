<div class="materiels form">
<?php echo $this->Form->create('Materiel'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Materiel'); ?></legend>
	<?php
		echo $this->Form->input('materiel_id');
		echo $this->Form->input('materiel');
		echo $this->Form->input('Defi');
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
