<div class="profils form">
<?php echo $this->Form->create('Profil'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Profil'); ?></legend>
	<?php
		echo $this->Form->input('profil');
		echo $this->Form->input('Defi');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Profils'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>