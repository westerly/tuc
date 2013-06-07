<?php
//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');
?>



<div class="partenaires form">
<?php echo $this->Form->create('Partenaire', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edition du partenaire'); ?></legend>
	<?php
		echo $this->Form->input('partenaire_id');
		echo $this->Form->input('partenaire');
		echo $this->Form->input('adresseWeb');
		echo $this->Form->input('email');
		echo $this->Form->input('cp');
		echo $this->Form->input('description');
		echo "<a href='".URL_IMG.$partenaire['Partenaire']['fichierLogo']."' class='top_up'><img class='edit' src='".URL_IMG.$partenaire['Partenaire']['fichierLogo']."'/></a>"; 
		echo $this->Form->input('new_fichierLogo', array('label' => 'Logo', 'type' => 'file'));
		echo $this->Form->input('departement_id');
		echo $this->Form->input('afficher');
		echo $this->Form->input('Defi');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<a href="javascript:history.back()">Retour</a> 
	</ul>
</div>
