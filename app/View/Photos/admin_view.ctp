<div class="photos view">
<h2><?php  echo __('Photo/Vidéo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom Fichier'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['chemin_fichier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo/Vidéo'); ?></dt>
		<dd>
			 <?php  
			 			 	
			 	$extension = strtolower(strrchr($photo["Photo"]['chemin_fichier'], '.'));
			 				 	
			 	if(in_array($extension,$this->Upload->getFormatsVideoAccepted())){
			 		 	echo'
						<video id="my_video_'.$photo['Photo']['id'].'" class="video-js vjs-default-skin videoIndex" controls
							 preload="auto" width="620" height="264"
							 data-setup="{}">
							 <source src="'.URL_IMG.$photo['Photo']['chemin_fichier'].'" type=\'video/mp4\'>
						</video>';
			 	}else{
			 		//echo "<a href='".URL_IMG.$photo['Photo']['chemin_fichier']."' class='top_up'><img class='view' src='".URL_IMG.$photo['Photo']['chemin_fichier']."'/></a>";
			 		echo $this->Html->link($this->Html->image($photo['Photo']['chemin_fichier'], array('alt' => false)), URL_IMG.$photo['Photo']['chemin_fichier'], array('class' => 'top_up', 'escape' => false));
			 	}

			 ?> 
			&nbsp;
		</dd>
		<dt><?php echo __('Afficher'); ?></dt>
		<dd>
			<?php if($photo['Photo']['afficher']==1){echo "Oui";}else{echo "Non";} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clan'); ?></dt>
		<dd>
			<?php echo $this->Html->link($photo['Clan']['nom'], array('controller' => 'clans', 'action' => 'view', $photo['Clan']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($photo['Defi']['nom'], array('controller' => 'defis', 'action' => 'view', $photo['Defi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Upload'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['date_upload']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
