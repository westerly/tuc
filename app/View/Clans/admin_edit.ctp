<div class="clans form">
<?php echo $this->Form->create('Clan'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Clan'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('Defi');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Clan.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Clan.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clans'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis Clans'), array('controller' => 'defis_clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defis Clan'), array('controller' => 'defis_clans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
