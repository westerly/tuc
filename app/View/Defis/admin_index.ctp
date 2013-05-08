<div class="defis index">
	<h2><?php echo __('Defis'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('demandeur'); ?></th>
			<th><?php echo $this->Paginator->sort('horaire'); ?></th>
			<th><?php echo $this->Paginator->sort('ip_demandeur'); ?></th>
			<th><?php echo $this->Paginator->sort('nature'); ?></th>
			<th><?php echo $this->Paginator->sort('localisation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nbr_etu'); ?></th>
			<th><?php echo $this->Paginator->sort('principe_orga'); ?></th>
			<th><?php echo $this->Paginator->sort('orga_equipe_projet'); ?></th>
			<th><?php echo $this->Paginator->sort('precautions'); ?></th>
			<th><?php echo $this->Paginator->sort('resultats'); ?></th>
			<th><?php echo $this->Paginator->sort('valo_citoyenne'); ?></th>
			<th><?php echo $this->Paginator->sort('valo_media'); ?></th>
			<th><?php echo $this->Paginator->sort('etapes'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaires'); ?></th>
			<th><?php echo $this->Paginator->sort('date_soumission'); ?></th>
			<th><?php echo $this->Paginator->sort('afficher'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($defis as $defi): ?>
	<tr>
		<td><?php echo h($defi['Defi']['id']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['nom']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['demandeur']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($defi['Horaire']['horaire'], array('controller' => 'horaires', 'action' => 'view', $defi['Horaire']['horaire_id'])); ?>
		</td>
		<td><?php echo h($defi['Defi']['ip_demandeur']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['nature']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($defi['Localisation']['lieu'], array('controller' => 'localisations', 'action' => 'view', $defi['Localisation']['localisation_id'])); ?>
		</td>
		<td><?php echo h($defi['Defi']['nbr_etu']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['principe_orga']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['orga_equipe_projet']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['precautions']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['resultats']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['valo_citoyenne']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['valo_media']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['etapes']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['commentaires']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['date_soumission']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['afficher']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $defi['Defi']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $defi['Defi']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $defi['Defi']['id']), null, __('Are you sure you want to delete # %s?', $defi['Defi']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Defi'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Localisations'), array('controller' => 'localisations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localisation'), array('controller' => 'localisations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Horaires'), array('controller' => 'horaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horaire'), array('controller' => 'horaires', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis Clans'), array('controller' => 'defis_clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defis Clan'), array('controller' => 'defis_clans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clans'), array('controller' => 'clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entites'), array('controller' => 'entites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entite'), array('controller' => 'entites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiels'), array('controller' => 'materiels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiel'), array('controller' => 'materiels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partenaires'), array('controller' => 'partenaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profils'), array('controller' => 'profils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Superviseurs'), array('controller' => 'superviseurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superviseur'), array('controller' => 'superviseurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
