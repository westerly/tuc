<div class="partenaires index">
	<h2><?php echo __('Partenaires'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('partenaire_id'); ?></th>
			<th><?php echo $this->Paginator->sort('partenaire'); ?></th>
			<th><?php echo $this->Paginator->sort('adresseWeb'); ?></th>
			<th><?php echo $this->Paginator->sort('cp'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('departement_id'); ?></th>
			<th><?php echo $this->Paginator->sort('afficher'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($partenaires as $partenaire): ?>
	<tr>
		<td><?php echo h($partenaire['Partenaire']['partenaire_id']); ?>&nbsp;</td>
		<td><?php echo h(substr($partenaire['Partenaire']['partenaire'],0,50)); ?>&nbsp;</td>
		<td><?php echo h($partenaire['Partenaire']['adresseWeb']); ?>&nbsp;</td>
		<td><?php echo h($partenaire['Partenaire']['cp']); ?>&nbsp;</td>
		<td><?php echo h(substr($partenaire['Partenaire']['description'],0,50))."..."; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($partenaire['Departement']['nom'], array('controller' => 'departements', 'action' => 'view', $partenaire['Departement']['num_departement'])); ?>
		</td>
		<td><?php if($partenaire['Partenaire']['afficher']==1){echo "Oui";}else{echo "Non";}?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Détails'), array('action' => 'view', $partenaire['Partenaire']['partenaire_id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $partenaire['Partenaire']['partenaire_id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $partenaire['Partenaire']['partenaire_id']), null, __('Voulez vous vraiment supprimer ce partenaire?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} sur {:pages}, montrant {:current} enregistrements sur un total de {:count}, commence à {:start}, finit à {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Précédent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	
	<br/>
	<br/>
	
	<div class="actions">
		<?php echo $this->Html->link(__('Ajouter un partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?>
	</div>
	
</div>

