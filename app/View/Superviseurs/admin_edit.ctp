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
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Superviseur.superviseur_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Superviseur.superviseur_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Superviseurs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Entites'), array('controller' => 'entites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entite'), array('controller' => 'entites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
