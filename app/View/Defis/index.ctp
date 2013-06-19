<?php
echo $this->Html->script('ajax');
echo $this->Html->script('vote');
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
	    <?php if (isset($defi['Localisation']['lieu'])) {?>
	    <div style="float:right">
                <?php echo $defi['Localisation']['lieu'] ?>
              </div>
	    <?php }
	    if (isset($defi['Localisation']['horaire'])) { ?>
	    <div style="float:right">
                <?php echo $defi['Localisation']['horaire'];?>
              </div>
	      <?php 
	   }?> 
        </div>
        
        <div class="content">
            <?php echo $defi['Defi']['principe_orga']; ?>
            <?php echo $defi["Defi"]["valo_citoyenne"]; ?>
            <a href="<?php echo $this->Html->url(array('controller'=>'defis', 'action'=>'view', $defi['Defi']['id']), true) ?>" class="colorbox linked" style="text-align:right;display: block;margin-top: 25px;"><h2>Détails...</h2></a>
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
					?>
					<a href="<?php echo $this->Html->url(array('controller'=>'defis', 'action'=>'video', $photo), false) 
					     ?>" class="colorbox linked" style="text-align:right;display: block;margin-top: 25px;">
						<?php
						echo $this->Html->image('http://img.youtube.com/vi/'.$photo.'/0.jpg',  array('alt' => 'defis', 'width' => '200', 'height'=>'150'));
						?>
					</a>
					<?php
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
			echo $this->Html->link('+',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id']),array('onclick' => 'vote('.$defi['Defi']['id'].','.$ids[$nom]['id'].',0)'));
			echo ' (';
			if(!empty($defi['Vote'])) {
				echo $defi['Vote'][0]['Vvotecount']['pour'];
			} else {
				echo '0';
			}
			echo ')';
		    ?>
		</span>
		<span> / </span>
                    <span>
		    <?php 
			echo $this->Html->link('-',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id']),array('onclick' => 'vote('.$defi['Defi']['id'].','.$ids[$nom]['id'].',1)'));
			echo ' (';
			if(!empty($defi['Vote'])) {
				echo $defi['Vote'][0]['Vvotecount']['contre'];
			} else {
				echo '0';
			}
			echo ')';
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
