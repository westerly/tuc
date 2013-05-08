<div class="associations form">
<?php echo $this->Form->create('Association'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Association'); ?></legend>
	<?php
		echo $this->Form->input('association_id');
		echo $this->Form->input('association');
		echo $this->Form->input('Defi');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Association.association_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Association.association_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Associations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
