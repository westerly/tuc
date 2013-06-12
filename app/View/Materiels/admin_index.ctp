<div class="materiels index">
	<h2><?php echo __('Materiels'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('materiel_id'); ?></th>
			<th><?php echo $this->Paginator->sort('materiel'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($materiels as $materiel): ?>
	<tr>
		<td><?php echo h($materiel['Materiel']['materiel_id']); ?>&nbsp;</td>
		<td><?php echo h($materiel['Materiel']['materiel']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $materiel['Materiel']['materiel_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $materiel['Materiel']['materiel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $materiel['Materiel']['materiel_id']), null, __('Are you sure you want to delete # %s?', $materiel['Materiel']['materiel_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Materiel'), array('action' => 'add')); ?></li>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
