<div class="departements form">
<?php echo $this->Form->create('Departement'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Departement'); ?></legend>
	<?php
		echo $this->Form->input('num_departement');
		echo $this->Form->input('num_region');
		echo $this->Form->input('nom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Departement.num_departement')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Departement.num_departement'))); ?></li>
		<li><?php echo $this->Html->link(__('List Departements'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partenaires'), array('controller' => 'partenaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
