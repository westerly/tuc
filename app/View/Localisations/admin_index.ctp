<div class="localisations index">
	<h2><?php echo __('Localisations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('localisation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lieu'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($localisations as $localisation): ?>
	<tr>
		<td><?php echo h($localisation['Localisation']['localisation_id']); ?>&nbsp;</td>
		<td><?php echo h($localisation['Localisation']['lieu']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $localisation['Localisation']['localisation_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $localisation['Localisation']['localisation_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $localisation['Localisation']['localisation_id']), null, __('Are you sure you want to delete # %s?', $localisation['Localisation']['localisation_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Localisation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
