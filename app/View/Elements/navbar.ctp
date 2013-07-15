                <ul class="navtabs visible-desktop">
                    <li class="navpill <?php echo ($this->request->params['controller'] == 'accueil') ? 'active': ''; ?> ">
                      <a href="<?php echo $this->Html->url(array('controller' => 'accueil', 'action' => 'index', 'full_base' => true, 'admin' => false)); ?>">
                        <div class="icon-home"></div>
                      </a>
                    </li>
                    <li <?php echo ($this->request->params['controller'] == 'actualites') ? 'class="active"': ""; ?>>
                      <?php echo $this->Html->link('News',array('controller' => 'actualites', 'action' => 'index', 'full_base' => true, 'admin' => false)); ?></li>

                    <li <?php echo ($this->request->params['controller'] == 'defis') ? 'class="active"': ""; ?>>
                      <?php echo $this->Html->link('Défis',array('controller' => 'defis', 'action' => 'index', 'full_base' => true, 'admin' => false)); ?></li>
                    <li <?php echo ($this->request->params['controller'] == 'photos') ? 'class="active"': ""; ?>>
                      <?php echo $this->Html->link('Galerie',array('controller' => 'photos', 'action' => 'index', 'full_base' => true, 'admin' => false)); ?>                          
                        <ul class="subnav">
                            <li><?php echo $this->Html->link("Varelbor",array('controller' => 'photos', 'action' => 'index', 1,'full_base' => true, 'admin' => false)) ?></li>
                            <li><?php echo $this->Html->link("Tampilaguul",array('controller' => 'photos', 'action' => 'index', 3, 'full_base' => true, 'admin' => false)) ?></li>
                            <li><?php echo $this->Html->link("Youarille",array('controller' => 'photos', 'action' => 'index', 4, 'full_base' => true, 'admin' => false)) ?></li>
                            <li><?php echo $this->Html->link("Klarf Binn",array('controller' => 'photos', 'action' => 'index', 5,'full_base' => true, 'admin' => false)) ?></li>
                        </ul>
                    </li>
                   <li <?php echo ($this->request->params['controller'] == 'partenaires') ? 'class="active"': ""; ?>>
                      <?php echo $this->Html->link('Partenaires',array('controller' => 'partenaires', 'action' => 'index', 'full_base' => true, 'admin' => false)); ?>                       
                        <ul class="subnav">
                            <li><?php echo $this->Html->link("S'inscrire",array('controller' => 'partenaires', 'action' => 'subscribe', 'full_base' => true, 'admin' => false)); ?></li>
                        </ul>
                    </li>
                   <li <?php echo ($this->request->params['controller'] == 'contacts') ? 'class="active"': ""; ?>>
                      <?php echo $this->Html->link('Contact',array('controller' => 'contacts', 'action' => 'index', 'full_base' => true, 'admin' => false)); ?></li>
                    <div class="clear"></div>
                </ul>