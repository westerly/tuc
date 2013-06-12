<div class="regions view">
<h2><?php  echo __('Region'); ?></h2>
	<dl>
		<dt><?php echo __('Num Region'); ?></dt>
		<dd>
			<?php echo h($region['Region']['num_region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($region['Region']['nom']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Region'), array('action' => 'edit', $region['Region']['num_region'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Region'), array('action' => 'delete', $region['Region']['num_region']), null, __('Are you sure you want to delete # %s?', $region['Region']['num_region'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departements'), array('controller' => 'departements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departement'), array('controller' => 'departements', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Departements'); ?></h3>
	<?php if (!empty($region['Departement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Num Departement'); ?></th>
		<th><?php echo __('Num Region'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th ></th>
	</tr>
	<?php
		$i = 0;
		foreach ($region['Departement'] as $departement): ?>
		<tr>
			<td><?php echo $departement['num_departement']; ?></td>
			<td><?php echo $departement['num_region']; ?></td>
			<td><?php echo $departement['nom']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'departements', 'action' => 'view', $departement['num_departement'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'departements', 'action' => 'edit', $departement['num_departement'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'departements', 'action' => 'delete', $departement['num_departement']), null, __('Are you sure you want to delete # %s?', $departement['num_departement'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Departement'), array('controller' => 'departements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
