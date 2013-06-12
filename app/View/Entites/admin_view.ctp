<div class="entites view">
<h2><?php  echo __('Entite'); ?></h2>
	<dl>
		<dt><?php echo __('Entite Id'); ?></dt>
		<dd>
			<?php echo h($entite['Entite']['entite_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entite'); ?></dt>
		<dd>
			<?php echo h($entite['Entite']['entite']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($entite['Entite']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Superviseurs'); ?></h3>
	<?php if (!empty($entite['Superviseur'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Superviseur Id'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Prenom'); ?></th>
		<th><?php echo __('Fonction'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Tel'); ?></th>
		<th><?php echo __('Entite Id'); ?></th>
		<th><?php echo __('Entite Type'); ?></th>
		<th ></th>
	</tr>
	<?php
		$i = 0;
		foreach ($entite['Superviseur'] as $superviseur): ?>
		<tr>
			<td><?php echo $superviseur['superviseur_id']; ?></td>
			<td><?php echo $superviseur['nom']; ?></td>
			<td><?php echo $superviseur['prenom']; ?></td>
			<td><?php echo $superviseur['fonction']; ?></td>
			<td><?php echo $superviseur['email']; ?></td>
			<td><?php echo $superviseur['tel']; ?></td>
			<td><?php echo $superviseur['entite_id']; ?></td>
			<td><?php echo $superviseur['entite_type']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'superviseurs', 'action' => 'view', $superviseur['superviseur_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'superviseurs', 'action' => 'edit', $superviseur['superviseur_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'superviseurs', 'action' => 'delete', $superviseur['superviseur_id']), null, __('Are you sure you want to delete # %s?', $superviseur['superviseur_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Superviseur'), array('controller' => 'superviseurs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Defis'); ?></h3>
	<?php if (!empty($entite['Defi'])): ?>
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
		foreach ($entite['Defi'] as $defi): ?>
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

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<br/>
<br/>
<br/>
<br/>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
