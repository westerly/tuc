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

                echo $this->fetch('css');
		echo $this->fetch('meta');
		echo $this->fetch('script');
	?>

	</head>
	<body>
		<header>
			<div id="admin"><?=  $this->Html->link('Espace Admin', $this->Html->url(
    array(
        'controller' => 'users', 
        'action' => 'login',
        'admin'=>true
    ), true
));
?></div>
	<?= $this->Html->image('front/logo.png', array('alt' => 'logo', 'height'=>266, 'width'=>348, 'id'=>'logo')); ?>
		</header>
		<nav>
			<ul>
				<?= $this->Html->link('<li>news</li>', $this->Html->url(array('controller'=>'actualites', 'action'=>'index')), array('escape'=>false)) ?>
				<?= $this->Html->link('<li>défis</li>', $this->Html->url(array('controller'=>'defis', 'action'=>'index')), array('escape'=>false)) ?>
                                <a><li>galerie</li></a>
				<?= $this->Html->link('<li>partenaires</li>', $this->Html->url(array('controller'=>'partenaires', 'action'=>'index')), array('escape'=>false)) ?>
                                <a><li>contact</li></a>
			</ul>		
		</nav>

		<section class="accueil">
			
                                    <?= $this->fetch('content') ?>
		</section>
		
		
		<footer>
		
		
		
		</footer>
		
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
         <?= $this->Html->script('jquery.slides.min'); ?>
         <?= $this->Html->script('front'); ?>

	</body>

</html>
