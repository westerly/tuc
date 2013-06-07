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
	<?php echo $this->Html->link($this->Html->image('front/logo.png', array('alt' => 'logo', 'height'=>266, 'width'=>348, 'id'=>'logo')), $this->Html->url(array('controller'=>'accueil', 'action'=>'index'), true), array('escape'=>false)); ?>
		</header>
		<nav>
			<ul>
				<?php echo $this->Html->link('<li>News</li>', $this->Html->url(array('controller'=>'actualites', 'action'=>'index'), true), array('escape'=>false)) ?>
				<?php echo $this->Html->link('<li>Défis</li>', $this->Html->url(array('controller'=>'defis', 'action'=>'index'), true), array('escape'=>false)) ?>
				<?php echo $this->Html->link('<li>Galerie</li>', $this->Html->url(array('controller'=>'photos', 'action'=>'index'), true), array('escape'=>false)) ?>
				<?php echo $this->Html->link('<li>Partenaires</li>', $this->Html->url(array('controller'=>'partenaires', 'action'=>'index'), true), array('escape'=>false)) ?>
				<?php echo $this->Html->link('<li>Contact</li>', $this->Html->url(array('controller'=>'contacts', 'action'=>'index'), true), array('escape'=>false)) ?>
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
                            <td style="font-size: 2em;" class="titre-mission"><span>T</span><span>o</span><span>u</span><span>s</span> <span>U</span><span>n</span><span>i</span><span>s</span> <span>p</span><span>o</span><span>u</span><span>r</span> <span>C</span><span>o</span><span>m</span><span>p</span><span>i</span><span>è</span><span>g</span><span>n</span><span>e</span><span>!</span></td>
                            <td><?php echo  $this->Html->link('Contact', 'mailto:tuc@assos.utc.fr')?></td>             
                            <td><?php echo $this->Html->link($this->Html->image('front/facebook.jpg', array('alt' => 'facebook', 'height'=>65, 'width'=>65, 'id'=>'facebook')), 'https://www.facebook.com/tuc.utc', array('escape'=>false)); ?></td>
                        </tr>
                    </table>
                </footer>
		
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
         <?php echo $this->Html->script('jquery.slides.min'); ?>
         <?php echo $this->Html->script('jquery.colorbox-min'); ?>
         <?php echo $this->Html->script('jquery.carouFredSel-6.2.1-packed'); ?>

         <?php echo $this->Html->script('front'); ?>

	</body>

</html>
