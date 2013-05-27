<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un utilisateur'); ?></legend>
	<?php
		echo $this->Form->input('login');
		echo $this->Form->input('password');
		echo $this->Form->input('clan_id');
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
