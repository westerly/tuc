<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>


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
			<th class="actions"><?php echo __('Actions'); ?></th>
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


<div class="defis form">

<br/>
<br/>
<?php echo $this->Form->create('Defi'); ?>
	<fieldset>
		<legend><?php echo __('Edition du défi'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('demandeur');
		echo $this->Form->input('horaire');
		echo $this->Form->input('ip_demandeur');
		echo $this->Form->input('nature');
		echo $this->Form->input('localisation_id');
		echo $this->Form->input('nbr_etu');
		echo $this->Form->input('principe_orga');
		echo $this->Form->input('orga_equipe_projet');
		echo $this->Form->input('precautions');
		echo $this->Form->input('resultats');
		echo $this->Form->input('valo_citoyenne');
		echo $this->Form->input('valo_media');
		echo $this->Form->input('etapes');
		echo $this->Form->input('commentaires');
		echo $this->Form->input('date_soumission');
		echo $this->Form->input('afficher');
		
		// Affichage des photos
		
		?>

	<?php
		
		echo $this->Form->input('Association');
		echo $this->Form->input('Entite');
		echo $this->Form->input('Materiel');
		echo $this->Form->input('Partenaire');
		echo $this->Form->input('Profil');
		echo $this->Form->input('Superviseur');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>

