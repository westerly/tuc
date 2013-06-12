<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>
	<div class="photos index">

	
	<h2><?php echo __('Photos et vidéos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('chemin_fichier'); ?></th>
			<th><?php echo "Photo/Vidéo" ?></th>
			<th><?php echo $this->Paginator->sort('afficher'); ?></th>
			<th><?php echo $this->Paginator->sort('clan_id'); ?></th>
			<th><?php echo $this->Paginator->sort('defi_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_upload'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($photos as $photo): ?>
	<tr>
		<td><?php echo h($photo['Photo']['id']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['chemin_fichier']); ?>&nbsp;</td>
		<td>
		<?php 
		
			if(!strpos($photo['Photo']['chemin_fichier'],'.')){	
				// Video
				echo'
				<iframe id="my_video_'.$photo['Photo']['id'].'" class="video-js vjs-default-skin videoIndex"
					width="500" height="264"
					src="http://www.youtube.com/embed/'.$photo['Photo']['chemin_fichier'].'">
				</iframe>';						     
				
			}else{
				//echo $this->Html->link($this->Html->image($photo['Photo']['chemin_fichier'], array('class' => 'index', 'alt' => false)), URL_IMG.$photo['Photo']['chemin_fichier'], array('class' => 'top_up', 'escape' => false));
				echo $this->Html->link(
									    $this->Html->image($photo['Photo']['chemin_fichier'],  array('alt' => 'defis', 'width' => '200', 'height'=>'150')),
									    '/' . IMAGES_URL .$photo['Photo']['chemin_fichier'],
									    array('escape' => false, 'class'=>'colorbox')
				);
			}
									
		?>&nbsp;</td>
		<td><?php if($photo['Photo']['afficher']==1){echo "Oui";}else{echo "Non";}?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($photo['Clan']['nom'], array('controller' => 'clans', 'action' => 'view', $photo['Clan']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($photo['Defi']['nom'], array('controller' => 'defis', 'action' => 'view', $photo['Defi']['id'])); ?>
		</td>
		<td><?php echo h($photo['Photo']['date_upload']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Détails'), array('action' => 'view', $photo['Photo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $photo['Photo']['id']), null, __('Voulez vous vraiment supprimer cette photo/vidéo?')); ?>
			<?php 
				if($photo['Photo']['afficher']==1){
					echo $this->Form->postLink(__('Ne plus afficher'), array('action' => 'afficher', $photo['Photo']['id'], false), null, __('Supprimer l\'affichage du média dans la partie publique du site?')); 
				}else{
					echo $this->Form->postLink(__('Afficher'), array('action' => 'afficher', $photo['Photo']['id'], true), null, __('Afficher ce média dans la partie publique du site?')); 
				}
			
			?>
			
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
	
	<br/>
	<br/>
	
	<div class="actions widebutton">
		<?php echo $this->Html->link(__('Ajouter une photo'), array('action' => 'add')); ?>
	</div>
	<div class="actions widebutton">
		<?php echo $this->Html->link(__('Ajouter une vidéo'), array('action' => 'addv')); ?>
	</div>
</div>

