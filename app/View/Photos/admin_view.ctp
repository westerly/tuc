<div class="photos view">
<h2><?php  echo __('Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom Fichier'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['chemin_fichier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Afficher'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['afficher']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clan'); ?></dt>
		<dd>
			<?php echo $this->Html->link($photo['Clan']['nom'], array('controller' => 'clans', 'action' => 'view', $photo['Clan']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($photo['Defi']['nom'], array('controller' => 'defis', 'action' => 'view', $photo['Defi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Upload'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['date_upload']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Photo'), array('action' => 'edit', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), null, __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clans'), array('controller' => 'clans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clan'), array('controller' => 'clans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Defis'), array('controller' => 'defis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defi'), array('controller' => 'defis', 'action' => 'add')); ?> </li>
	</ul>
</div>
