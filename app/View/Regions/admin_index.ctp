<div class="regions index">
	<h2><?php echo __('Regions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('num_region'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($regions as $region): ?>
	<tr>
		<td><?php echo h($region['Region']['num_region']); ?>&nbsp;</td>
		<td><?php echo h($region['Region']['nom']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $region['Region']['num_region'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $region['Region']['num_region'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $region['Region']['num_region']), null, __('Are you sure you want to delete # %s?', $region['Region']['num_region'])); ?>
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
		<li><?php echo $this->Html->link(__('New Region'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Departements'), array('controller' => 'departements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departement'), array('controller' => 'departements', 'action' => 'add')); ?> </li>
	</ul>
</div>
