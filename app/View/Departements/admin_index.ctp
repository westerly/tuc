<div class="departements index">
	<h2><?php echo __('Departements'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('num_departement'); ?></th>
			<th><?php echo $this->Paginator->sort('num_region'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($departements as $departement): ?>
	<tr>
		<td><?php echo h($departement['Departement']['num_departement']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($departement['Region']['nom'], array('controller' => 'regions', 'action' => 'view', $departement['Region']['num_region'])); ?>
		</td>
		<td><?php echo h($departement['Departement']['nom']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $departement['Departement']['num_departement'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $departement['Departement']['num_departement'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $departement['Departement']['num_departement']), null, __('Are you sure you want to delete # %s?', $departement['Departement']['num_departement'])); ?>
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
		<li><?php echo $this->Html->link(__('New Departement'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partenaires'), array('controller' => 'partenaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
