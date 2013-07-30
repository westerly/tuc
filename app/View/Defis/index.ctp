<?php
echo $this->Html->script('ajax');
echo $this->Html->script('vote',array('charset'=>'utf8'));
echo $this->Html->script('popupYoutube');
?>
<section id="defis">
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
            <a href="<?php echo $this->Html->url(array('controller'=>'defis', 'action'=>'view', $defi['Defi']['id']), true) ?>" class="colorbox linked" style="text-align:right;display: block;margin-top: 25px;"><h2>Détails...</h2></a>
            <div class="liste-defis">
            <?php
            $clans = array();
            $ids = array();
            foreach($defi['Photo'] as $photo) {
                $clans[$photo['Clan']['nom']][] = $photo['Photo']['chemin_fichier'];
                $ids[$photo['Clan']['nom']]['id'] = $photo['Clan']['id'];
            }
	    $votes = array();
	    foreach($defi['Vote'] as $vvc) {
		$vvc = $vvc['Vvotecount'];
		$votes[$vvc['defi_id']][$vvc['clan_id']] = array('pour' => $vvc['pour'], 'contre' => $vvc['contre']);
	    }
	    
            foreach($clans as $nom => $clan) {
                $i++;
            ?>   
                <h4><?php echo 'Photo(s) de '.$nom ?></h4>
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
		    <?php
		    
			echo '<a href="javascript:vote('.$defi['Defi']['id'].', '.$ids[$nom]['id'].', 0)">';
			echo $this->Html->image('up_s.png',  array('alt' => 'voter pour !', 'width' => '10', 'height'=>'15'));
			echo '</a>';
			echo ' <span id="count_pour_'.$defi['Defi']['id'].'_'.$ids[$nom]['id'].'">(';
			if(isset($votes[$defi['Defi']['id']][$ids[$nom]['id']]['pour'])) {
				echo $votes[$defi['Defi']['id']][$ids[$nom]['id']]['pour'];
			} else {
				echo '0';
			}
			echo ')</span>';
		    ?>
		<span>/</span>
		    <?php
			echo '<a href="javascript:vote('.$defi['Defi']['id'].', '.$ids[$nom]['id'].', 1)">';
			echo $this->Html->image('down_s.png',  array('alt' => 'voter pour !', 'width' => '10', 'height'=>'15'));
			echo '</a>';
			echo ' <span id="count_contre_'.$defi['Defi']['id'].'_'.$ids[$nom]['id'].'">(';
			if(isset($votes[$defi['Defi']['id']][$ids[$nom]['id']]['contre'])) {
				echo $votes[$defi['Defi']['id']][$ids[$nom]['id']]['contre'];
			} else {
				echo '0';
			}
			echo ')</span>';
		    ?>

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