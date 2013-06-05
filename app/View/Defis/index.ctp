

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
        
        <div class="content"><?php echo $defi['Defi']['nature']; ?></div>
        <div class="liste-defis">
        <?php
        $clans = array();
        $ids = array();
        foreach($defi['Photo'] as $photo) {
            $clans[$photo['Clan']['nom']][] = $photo['chemin_fichier'];
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
                ?>
                    <?php echo $this->Html->image($clan[0], array('alt' => 'defis', 'width' => '200', 'height'=>'150')) ?>
                
                <?php     }
                 
                ?>
                
                </div>
            
            <div class="clearfix"></div>
            <a class="prev" id="foo1_prev_<?php echo $i ?>" href="#"><span>prev</span></a>
            <a class="next" id="foo1_next_<?php echo $i ?>" href="#"><span>next</span></a>
            </div>
            <div class="vote-defis">
                <span><?php echo $this->Html->link('Bien !',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id'])) ?></span>
                <span><?php echo $this->Html->link('Pas Bien !',$this->Html->url('#'.$defi['Defi']['id'].'-'.$ids[$nom]['id'])) ?></span>
                
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
