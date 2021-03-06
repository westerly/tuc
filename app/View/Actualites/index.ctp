<?php $this->set('title_for_layout',"News"); ?>
    <section id="news">
      <?php foreach ($actualites as $k => $v): ?>
        <article>
            <h3><?php echo $this->Html->link($v['Actualite']['titre'],array('controller' => 'actualites','action'=>'view',$v['Actualite']['id'], true, 'admin' => false, 'full_base' => true),array('class'=>"colorbox linked")); ?>
                <span class="muted"><div class="icon-horloge"></div><?php echo $this->Date->french($v['Actualite']['date_creation']); ?></span>
            </h3>
            <div class="content">
               
                <p>
                  <?php echo $v['Actualite']['contenu']; ?>
                </p>
            </div>
            <aside>
                <?php echo $this->Html->link("Lire la suite",array('controller' => 'actualites','action'=>'view',$v['Actualite']['id'], true, 'admin' => false, 'full_base' => true),array('class'=>"colorbox linked btn btn-primary")); ?>
            </aside>
        </article>
      <?php endforeach ?>
      <div class="clear"></div>
      <?php echo $this->Paginator->numbers(); ?>
    </section>