<div class="entites form">
<?php echo $this->Form->create('Entite'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Entite'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Entites'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Superviseurs'), array('controller' => 'superviseurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superviseur'), array('controller' => 'superviseurs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
