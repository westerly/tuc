    <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>

<div class="liste-photos">
<?php

	foreach($photos as $part) {
           ?>
    <div class="photos">
        <?php 
        $photo = $part['Photo']['chemin_fichier'];
        if(!strpos($photo,'.')) {
                                    echo '
                                    <iframe class="video-js vjs-default-skin videoIndex"
                                            width="220" height="170" alt="defis"
                                            src="http://www.youtube.com/embed/'.$photo.'">
                                    </iframe>';

                            } else {
                                    echo $this->Html->image($photo, array('alt' => 'defis_photo', 'width' => '250', 'height'=>'250'));
                            }
                            
                            echo '<span style="font-weight:bold">'.$part['Defi']['nom'].'</span>';
                            ?>
    </div>
    
            <?php
        }


?>

</div>