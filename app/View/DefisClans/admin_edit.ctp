<div class="defisClans form">
<?php echo $this->Form->create('DefisClan'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Defis Clan'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('defi_id');
		echo $this->Form->input('clan_id');
		echo $this->Form->input('nbVotesPour');
		echo $this->Form->input('nbVotesContre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DefisClan.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DefisClan.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Defis Clans'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clans'), array('controller' => 'clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add')); ?> </li>
	</ul>
</div>
