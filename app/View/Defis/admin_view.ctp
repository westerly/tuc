<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>

<div class="defis view">
<h2><?php  echo __('Défi'); ?></h2>
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
		<dt><?php echo __('Adresse IP du demandeur'); ?></dt>
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
		<dt><?php echo __('Nombre d\'étudiants'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['nbr_etu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Principe et organisation'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['principe_orga']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organisation équipe projet'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['orga_equipe_projet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Précautions'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['precautions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Résultats'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['resultats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valorisation citoyenne'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['valo_citoyenne']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valorisation médiatique'); ?></dt>
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
		<dt><?php echo __('Date de soumission'); ?></dt>
		<dd>
			<?php echo h($defi['Defi']['date_soumission']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Afficher le défi'); ?></dt>
		<dd>
			<?php 
			
			  if(h($defi['Defi']['afficher'] == '1')){
			  	echo "Oui";
			  }else{
			  	echo "Non";
			  }
			
			?>
			&nbsp;
		</dd>
	</dl>
</div>


<?php if(isset($photos) && count($photos) != 0){ ?>

<div class="related">
	<h3><?php echo __('Photos associées'); ?></h3>
	<?php if (!empty($defi['Photo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('chemin_fichier'); ?></th>
			<th><?php echo "Photo" ?></th>
			<th><?php echo $this->Paginator->sort('afficher'); ?></th>
			<th><?php echo $this->Paginator->sort('clan_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_upload'); ?></th>
			<th ></th>
	</tr>
	<?php
		$i = 0;
		foreach ($photos as $photo): ?>
		<tr>
			<td><?php echo $photo['Photo']['id']; ?></td>
			<td><?php echo $photo['Photo']['chemin_fichier']; ?></td>
			    
			 <td> <?php
			 	
			 	if (!strpos($photo['Photo']['chemin_fichier'],'.')) {
					// Video
					echo'
					<iframe id="my_video_'.$photo['Photo']['id'].'" class="video-js vjs-default-skin videoIndex"
						width="500" height="264"
						src="http://www.youtube.com/embed/'.$photo['Photo']['chemin_fichier'].'">
					</iframe>';	
			 	} else {
			 		echo $this->Html->link(
									    $this->Html->image($photo['Photo']['chemin_fichier'],  array("class" => "index")),
									    '/' . IMAGES_URL .$photo['Photo']['chemin_fichier'],
									    array('escape' => false, 'class'=>'colorbox')
					);
			 	}
				?> </td>
			
			
			<td><?php if($photo['Photo']['afficher'] == 1){ echo "Oui";}else{echo "Non";} ?>&nbsp;</td>
			
			<td><?php echo $this->Html->link($photo['Clan']['nom'], array('controller' => 'clans', 'action' => 'view', $photo['Clan']['id'])); ?></td>
			<td><?php echo h($photo['Photo']['date_upload']); ?>&nbsp;</td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'photos', 'action' => 'view', $photo['Photo']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photos', 'action' => 'delete', $photo['Photo']['id']), null, __('Voulez vous vraiment supprimer cette photo/vidéo?')); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} sur {:pages}, montrant {:current} enregistrements sur un total de {:count}, commence à {:start}, finit à {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Précédent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>

</div>

<?php } ?>

<br/>
<br/>

<?php if (!empty($defi['Association']) && count($defi['Association']) != 0 ){ ?>
<div class="related">
<br/>
<br/>
	<h3><?php echo __('Associations liées:'); ?></h3>
	<?php if (!empty($defi['Association'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Association Id'); ?></th>
		<th><?php echo __('Association'); ?></th>
		<th ></th>
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

</div>

<?php } ?>


<?php if (!empty($defi['Entite']) && count($defi['Entite']) != 0 ){ ?>
<div class="related">
	<h3><?php echo __('Entités liées:'); ?></h3>
	<?php if (!empty($defi['Entite'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Entite Id'); ?></th>
		<th><?php echo __('Entite'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th ></th>
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


</div>

<?php } ?>

<?php if (!empty($defi['Materiel']) && count($defi['Materiel']) != 0 ){ ?>
<div class="related">
	<h3><?php echo __('Materiels liés:'); ?></h3>
	<?php if (!empty($defi['Materiel'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Materiel Id'); ?></th>
		<th><?php echo __('Materiel'); ?></th>
		<th ></th>
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

</div>

<?php } ?>
<?php if (!empty($defi['Partenaire']) && count($defi['Partenaire']) != 0 ){ ?>
<div class="related">
	<h3><?php echo __('Partenaires liés:'); ?></h3>
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
		<th ></th>
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

</div>

<?php } ?>
<?php if (!empty($defi['Profil']) && count($defi['Profil']) != 0 ){ ?>
<div class="related">
	<h3><?php echo __('Profils liés:'); ?></h3>
	<?php if (!empty($defi['Profil'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Profil Id'); ?></th>
		<th><?php echo __('Profil'); ?></th>
		<th ></th>
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

</div>

<?php } ?>
<?php if (!empty($defi['Superviseur']) && count($defi['Superviseur']) != 0 ){ ?>
<div class="related">
	<h3><?php echo __('Superviseurs liés:'); ?></h3>
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
		<th ></th>
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

</div>

<?php } ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<table>
	<tr>
		<td><?php echo $this->Html->link(__('Editer'), array('controller' => 'Defis', 'action' => 'edit', $defi['Defi']['id'])); ?></td>
		<td><a href="javascript:history.back()">Retour</a></td>
	</tr>
	</table>
</div>
