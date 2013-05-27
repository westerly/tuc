
	 
	<div id="path"><?php echo $this->Html->link($this->Html->image('front/home.png', array('alt' => 'home')).' Accueil', $this->Html->url(array('controller'=>'accueil', 'action'=>'index')), array('escape'=>false)) ?>
</div>
			
			<article class="content-accueil">
				<h2>Le Projet TUC</h2>
                                <?php echo $this->Html->image('front/accueil.jpg', array('alt'=>'accueil', 'width'=> 470, 'height'=>350)); ?>
                                
                                <p>
                                    Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d'entre elles a été altérée par l'addition d'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu'il n'y a rien d'embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d'humour.
				</p>
				
				
			
			</article>
			
			
			<article class="liste-defis">
				<h2>Dernier Défi</h2>
				<h3>Rammasser les feuilles</h3>
				<p>Proposé par <span style="font-weight: bold">Jean - Claude</span>
				<p class="ville">A <span style="font-weight: bold">Compiègne</span></p>
				
				<div id="slider">
				
                                    <?php echo $this->Html->image('front/band1.jpg', array('width'=>1004, 'height'=>290)); ?>
                                    <?php echo $this->Html->image('front/band2.jpg', array('width'=>1004, 'height'=>290)); ?>
                                    <?php echo $this->Html->image('front/band3.jpg', array('width'=>1004, 'height'=>290)); ?>
				</div>
                                <div style="clear: both"></div>
			
			
			</article>
		
