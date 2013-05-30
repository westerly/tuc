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
                echo $this->fetch('css');
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
	<?php echo $this->Html->image('front/logo.png', array('alt' => 'logo', 'height'=>266, 'width'=>348, 'id'=>'logo')); ?>
		</header>
		<nav>
			<ul>
				<?php echo $this->Html->link('<li>news</li>', $this->Html->url(array('controller'=>'actualites', 'action'=>'index'), true), array('escape'=>false)) ?>
				<?php echo $this->Html->link('<li>défis</li>', $this->Html->url(array('controller'=>'defis', 'action'=>'index'), true), array('escape'=>false)) ?>
                                <a><li>galerie</li></a>
				<?php echo $this->Html->link('<li>partenaires</li>', $this->Html->url(array('controller'=>'partenaires', 'action'=>'index'), true), array('escape'=>false)) ?>
                                <a><li>contact</li></a>
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
                            <td style="font-size: 2em;">Tous unis pour Compiègne</td>
                            <td><?php echo  $this->Html->link('Contact', 'mailto:integ@assos.utc.fr')?></td>             
                            <td><?php echo $this->Html->image('front/facebook.jpg', array('alt' => 'facebook', 'height'=>65, 'width'=>65, 'id'=>'facebook')); ?></td>
                        </tr>
                    </table>
                </footer>
		
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
         <?php echo $this->Html->script('jquery.slides.min'); ?>
         <?php echo $this->Html->script('jquery.colorbox-min'); ?>
         <?php echo $this->Html->script('front'); ?>

	</body>

</html>
