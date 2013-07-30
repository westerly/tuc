<?php
  $this->set('title_for_layout',"Page d'accueil");
?>
<div class="span5">
    <p><?php echo $this->Html->image('leprojet.png', array('alt'=>"Le Projet", 'class'=>"aligncenter")); ?></p>
</div>
<div class="span7 omega">
    <article>
        <?php echo $this->element('presentation'); ?>
    </article>
</div>
<div class="span5">
    <p><?php echo $this->Html->image('habetu.png', array('alt'=>"Un étudiant et un habitant", 'class'=>"aligncenter")); ?></p>
</div>
<div class="span7 omega">
    <p><?php echo $this->Html->image('contact.png', array('alt'=>"Nous contacter", 'class'=>"aligncenter")); ?></p>
</div>
<div>
    <div id="slider">
        <iframe width="826" height="510" src="//www.youtube.com/embed/IEfdFNXlWmk" frameborder="0" allowfullscreen></iframe>
        <iframe width="826" height="510" src="//www.youtube.com/embed/y5gH2vpH3xQ" frameborder="0" allowfullscreen></iframe>
        <iframe width="826" height="510" src="//www.youtube.com/embed/e0yOLmkhZHM" frameborder="0" allowfullscreen></iframe>
        <iframe width="826" height="510" src="//www.youtube.com/embed/EFu4kS374QM" frameborder="0" allowfullscreen></iframe>
        <iframe width="826" height="510" src="//www.youtube.com/embed/X6eEEIjqIBs" frameborder="0" allowfullscreen></iframe>
        <iframe width="826" height="510" src="//www.youtube.com/embed/1cPK8Um1RMA" frameborder="0" allowfullscreen></iframe>
        <iframe width="826" height="510" src="//www.youtube.com/embed/4sCaprkpm0g" frameborder="0" allowfullscreen></iframe>
        <iframe width="826" height="510" src="//www.youtube.com/embed/jN30nloBHPk" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="clear"></div>
</div>