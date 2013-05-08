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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Materiel.materiel_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Materiel.materiel_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Materiels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
