<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>


<?php if(count($photos) != 0){ ?>

<div class="photos index">
	<h2><?php echo __('Photos associées'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('chemin_fichier'); ?></th>
			<th><?php echo "Photo" ?></th>
			<th><?php echo $this->Paginator->sort('afficher'); ?></th>
			<th><?php echo $this->Paginator->sort('clan_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_upload'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($photos as $photo): ?>
	<tr>
		<td><?php echo h($photo['Photo']['id']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['chemin_fichier']); ?>&nbsp;</td>
		<td>
		<?php 
						
			  echo "<a href='".URL_IMG.$photo['Photo']['chemin_fichier']."' class='top_up'><img class='index' src='".URL_IMG.$photo['Photo']['chemin_fichier']."'/></a>";
			
		?>&nbsp;</td>
		<td><?php if($photo['Photo']['afficher'] == 1){ echo "Oui";}else{echo "Non";} ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($photo['Clan']['nom'], array('controller' => 'clans', 'action' => 'view', $photo['Clan']['id'])); ?>
		</td>
		<td><?php echo h($photo['Photo']['date_upload']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'photos', 'action' => 'view', $photo['Photo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photos', 'action' => 'delete', $photo['Photo']['id']), null, __('Voulez vous vraiment supprimer cette photo?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table> 	 	
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
</div>

<?php } ?>

<div class="defis form">

<br/>
<br/>
<?php echo $this->Form->create('Defi'); ?>
	<fieldset>
		<legend><?php echo __('Edition du défi'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom', array('label'=> 'Nom'));
		echo $this->Form->input('demandeur');
		echo $this->Form->input('afficher', array('label'=> 'Afficher le défi'));
		echo $this->Form->input('horaire');
		echo $this->Form->input('ip_demandeur', array('label'=> 'Adresse IP du demandeur'));
		echo $this->Form->input('nature');
		echo $this->Form->input('localisation_id');
		echo $this->Form->input('nbr_etu', array('label'=> 'Nombre d\'étudiants'));
		echo $this->Form->input('principe_orga', array('label'=> 'Principe d\'organisation'));
		echo $this->Form->input('orga_equipe_projet', array('label'=> 'Organisation équipe projet'));
		echo $this->Form->input('precautions', array('label'=> 'Précautions'));
		echo $this->Form->input('resultats', array('label'=> 'Résultats'));
		echo $this->Form->input('valo_citoyenne', array('label'=> 'Valorisation citoyenne'));
		echo $this->Form->input('valo_media', array('label'=> 'Valorisation médiatique'));
		echo $this->Form->input('etapes', array('label'=> 'Les étapes'));
		echo $this->Form->input('commentaires');
		echo $this->Form->input('date_soumission', array('label'=> 'Date de soumission'));
		echo $this->Form->input('Association', array('label'=> 'Associations liées'));
		echo $this->Form->input('Clan',array('label'=> 'Clans liés'));
		echo $this->Form->input('Entite', array('label'=> 'Entités liées'));
		echo $this->Form->input('Materiel', array('label'=> 'Matériel nécessaire'));
		echo $this->Form->input('Partenaire', array('label'=> 'Partenaires'));
		echo $this->Form->input('Profil', array('label'=> 'Profils'));
		echo $this->Form->input('Superviseur', array('label'=> 'Superviseurs'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>

