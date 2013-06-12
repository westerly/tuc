<div class="departements view">
<h2><?php  echo __('Departement'); ?></h2>
	<dl>
		<dt><?php echo __('Num Departement'); ?></dt>
		<dd>
			<?php echo h($departement['Departement']['num_departement']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($departement['Region']['nom'], array('controller' => 'regions', 'action' => 'view', $departement['Region']['num_region'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($departement['Departement']['nom']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Departement'), array('action' => 'edit', $departement['Departement']['num_departement'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Departement'), array('action' => 'delete', $departement['Departement']['num_departement']), null, __('Are you sure you want to delete # %s?', $departement['Departement']['num_departement'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partenaires'), array('controller' => 'partenaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Partenaires'); ?></h3>
	<?php if (!empty($departement['Partenaire'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Partenaire Id'); ?></th>
		<th><?php echo __('Partenaire'); ?></th>
		<th><?php echo __('AdresseWeb'); ?></th>
		<th><?php echo __('Cp'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('FichierLogo'); ?></th>
		<th><?php echo __('Departement Id'); ?></th>
		<th><?php echo __('Afficher'); ?></th>
		<th ></th>
	</tr>
	<?php
		$i = 0;
		foreach ($departement['Partenaire'] as $partenaire): ?>
		<tr>
			<td><?php echo $partenaire['partenaire_id']; ?></td>
			<td><?php echo $partenaire['partenaire']; ?></td>
			<td><?php echo $partenaire['adresseWeb']; ?></td>
			<td><?php echo $partenaire['cp']; ?></td>
			<td><?php echo $partenaire['description']; ?></td>
			<td><?php echo $partenaire['fichierLogo']; ?></td>
			<td><?php echo $partenaire['departement_id']; ?></td>
			<td><?php echo $partenaire['afficher']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'partenaires', 'action' => 'view', $partenaire['partenaire_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'partenaires', 'action' => 'edit', $partenaire['partenaire_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'partenaires', 'action' => 'delete', $partenaire['partenaire_id']), null, __('Are you sure you want to delete # %s?', $partenaire['partenaire_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
