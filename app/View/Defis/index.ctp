<?php
echo $this->Html->script('ajax');
echo $this->Html->script('vote');
echo $this->Html->script('popupYoutube');
?>
<div class="defis">
    <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
<?php 
$i = 0;
foreach($defis as $defi) { ?>
    <article>
        <div>
            <h3><?php echo $defi['Defi']['nom'] ?></h3>
            Proposé par <span style="font-weight: bold"><?php echo $defi['Defi']['demandeur'] ?></span>
            <div style="float:right">
                <?php echo $defi['Localisation']['lieu'] ?> <br/>
                 <?php echo $defi['Horaire']['horaire'] ?> 
            </div>
        </div>
        
        <div class="content">
            <?php echo $defi['Defi']['principe_orga']; ?>
            <a href="<?php echo $this->Html->url(array('controller'=>'defis', 'action'=>'view', $defi['Defi']['id']), true) ?>" class="colorbox linked" style="text-align:right;display: block;margin-top: 25px;">Détails...</a>
            <div class="liste-defis">
            <?php
            $clans = array();
            $ids = array();
            foreach($defi['Photo'] as $photo) {
                $clans[$photo['Clan']['nom']][] = $photo['Photo']['chemin_fichier'];
                $ids[$photo['Clan']['nom']]['id'] = $photo['Clan']['id'];
            }
		

		foreach($clans as $nom => $clan) {
		$i++;
		?>   
		<h4><?php echo $nom ?></h4>
		<div class="carroussel-defis" id="car_<?php echo $i ?>">
		    <div>
		    <?php
			foreach($clan as $photo) {
				if(!strpos($photo,'.')) {
					/*echo $this->Html->link(
						$this->Html->image('http://img.youtube.com/vi/'.$photo.'/0.jpg',  array('alt' => 'defis', 'width' => '200', 'height'=>'150')),
						null,
						array('id' => $photo, 'escape' => false, 'class'=>'youtube')
					);*/
					echo $this->Html->image('http://img.youtube.com/vi/'.$photo.'/0.jpg',  array('id' => $photo, 'class'=>'youtube', 'alt' => 'defis', 'width' => '200', 'height'=>'150'));
					/*echo '<iframe class="video-js vjs-default-skin videoIndex"
						width="220" height="170" alt="defis"
						src="http://www.youtube.com/embed/'.$photo.'"></iframe>';*/
				} else {
					echo $this->Html->link(
						$this->Html->image($photo,  array('alt' => 'defis', 'width' => '200', 'height'=>'150')),
						'/' . IMAGES_URL .$photo,
						array('escape' => false, 'class'=>'colorbox')
					);
				}
			}
			?>

		    </div>
                <?php if(count($clan) > 4) { ?>
                <span class="next" item="<?php echo count($clan) - 3; ?>" defis_id="<?php echo $i ?>"><span></span></span>
                <span class="prev" item="1" defis_id="<?php echo $i ?>"><span></span></span>
                <?php } ?>
                </div> 
                
                <div class="clearfix"></div>
                <div class="vote-defis">
                    <span>
		    <?php
			/*
			echo $this->Html->link('+',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id']),array('onclick' => 'vote('.$defi['Defi']['id'].','.$ids[$nom]['id'].',0)'));
			echo ' (';
			if(!empty($defi['Vote'])) {
				echo $defi['Vote'][0]['Vvotecount']['pour'];
			} else {
				echo '0';
			}
			echo ' )';
			*/
		    ?>
		</span>
		<span> / </span>
                    <span>
		    <?php 
			/*
			echo $this->Html->link('-',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id']),array('onclick' => 'vote('.$defi['Defi']['id'].','.$ids[$nom]['id'].',1)'));
			echo ' (';
			if(!empty($defi['Vote'])) {
				echo $defi['Vote'][0]['Vvotecount']['contre'];
			} else {
				echo '0';
			}
			echo ' )';
			*/
		    ?>
		</span>

                </div>
            </div>
            <?php }

            ?>
            
        </div>
    </article>
    

<?php  } ?>
     <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
</div>
