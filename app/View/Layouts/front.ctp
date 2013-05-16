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
				<li>news</li>
				<li>défis</li>
				<li>galerie</li>
				<li>partenaires</li>
				<li>contact</li>
			</ul>		
		</nav>

		<section>
			<div id="path"><a href="#">Accueil</a></div>
			
			<article>
				<h2>Le Projet TUC</h2>
				<p>
                                    <?= $this->fetch('content') ?>
				</p>
				<img src="accueil.jpg" alt="accueil" width="" height="" />
				
			
			</article>
			
			
			<article>
				<h2>Dernier Défi</h2>
				<h3>Rammasser les feuilles</h3>
				<p>Proposé par <span>Jean - Claude</span>
				<p>A <span>Compiègne</span></p>
				
				<div id="slider">
				
				
				</div>
			
			
			
			</article>
		
		
		</section>
		
		
		<footer>
		
		
		
		</footer>
		

	</body>

</html>
