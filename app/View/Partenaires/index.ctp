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
    	<center>
        <?php echo $this->Html->image($part['Partenaire']['fichierLogo'], array('height'=>'250','alt'=>$part['Partenaire']['partenaire'],'pop'=>$this->Html->url(array('controller'=>'partenaires', 'action'=>'view', $part['Partenaire']['partenaire_id']), true))) ?>
    	</center>
    </div>
    
            <?php
        }


?>

</div>