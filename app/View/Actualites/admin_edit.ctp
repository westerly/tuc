<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>


<div class="actualites form">
<?php echo $this->Form->create('Actualite'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Actualite'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('date_creation');
		echo $this->Form->input('titre');
		//echo $this->Form->input('contenu');
		echo $this->Form->input('contenu' , array("class" => "ckeditor"));
		//echo $this->Form->input('last_updated');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
