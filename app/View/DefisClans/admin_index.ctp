<div class="defisClans index">
	<h2><?php echo __('Defis Clans'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('defi_id'); ?></th>
			<th><?php echo $this->Paginator->sort('clan_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nbVotesPour'); ?></th>
			<th><?php echo $this->Paginator->sort('nbVotesContre'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($defisClans as $defisClan): ?>
	<tr>
		<td><?php echo h($defisClan['DefisClan']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($defisClan['Defi']['nom'], array('controller' => 'defis', 'action' => 'view', $defisClan['Defi']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($defisClan['Clan']['nom'], array('controller' => 'clans', 'action' => 'view', $defisClan['Clan']['id'])); ?>
		</td>
		<td><?php echo h($defisClan['DefisClan']['nbVotesPour']); ?>&nbsp;</td>
		<td><?php echo h($defisClan['DefisClan']['nbVotesContre']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $defisClan['DefisClan']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $defisClan['DefisClan']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $defisClan['DefisClan']['id']), null, __('Are you sure you want to delete # %s?', $defisClan['DefisClan']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Defis Clan'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clans'), array('controller' => 'clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add')); ?> </li>
	</ul>
</div>
