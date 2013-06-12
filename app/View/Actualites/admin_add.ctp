
<div class="actualites form">
<?php echo $this->Form->create('Actualite'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une actualité'); ?></legend>
	<?php
		//echo $this->Form->input('date_creation');
		echo $this->Form->input('titre');
		echo $this->Form->input('contenu' , array("class" => "ckeditor"));
		//echo $this->Form->input('last_updated');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Envoyer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>


