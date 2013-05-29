<?php

function limit_sentence($string, $size) {
    if(strlen($string) > $size)
        $string = substr($string, 0, $size).'...';
    
    return $string;
}

?>

<div id="path"><?php echo $this->Html->link($this->Html->image('front/home.png', array('alt' => 'home')).' Accueil', $this->Html->url(array('controller'=>'accueil', 'action'=>'index')), array('escape'=>false)) ?>
</div>

<div class="news">
    <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
<?php 

foreach($actualites as $actu) { ?>
    <article>
        <h3><?php echo $actu['Actualite']['titre'] ?></h3>
        <div class="title"><?php echo $this->Time->format('l d F, H:i ', $actu['Actualite']['date_creation']); ?></div>
        <a href="<?php echo $this->Html->url(array('controller'=>'actualites', 'action'=>'view', $actu['Actualite']['id']), true) ?>" class="colorbox"><div class="content"><?php echo limit_sentence($actu['Actualite']['contenu'], 200); ?></div></a>
    </article>
    

<?php  } ?>
     <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
</div>