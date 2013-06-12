<div class="horaires index">
	<h2><?php echo __('Horaires'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('horaire_id'); ?></th>
			<th><?php echo $this->Paginator->sort('horaire'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($horaires as $horaire): ?>
	<tr>
		<td><?php echo h($horaire['Horaire']['horaire_id']); ?>&nbsp;</td>
		<td><?php echo h($horaire['Horaire']['horaire']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $horaire['Horaire']['horaire_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $horaire['Horaire']['horaire_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $horaire['Horaire']['horaire_id']), null, __('Are you sure you want to delete # %s?', $horaire['Horaire']['horaire_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Horaire'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
