<?php
//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');
?>


<div class="liste-partenaires">
<?php

	foreach($partenaires as $part) {
           ?>
    <div class="partenaires">
        <?php echo $this->Html->image($part['Partenaire']['fichierLogo'], array('width'=>'250', 'height'=>'250','alt'=>$part['Partenaire']['partenaire'],'pop'=>$this->Html->url(array('controller'=>'partenaires', 'action'=>'view', $part['Partenaire']['partenaire_id']), true))) ?>
    </div>
    
            <?php
        }


?>

</div>