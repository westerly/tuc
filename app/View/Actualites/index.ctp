

<div id="path"><?= $this->Html->link($this->Html->image('front/home.png', array('alt' => 'home')).' Accueil', $this->Html->url(array('controller'=>'accueil', 'action'=>'index')), array('escape'=>false)) ?>
</div>

<div class="news">
    <div class="paginator">
<?= $this->paginator->numbers(); ?>
    </div>
<?php 

foreach($actualites as $actu) { ?>
    <article>
        <h3><?= $actu['Actualite']['titre'] ?></h3>
        <div class="title"><?= $this->Time->format('l d F, H:i ', $actu['Actualite']['date_creation']); ?></div>
        <div class="content"><?= $actu['Actualite']['contenu']; ?></div>    
    </article>
    

<?php } ?>
     <div class="paginator">
<?= $this->paginator->numbers(); ?>
    </div>
</div>