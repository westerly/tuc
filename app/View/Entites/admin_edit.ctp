<div class="entites form">
<?php echo $this->Form->create('Entite'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Entite'); ?></legend>
	<?php
		echo $this->Form->input('entite_id');
		echo $this->Form->input('entite');
		echo $this->Form->input('type');
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
