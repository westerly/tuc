<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>



<div class="defis index">
	<h2><?php echo __('Défis'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('demandeur'); ?></th>
			<th><?php echo $this->Paginator->sort('horaire'); ?></th>
			<th><?php echo $this->Paginator->sort('nature'); ?></th>
			<th><?php echo $this->Paginator->sort('localisation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nbr_etu'); ?></th>
			<th><?php echo $this->Paginator->sort('date_soumission'); ?></th>
			<th><?php echo $this->Paginator->sort('afficher'); ?></th>
			<th ></th>
	</tr>
	<?php foreach ($defis as $defi): ?>
	<tr>
		<td><?php echo h($defi['Defi']['id']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['nom']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['demandeur']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($defi['Horaire']['horaire'], array('controller' => 'horaires', 'action' => 'view', $defi['Horaire']['horaire_id'])); ?>
		</td>
		<td><?php echo h($defi['Defi']['nature']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($defi['Localisation']['lieu'], array('controller' => 'localisations', 'action' => 'view', $defi['Localisation']['localisation_id'])); ?>
		</td>
		<td><?php echo h($defi['Defi']['nbr_etu']); ?>&nbsp;</td>
		<td><?php echo h($defi['Defi']['date_soumission']); ?>&nbsp;</td>
		<td><?php
		
		 if(h($defi['Defi']['afficher']) == '1'){
		 	echo "Oui";
		 }else{
		 	echo "Non";
		 } 
		 
		 ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Détails'), array('action' => 'view', $defi['Defi']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $defi['Defi']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $defi['Defi']['id']), null, __('Voulez vous vraiment supprimer ce défi?')); ?>
			<?php 
			
				if($defi['Defi']['afficher']== '1' ){
					echo $this->Form->postLink(__('Ne plus afficher'), array('action' => 'afficher', $defi['Defi']['id'], false), null, __('Supprimer l\'affichage du défi dans la partie publique du site?')); 
				}else{
					echo $this->Form->postLink(__('Afficher'), array('action' => 'afficher', $defi['Defi']['id'], true), null, __('Afficher ce défi dans la partie publique du site?')); 
				}
				
			?>
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
		<?php echo $this->Html->link(__('Ajouter un défi'), array('controller' => 'defis', 'action' => 'add')); ?>
	</div>
</div>


