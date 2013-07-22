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
        <iframe width="500" height="400" src="//www.youtube.com/embed/IEfdFNXlWmk" frameborder="0" allowfullscreen></iframe>
        <?php echo $this->Html->image('front/band1.jpg', array('width'=>826, 'height'=>519)); ?>
        <?php echo $this->Html->image('front/band2.jpg', array('width'=>826, 'height'=>519)); ?>
        <?php echo $this->Html->image('front/band3.jpg', array('width'=>826, 'height'=>519)); ?>
    </div>
    <div class="clear"></div>
</div>