<div class="associations form">
<?php echo $this->Form->create('Association'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Association'); ?></legend>
	<?php
		echo $this->Form->input('association_id');
		echo $this->Form->input('association');
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
