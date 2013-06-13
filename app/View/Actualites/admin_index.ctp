<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>


<div class="actualites index">
	<h2><?php echo __('Actualités'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_creation'); ?></th>
			<th><?php echo $this->Paginator->sort('titre'); ?></th>
			<th><?php echo $this->Paginator->sort('contenu'); ?></th>
			<th><?php echo $this->Paginator->sort('last_updated'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($actualites as $actualite): ?>
	<tr>
		<td><?php echo h($actualite['Actualite']['id']); ?>&nbsp;</td>
		<td><?php echo h($actualite['Actualite']['date_creation']); ?>&nbsp;</td>
		<td><?php echo h($actualite['Actualite']['titre']); ?>&nbsp;</td>
		<td><?php echo h(substr($actualite['Actualite']['contenu'],0,50)."..."); ?>&nbsp;</td>
		<td><?php echo h($actualite['Actualite']['last_updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Détails'), array('action' => 'view', $actualite['Actualite']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $actualite['Actualite']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $actualite['Actualite']['id']), null, __('Voulez vous vraiment supprimer cette actualité?')); ?>
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
	
	<div class="actions widebutton">
		<?php echo $this->Html->link(__('Ajouter une actualité'), array('controller' => 'actualites', 'action' => 'add')); ?>
	</div>
</div>



	


