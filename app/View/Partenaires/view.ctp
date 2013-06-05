<?php
	echo $this->Html->image($partenaire['Partenaire']['fichierLogo']);
?>

<ul>
    <li><?php echo $partenaire['Partenaire']['partenaire'] ?></li>
    <li><?php echo $partenaire['Partenaire']['description'] ?></li>    
    <li><?php echo $partenaire['Partenaire']['adresse'] ?></li>    
    <li><?php echo $partenaire['Partenaire']['ville'] ?></li>    
    <li><?php echo $partenaire['Partenaire']['email'] ?></li>    
</ul>