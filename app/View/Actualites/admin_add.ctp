<div class="actualites form">
<?php echo $this->Form->create('Actualite'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Actualite'); ?></legend>
	<?php
		echo $this->Form->input('date_creation');
		echo $this->Form->input('titre');
		echo $this->Form->input('contenu');
		echo $this->Form->input('last_updated');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Actualites'), array('action' => 'index')); ?></li>
	</ul>
</div>
