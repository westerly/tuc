<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('front');
		echo $this->Html->css('colorbox');
            
		echo $this->fetch('meta');
		echo $this->fetch('script');
	?>

	</head>
	<body>
		<header>
			<div id="admin"><?php echo  $this->Html->link('Espace Admin', $this->Html->url(
    array(
        'controller' => 'users', 
        'action' => 'login',
        'admin'=>true
    ), true
));
?></div>
	<?php echo $this->Html->link($this->Html->image('front/logo.png', array('alt' => 'logo', 'height'=>266, 'width'=>348, 'id'=>'logo')), $this->Html->url(array('controller'=>'accueil', 'action'=>'index','admin'=>false), true), array('escape'=>false)); ?>
                    <div id="infos">BDE UTC Tous Unis pour la Cité<br/>
                                    Bât E300<br/>
                                    Rue Roger Couttolenc - BP 60301<br/>
                                    60203 Compiègne Cedex<br/>
                                    <br/>
                                    N° SIRET : 39777672500012<br/>
                    </div>
                </header>
                
           
		<nav>
			<ul>
				<li><?php echo $this->Html->link('News', $this->Html->url(array('controller'=>'actualites', 'action'=>'index','admin'=>false), true), array('escape'=>false)) ?></li>
                                <li><?php echo $this->Html->link('Défis', $this->Html->url(array('controller'=>'defis', 'action'=>'index','admin'=>false), true), array('escape'=>false)) ?></li>
				<li><?php echo $this->Html->link('Galerie', $this->Html->url(array('controller'=>'photos', 'action'=>'index','admin'=>false), true), array('escape'=>false)) ?>
                                    <ul>
                                        <?php 
                                        foreach($clans_menu as $key => $clan) {
                                        ?>
                                        <li><?php echo $this->Html->link($clan, $this->Html->url(array('controller'=>'photos', 'action'=>'index','admin'=>false, $key), true), array('escape'=>false)) ?></li>
                                        
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                
                                
                                </li>
				<li><?php echo $this->Html->link('Partenaires', $this->Html->url(array('controller'=>'partenaires', 'action'=>'index','admin'=>false), true), array('escape'=>false)) ?>
                                    <ul>
                                        <li><?php echo $this->Html->link('S\'inscrire', $this->Html->url(array('controller'=>'partenaires', 'action'=>'add','admin'=>false), true), array('escape'=>false)) ?></li>
                                        
                                    </ul>
                                </li>
				<li><?php echo $this->Html->link('Contact', $this->Html->url(array('controller'=>'contacts', 'action'=>'index','admin'=>false), true), array('escape'=>false)) ?></li>
			</ul>		
		</nav>
		<section class="accueil">
			
                    <div id="path">
                        <?php echo $this->Html->link($this->Html->image('front/home.png', array('alt' => 'home')).' Accueil', $this->Html->url(array('controller'=>'accueil', 'action'=>'index'), true), array('escape'=>false)) ?>
                    </div>
                                    
                        <?php echo $this->fetch('content') ?>
		</section>
		
		
		<footer>
                    <table style="width: 100%">
                        <tr>
                            <td><?php echo $this->Html->image('front/utc.jpg', array('alt' => 'utc', 'height'=>50, 'width'=>150, 'id'=>'utc')); ?></td>
                            <td><?php echo $this->Html->image('front/logo.png', array('alt' => 'utc', 'height'=>50, 'width'=>50, 'id'=>'tuc')); ?></td>
                            <td style="font-size: 2em;" class="titre-mission"><span>T</span><span>o</span><span>u</span><span>s</span> <span>U</span><span>n</span><span>i</span><span>s</span> <span>p</span><span>o</span><span>u</span><span>r</span> <span>l</span><span>a</span><span> </span><span>C</span><span>i</span><span>t</span><span>é</span><span>!</span></td>
                            <td><?php echo  $this->Html->link('Contact', 'mailto:tuc@assos.utc.fr')?></td>             
                            <td><?php echo $this->Html->link($this->Html->image('front/facebook.jpg', array('alt' => 'facebook', 'height'=>65, 'width'=>65, 'id'=>'facebook')), 'https://www.facebook.com/tuc.utc', array('escape'=>false)); ?></td>
                        </tr>
                    </table>
                </footer>
		
         <?php echo $this->Html->script('jquery-latest.min'); ?>
         <?php echo $this->Html->script('jquery.slides.min'); ?>
         <?php echo $this->Html->script('jquery.colorbox-min'); ?>
         <?php echo $this->Html->script('jquery.carouFredSel-6.2.1-packed'); ?>

         <?php echo $this->Html->script('front'); ?>

	</body>

</html>
