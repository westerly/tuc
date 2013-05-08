<div class="defisClans view">
<h2><?php  echo __('Defis Clan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($defisClan['DefisClan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($defisClan['Defi']['nom'], array('controller' => 'defis', 'action' => 'view', $defisClan['Defi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clan'); ?></dt>
		<dd>
			<?php echo $this->Html->link($defisClan['Clan']['nom'], array('controller' => 'clans', 'action' => 'view', $defisClan['Clan']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NbVotesPour'); ?></dt>
		<dd>
			<?php echo h($defisClan['DefisClan']['nbVotesPour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NbVotesContre'); ?></dt>
		<dd>
			<?php echo h($defisClan['DefisClan']['nbVotesContre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Defis Clan'), array('action' => 'edit', $defisClan['DefisClan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Defis Clan'), array('action' => 'delete', $defisClan['DefisClan']['id']), null, __('Are you sure you want to delete # %s?', $defisClan['DefisClan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis Clans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defis Clan'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clans'), array('controller' => 'clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add')); ?> </li>
	</ul>
</div>
