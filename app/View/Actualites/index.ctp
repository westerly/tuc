

<div id="path"><?php echo $this->Html->link($this->Html->image('front/home.png', array('alt' => 'home')).' Accueil', $this->Html->url(array('controller'=>'accueil', 'action'=>'index')), array('escape'=>false)) ?>
</div>

<div class="news">
    <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
<?php echo 

foreach($actualites as $actu) { ?>
    <article>
        <h3><?php echo $actu['Actualite']['titre'] ?></h3>
        <div class="title"><?php echo $this->Time->format('l d F, H:i ', $actu['Actualite']['date_creation']); ?></div>
        <div class="content"><?php echo $actu['Actualite']['contenu']; ?></div>    
    </article>
    

<?php echo } ?>
     <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
</div>