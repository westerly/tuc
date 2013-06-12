<div class="associations view">
<h2><?php  echo __('Association'); ?></h2>
	<dl>
		<dt><?php echo __('Association Id'); ?></dt>
		<dd>
			<?php echo h($association['Association']['association_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Association'); ?></dt>
		<dd>
			<?php echo h($association['Association']['association']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Defis'); ?></h3>
	<?php if (!empty($association['Defi'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Demandeur'); ?></th>
		<th><?php echo __('Horaire'); ?></th>
		<th><?php echo __('Ip Demandeur'); ?></th>
		<th><?php echo __('Nature'); ?></th>
		<th><?php echo __('Localisation Id'); ?></th>
		<th><?php echo __('Nbr Etu'); ?></th>
		<th><?php echo __('Principe Orga'); ?></th>
		<th><?php echo __('Orga Equipe Projet'); ?></th>
		<th><?php echo __('Precautions'); ?></th>
		<th><?php echo __('Resultats'); ?></th>
		<th><?php echo __('Valo Citoyenne'); ?></th>
		<th><?php echo __('Valo Media'); ?></th>
		<th><?php echo __('Etapes'); ?></th>
		<th><?php echo __('Commentaires'); ?></th>
		<th><?php echo __('Date Soumission'); ?></th>
		<th><?php echo __('Afficher'); ?></th>
		<th ></th>
	</tr>
	<?php
		$i = 0;
		foreach ($association['Defi'] as $defi): ?>
		<tr>
			<td><?php echo $defi['id']; ?></td>
			<td><?php echo $defi['nom']; ?></td>
			<td><?php echo $defi['demandeur']; ?></td>
			<td><?php echo $defi['horaire']; ?></td>
			<td><?php echo $defi['ip_demandeur']; ?></td>
			<td><?php echo $defi['nature']; ?></td>
			<td><?php echo $defi['localisation_id']; ?></td>
			<td><?php echo $defi['nbr_etu']; ?></td>
			<td><?php echo $defi['principe_orga']; ?></td>
			<td><?php echo $defi['orga_equipe_projet']; ?></td>
			<td><?php echo $defi['precautions']; ?></td>
			<td><?php echo $defi['resultats']; ?></td>
			<td><?php echo $defi['valo_citoyenne']; ?></td>
			<td><?php echo $defi['valo_media']; ?></td>
			<td><?php echo $defi['etapes']; ?></td>
			<td><?php echo $defi['commentaires']; ?></td>
			<td><?php echo $defi['date_soumission']; ?></td>
			<td><?php echo $defi['afficher']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'defis', 'action' => 'view', $defi['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'defis', 'action' => 'edit', $defi['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'defis', 'action' => 'delete', $defi['id']), null, __('Are you sure you want to delete # %s?', $defi['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
