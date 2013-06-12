<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		// Import de la librairie permettant les affichages photos en pop pup
		//echo '<script type="text/javascript" src="http://gettopup.com/releases/latest/top_up-min.js"></script>';
		
		//echo '<script type="text/javascript" src="'.$this->webroot.'app/webroot/top_up/javascripts/top_up-min.js"></script>';
		
		
		
		//echo $this->Html->script('jquery-1.4.3.min'); 
		//echo $this->Html->css('style');
		
		echo $this->Html->script('jquery-latest.min');
		echo $this->Html->script('jquery.colorbox-min');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('admin');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('colorbox');
		
		
	?>
	
</head>
<body>
	
		<div id="header">
			<?php
			if($adminCo)
			{
					echo'<div class="menu">';
							
							echo "<ul>";
								echo"<li>". $this->Html->link(__('Gérer les actualités'), array('controller' => 'actualites', 'action' => 'index','admin' => true))."</li>";
								echo"<li>". $this->Html->link(__('Gérer les défis'), array('controller' => 'defis', 'action' => 'index','index','admin' => true))."</li>";
								echo"<li>". $this->Html->link(__('Gérer les photos'), array('controller' => 'photos', 'action' => 'index', 'admin' => true)). "</li>";
								echo"<li>". $this->Html->link(__('Gérer les partenaires'), array('controller' => 'partenaires', 'action' => 'index', 'admin' => true))."</li>";
								echo"<li>". $this->Html->link(__('Gérer les utilisateurs'), array('controller' => 'users', 'action' => 'index', 'admin' => true))."</li>";
								echo"<li>". $this->Html->link(__('Déconnexion'), array('controller' => 'Users', 'action' => 'logout', 'admin' => true))."</li>";
							echo "</ul>";
							
					echo"</div>";
			}else{
			
				if($clanCo)
				{
					echo'<div class="menu">';
								
								echo "<ul>";
									echo"<li>". $this->Html->link(__('Déconnexion'), array('controller' => 'Users', 'action' => 'logout', 'admin' => true))."</li>";
								echo "</ul>";
								
					echo"</div>";
				}
			}
		?>
			
		</div>
		
		
		<div id="content">
		
		

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			
			<?php			
				
				
			
			?>
			
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
