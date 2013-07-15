<?php $this->set('title_for_layout',"News"); ?>
    <section id="news">
      <?php foreach ($actualites as $k => $v): ?>
        <article>
            <h3><?php echo $this->Html->link($v['Actualite']['titre'],array('controller' => 'actualites','action'=>'show','id'=>$v['Actualite']['id'], 'admin' => false, 'full_base' => true),array('class' => "colorbox linked")); ?>
                <span class="muted"><div class="icon-horloge"></div><?php echo $this->Date->french($v['Actualite']['date_creation']); ?></span>
            </h3>
            <div class="content">
               
                <p>
                  <?php echo $this->Text->truncate(strip_tags($v['Actualite']['contenu']), 250); ?>
                </p>
                <p><a href="<?php echo $this->Html->url(array('controller'=>'actualites', 'action'=>'view', $v['Actualite']['id']), true) ?>" class="colorbox linked">Lire la suite</a></p>
            </div>
            
        </article>
      
        <div class="clear"></div>
      <?php endforeach ?>
      <?php echo $this->Paginator->numbers(); ?>
    </section>