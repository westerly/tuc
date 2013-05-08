<div class="partenaires form">
<?php echo $this->Form->create('Partenaire'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Partenaire'); ?></legend>
	<?php
		echo $this->Form->input('partenaire');
		echo $this->Form->input('adresseWeb');
		echo $this->Form->input('cp');
		echo $this->Form->input('description');
		echo $this->Form->input('fichierLogo');
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

		<li><?php echo $this->Html->link(__('List Partenaires'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Departements'), array('controller' => 'departements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departement'), array('controller' => 'departements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
