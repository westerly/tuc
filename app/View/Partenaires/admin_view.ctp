<?php
//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');
?>



<div class="partenaires view">
<h2><?php  echo __('Partenaire'); ?></h2>
	<dl>
		<dt><?php echo __('Partenaire Id'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['partenaire_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partenaire'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['partenaire']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AdresseWeb'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['adresseWeb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cp'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['cp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FichierLogo'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['fichierLogo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			 <?php  echo "<a href='".URL_IMG.$partenaire['Partenaire']['fichierLogo']."' class='top_up'><img class='view' src='".URL_IMG.$partenaire['Partenaire']['fichierLogo']."'/></a>"; ?> 
			&nbsp;
		</dd>
		<dt><?php echo __('Departement'); ?></dt>
		<dd>
			<?php echo $this->Html->link($partenaire['Departement']['nom'], array('controller' => 'departements', 'action' => 'view', $partenaire['Departement']['num_departement'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Afficher'); ?></dt>
		<dd>
			<?php echo h($partenaire['Partenaire']['afficher']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Defis'); ?></h3>
	<?php if (!empty($partenaire['Defi'])): ?>
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
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($partenaire['Defi'] as $defi): ?>
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
	<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<a href="javascript:history.back()">Retour</a> 
		</ul>
	</div>
</div>
