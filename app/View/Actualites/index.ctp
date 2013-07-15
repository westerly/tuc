<?php $this->set('title_for_layout',"News"); ?>
    <section id="news">
        debug($actualites);
      <?php foreach ($actualites as $k => $v): ?>
        <article>
            <h3><?php echo $this->Html->link($v['Actualite']['titre'],array('controller' => 'actualites','action'=>'show','id'=>$v['Actualite']['id'],'slug'=>$v['Actualite']['titre'], 'admin' => false, 'full_base' => true)); ?>
                <span class="muted"><div class="icon-horloge"></div><?php echo $this->Date->french($v['Actualite']['date_creation']); ?></span>
            </h3>
            <div class="content">
               
                <p>
                  <?php echo $this->Text->truncate(strip_tags($v['Actualite']['contenu']), 250); ?>
                </p>
            </div>
            
        </article>
      <?php endforeach ?>
      <div class="clear"></div>
      <?php echo $this->Paginator->numbers(); ?>
    </section>