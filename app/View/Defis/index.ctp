

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
        
        <div class="content"><?php echo $defi['Defi']['principe_orga']; ?>
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
                                    echo '
                                    <iframe class="video-js vjs-default-skin videoIndex"
                                            width="220" height="170" alt="defis"
                                            src="http://www.youtube.com/embed/'.$photo.'">
                                    </iframe>';

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

                <div class="clearfix"></div>
             <!--   <a class="prev" id="foo1_prev_<?php echo $i ?>" href="#"><span>prev</span></a>
                <a class="next" id="foo1_next_<?php echo $i ?>" href="#"><span>next</span></a>
                </div> -->
                <div class="vote-defis">
                    <span><?php echo $this->Html->link('Bien !',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id'])) ?></span>
                    <span><?php echo $this->Html->link('Pas Bien !',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id'])) ?></span>

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
