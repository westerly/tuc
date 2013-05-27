

<div id="path"><?php $this->Html->link($this->Html->image('front/home.png', array('alt' => 'home')).' Accueil', $this->Html->url(array('controller'=>'accueil', 'action'=>'index')), array('escape'=>false)) ?>
</div>

<div class="news">
    <div class="paginator">
<?php $this->paginator->numbers(); ?>
    </div>
<?php 

foreach($actualites as $actu) { ?>
    <article>
        <h3><?php $actu['Actualite']['titre'] ?></h3>
        <div class="title"><?php $this->Time->format('l d F, H:i ', $actu['Actualite']['date_creation']); ?></div>
        <div class="content"><?php $actu['Actualite']['contenu']; ?></div>    
    </article>
    

<?php } ?>
     <div class="paginator">
<?php $this->paginator->numbers(); ?>
    </div>
</div>