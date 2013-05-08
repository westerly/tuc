<div class="localisations form">
<?php echo $this->Form->create('Localisation'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Localisation'); ?></legend>
	<?php
		echo $this->Form->input('localisation_id');
		echo $this->Form->input('lieu');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Localisation.localisation_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Localisation.localisation_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Localisations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
