<div class="messages view">
<h2><?php  echo __('Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($message['Message']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($message['Message']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prenom'); ?></dt>
		<dd>
			<?php echo h($message['Message']['prenom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($message['Message']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entite'); ?></dt>
		<dd>
			<?php echo $this->Html->link($message['Entite']['entite'], array('controller' => 'entites', 'action' => 'view', $message['Entite']['entite_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenu'); ?></dt>
		<dd>
			<?php echo h($message['Message']['contenu']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Message'), array('action' => 'edit', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Message'), array('action' => 'delete', $message['Message']['id']), null, __('Are you sure you want to delete # %s?', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entites'), array('controller' => 'entites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entite'), array('controller' => 'entites', 'action' => 'add')); ?> </li>
	</ul>
</div>
