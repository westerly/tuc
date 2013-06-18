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
			<?php echo $actualite['Actualite']['contenu']; ?>
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
	<table>
	<tr>
		<td><?php echo $this->Html->link(__('Editer'), array('controller' => 'Actualites', 'action' => 'edit', $actualite['Actualite']['id'])); ?></td>
		<td><a href="javascript:history.back()">Retour</a></td>
	</tr>
	</table>
</div>

