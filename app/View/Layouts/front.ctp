<?php echo $this->Html->docType('html5'); ?> 
<html lang="fr">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?> :: Tous Unis pour la Cité</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="description" name="Parcequ'un étudiant est un potentiel de talent et de générositer à valoriser">
    <meta content="author" name="Hugo Rodde"> 
    <meta name="viewport" content="width=device-width"/>
    <link href="<?php echo $this->Html->url('favicon.png'); ?>" type="image/x-icon" rel="icon">
    <?php 
    //echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->Html->css(array('font','screen','front2','colorbox'));
    echo $this->fetch('css');
    ?>
    <!--[if lte IE 7]><script src="js/lte-ie7.js"></script>
        <?php echo $this->Html->css('lte-ie7'); ?>
    <![endif]-->
    <!--[if lte 8]>
        <?php echo $this->Html->css('ie'); ?>       
    <![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<header>
        <div class="container">
            <div class="span6 omega">
                <div class="push-right">
                    <a href="/accueil.html" title="Page d'accueil" >
                        <?php echo $this->Html->image('logo.png'); ?>
                    </a>  
                </div>
                <div class="clear"></div>
            </div>
            <div class="span6">
                <div class="mentra">
                    <blockquote>
                        Parce qu’un étudiant est avant tout un potentiel de générosité et de talents à valoriser...
                    </blockquote>
                </div>
            </div>
        </div>
        <nav>
            <div class="dk-div visible-phone">
            </div>
            <div class="navbar">
                <?php echo $this->element('navbar') ?>
            </div>
        </nav>
    </header>
	   <div class="page">
        <div class="container">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="span6">
                <div id="infos">
                    BDE UTC Tous Unis pour la Cité<br>
                    Bât E300<br>
                    Rue Roger Couttolenc - BP 60301<br>
                    60203 Compiègne Cedex<br>
                </div>
            </div>
            <div class="span6 omega">
                N° SIRET : 39777672500012
                <br><br>
                <?php echo  $this->Html->link('Espace Admin', $this->Html->url(array('controller' => 'users', 'action' => 'login','admin'=>true), true));?>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
		<?php echo $this->Html->script(array('jquery-latest.min.js', 'jquery.dropkick.js','jquery.slides.min','jquery.colorbox-min','jquery.carouFredSel-6.2.1-packed','selectivizr-min','front')); ?>
        <?php echo $this->fetch('script'); ?>

</body>
</html>
