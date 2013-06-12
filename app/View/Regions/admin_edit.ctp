<div class="regions form">
<?php echo $this->Form->create('Region'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Region'); ?></legend>
	<?php
		echo $this->Form->input('num_region');
		echo $this->Form->input('nom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Region.num_region')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Region.num_region'))); ?></li>
		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Departements'), array('controller' => 'departements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departement'), array('controller' => 'departements', 'action' => 'add')); ?> </li>
	</ul>
</div>
