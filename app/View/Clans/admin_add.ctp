<div class="clans form">
<?php echo $this->Form->create('Clan'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un clan'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		//echo $this->Form->input('Defi');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>

