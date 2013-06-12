<div class="horaires form">
<?php echo $this->Form->create('Horaire'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Horaire'); ?></legend>
	<?php
		echo $this->Form->input('horaire_id');
		echo $this->Form->input('horaire');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Horaire.horaire_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Horaire.horaire_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Horaires'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
