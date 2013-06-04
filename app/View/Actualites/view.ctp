<article>
        <h3><?php echo $actualite['Actualite']['titre'] ?></h3>
        <div class="title"><?php echo $this->Time->format('l d F, H:i ', $actualite['Actualite']['date_creation']); ?></div>
        <a href="<?php echo $this->Html->url(array('controller'=>'actualites', 'action'=>'view', $actualite['Actualite']['id']), true) ?>" class="colorbox linked"><div class="content"><?php echo $actualite['Actualite']['contenu'] ?></div></a>
</article>