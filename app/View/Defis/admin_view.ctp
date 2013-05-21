<div class="defis view">
<h2><?php  echo __('Defi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Demandeur'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['demandeur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horaire'); ?></dt>
		<dd>
			<?php echo $this->Html->link($defi['Horaire']['horaire'], array('controller' => 'horaires', 'action' => 'view', $defi['Horaire']['horaire_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Demandeur'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['ip_demandeur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nature'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['nature']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localisation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($defi['Localisation']['lieu'], array('controller' => 'localisations', 'action' => 'view', $defi['Localisation']['localisation_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nbr Etu'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['nbr_etu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Principe Orga'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['principe_orga']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orga Equipe Projet'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['orga_equipe_projet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precautions'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['precautions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resultats'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['resultats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valo Citoyenne'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['valo_citoyenne']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valo Media'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['valo_media']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etapes'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['etapes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaires'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['commentaires']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Soumission'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['date_soumission']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Afficher'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['afficher']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Defi'), array('action' => 'edit', $defi['Defi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Defi'), array('action' => 'delete', $defi['Defi']['id']), null, __('Are you sure you want to delete # %s?', $defi['Defi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Defis Clans'); ?></h3>
	<?php if (!empty($defi['DefisClan'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Defi Id'); ?></th>
		<th><?php echo __('Clan Id'); ?></th>
		<th><?php echo __('NbVotesPour'); ?></th>
		<th><?php echo __('NbVotesContre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['DefisClan'] as $defisClan): ?>
		<tr>
			<td><?php echo $defisClan['id']; ?></td>
			<td><?php echo $defisClan['defi_id']; ?></td>
			<td><?php echo $defisClan['clan_id']; ?></td>
			<td><?php echo $defisClan['nbVotesPour']; ?></td>
			<td><?php echo $defisClan['nbVotesContre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'defis_clans', 'action' => 'view', $defisClan['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'defis_clans', 'action' => 'edit', $defisClan['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'defis_clans', 'action' => 'delete', $defisClan['id']), null, __('Are you sure you want to delete # %s?', $defisClan['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Defis Clan'), array('controller' => 'defis_clans', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Photos'); ?></h3>
	<?php if (!empty($defi['Photo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nom Fichier'); ?></th>
		<th><?php echo __('Afficher'); ?></th>
		<th><?php echo __('Clan Id'); ?></th>
		<th><?php echo __('Defi Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Photo'] as $photo): ?>
		<tr>
			<td><?php echo $photo['id']; ?></td>
			<td><?php echo $photo['chemin_fichier']; ?></td>
			<td><?php echo $photo['afficher']; ?></td>
			<td><?php echo $photo['clan_id']; ?></td>
			<td><?php echo $photo['defi_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'photos', 'action' => 'view', $photo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'photos', 'action' => 'edit', $photo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photos', 'action' => 'delete', $photo['id']), null, __('Are you sure you want to delete # %s?', $photo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Associations'); ?></h3>
	<?php if (!empty($defi['Association'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Association Id'); ?></th>
		<th><?php echo __('Association'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Association'] as $association): ?>
		<tr>
			<td><?php echo $association['association_id']; ?></td>
			<td><?php echo $association['association']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'associations', 'action' => 'view', $association['association_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'associations', 'action' => 'edit', $association['association_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'associations', 'action' => 'delete', $association['association_id']), null, __('Are you sure you want to delete # %s?', $association['association_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Clans'); ?></h3>
	<?php if (!empty($defi['Clan'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Clan'] as $clan): ?>
		<tr>
			<td><?php echo $clan['id']; ?></td>
			<td><?php echo $clan['nom']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clans', 'action' => 'view', $clan['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clans', 'action' => 'edit', $clan['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clans', 'action' => 'delete', $clan['id']), null, __('Are you sure you want to delete # %s?', $clan['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Entites'); ?></h3>
	<?php if (!empty($defi['Entite'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Entite Id'); ?></th>
		<th><?php echo __('Entite'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Entite'] as $entite): ?>
		<tr>
			<td><?php echo $entite['entite_id']; ?></td>
			<td><?php echo $entite['entite']; ?></td>
			<td><?php echo $entite['type']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entites', 'action' => 'view', $entite['entite_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entites', 'action' => 'edit', $entite['entite_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entites', 'action' => 'delete', $entite['entite_id']), null, __('Are you sure you want to delete # %s?', $entite['entite_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entite'), array('controller' => 'entites', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Materiels'); ?></h3>
	<?php if (!empty($defi['Materiel'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Materiel Id'); ?></th>
		<th><?php echo __('Materiel'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Materiel'] as $materiel): ?>
		<tr>
			<td><?php echo $materiel['materiel_id']; ?></td>
			<td><?php echo $materiel['materiel']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'materiels', 'action' => 'view', $materiel['materiel_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'materiels', 'action' => 'edit', $materiel['materiel_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'materiels', 'action' => 'delete', $materiel['materiel_id']), null, __('Are you sure you want to delete # %s?', $materiel['materiel_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Materiel'), array('controller' => 'materiels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Partenaires'); ?></h3>
	<?php if (!empty($defi['Partenaire'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Partenaire Id'); ?></th>
		<th><?php echo __('Partenaire'); ?></th>
		<th><?php echo __('AdresseWeb'); ?></th>
		<th><?php echo __('Cp'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('FichierLogo'); ?></th>
		<th><?php echo __('Departement Id'); ?></th>
		<th><?php echo __('Afficher'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Partenaire'] as $partenaire): ?>
		<tr>
			<td><?php echo $partenaire['partenaire_id']; ?></td>
			<td><?php echo $partenaire['partenaire']; ?></td>
			<td><?php echo $partenaire['adresseWeb']; ?></td>
			<td><?php echo $partenaire['cp']; ?></td>
			<td><?php echo $partenaire['description']; ?></td>
			<td><?php echo $partenaire['fichierLogo']; ?></td>
			<td><?php echo $partenaire['departement_id']; ?></td>
			<td><?php echo $partenaire['afficher']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'partenaires', 'action' => 'view', $partenaire['partenaire_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'partenaires', 'action' => 'edit', $partenaire['partenaire_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'partenaires', 'action' => 'delete', $partenaire['partenaire_id']), null, __('Are you sure you want to delete # %s?', $partenaire['partenaire_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Profils'); ?></h3>
	<?php if (!empty($defi['Profil'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Profil Id'); ?></th>
		<th><?php echo __('Profil'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Profil'] as $profil): ?>
		<tr>
			<td><?php echo $profil['profil_id']; ?></td>
			<td><?php echo $profil['profil']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'profils', 'action' => 'view', $profil['profil_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'profils', 'action' => 'edit', $profil['profil_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'profils', 'action' => 'delete', $profil['profil_id']), null, __('Are you sure you want to delete # %s?', $profil['profil_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Superviseurs'); ?></h3>
	<?php if (!empty($defi['Superviseur'])): ?>
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
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($defi['Superviseur'] as $superviseur): ?>
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
