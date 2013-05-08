<div class="actualites view">
<h2><?php  echo __('Actualite'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($actualite['Actualite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Creation'); ?></dt>
		<dd>
			<?php echo h($actualite['Actualite']['date_creation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo h($actualite['Actualite']['titre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenu'); ?></dt>
		<dd>
			<?php echo h($actualite['Actualite']['contenu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Updated'); ?></dt>
		<dd>
			<?php echo h($actualite['Actualite']['last_updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Actualite'), array('action' => 'edit', $actualite['Actualite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Actualite'), array('action' => 'delete', $actualite['Actualite']['id']), null, __('Are you sure you want to delete # %s?', $actualite['Actualite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Actualites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actualite'), array('action' => 'add')); ?> </li>
	</ul>
</div>
