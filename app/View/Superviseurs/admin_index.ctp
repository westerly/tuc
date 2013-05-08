<div class="superviseurs index">
	<h2><?php echo __('Superviseurs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('superviseur_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('prenom'); ?></th>
			<th><?php echo $this->Paginator->sort('fonction'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('tel'); ?></th>
			<th><?php echo $this->Paginator->sort('entite_id'); ?></th>
			<th><?php echo $this->Paginator->sort('entite_type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($superviseurs as $superviseur): ?>
	<tr>
		<td><?php echo h($superviseur['Superviseur']['superviseur_id']); ?>&nbsp;</td>
		<td><?php echo h($superviseur['Superviseur']['nom']); ?>&nbsp;</td>
		<td><?php echo h($superviseur['Superviseur']['prenom']); ?>&nbsp;</td>
		<td><?php echo h($superviseur['Superviseur']['fonction']); ?>&nbsp;</td>
		<td><?php echo h($superviseur['Superviseur']['email']); ?>&nbsp;</td>
		<td><?php echo h($superviseur['Superviseur']['tel']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($superviseur['Entite']['entite'], array('controller' => 'entites', 'action' => 'view', $superviseur['Entite']['entite_id'])); ?>
		</td>
		<td><?php echo h($superviseur['Superviseur']['entite_type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $superviseur['Superviseur']['superviseur_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $superviseur['Superviseur']['superviseur_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $superviseur['Superviseur']['superviseur_id']), null, __('Are you sure you want to delete # %s?', $superviseur['Superviseur']['superviseur_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Superviseur'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Entites'), array('controller' => 'entites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entite'), array('controller' => 'entites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
