<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Add Message'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('email');
		echo $this->Form->input('entite_id');
		echo $this->Form->input('contenu');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Messages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Entites'), array('controller' => 'entites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entite'), array('controller' => 'entites', 'action' => 'add')); ?> </li>
	</ul>
</div>
