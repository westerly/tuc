<div class="profils form">
<?php echo $this->Form->create('Profil'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Profil'); ?></legend>
	<?php
		echo $this->Form->input('profil_id');
		echo $this->Form->input('profil');
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
