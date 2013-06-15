<?php
//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');

?>



<div class="partenaires index">
	<h2><?php echo __('Partenaires'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('partenaire_id', 'Id'); ?></th>
			<th><?php echo $this->Paginator->sort('partenaire', 'Nom'); ?></th>
			<th><?php echo $this->Paginator->sort('adresseWeb', 'Adresse web'); ?></th>
			<th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
			<th><?php echo $this->Paginator->sort('cp', 'Code postal'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Description'); ?></th>
			<th><?php echo $this->Paginator->sort('departement_id', 'Département'); ?></th>
			<th><?php echo $this->Paginator->sort('afficher', 'Afficher'); ?></th>
			<th><?php echo "Logo"; ?></th>
			<th ></th>
	</tr>
	<?php foreach ($partenaires as $partenaire): ?>
	<tr>
		<td><?php echo h($partenaire['Partenaire']['partenaire_id']); ?>&nbsp;</td>
		<td><?php echo h(substr($partenaire['Partenaire']['partenaire'],0,50)); ?>&nbsp;</td>
		<td><?php echo h($partenaire['Partenaire']['adresseWeb']); ?>&nbsp;</td>
		<td><?php echo h($partenaire['Partenaire']['email']); ?>&nbsp;</td>
		<td><?php echo h($partenaire['Partenaire']['cp']); ?>&nbsp;</td>
		<td><?php echo h(substr($partenaire['Partenaire']['description'],0,50))."..."; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($partenaire['Departement']['nom'], array('controller' => 'departements', 'action' => 'view', $partenaire['Departement']['num_departement'])); ?>
		</td>
		<td><?php if($partenaire['Partenaire']['afficher']==1){echo "Oui";}else{echo "Non";}?>&nbsp;</td>
		<td><?php 

		echo $this->Html->link(
									    $this->Html->image($partenaire['Partenaire']['fichierLogo'],  array("class" => "index")),
									    '/' . IMAGES_URL .$partenaire['Partenaire']['fichierLogo'],
									    array('escape' => false, 'class'=>'colorbox')
		);
		
		?> </td>
		
		
		<td class="actions">
			<?php echo $this->Html->link(__('Détails'), array('action' => 'view', $partenaire['Partenaire']['partenaire_id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $partenaire['Partenaire']['partenaire_id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $partenaire['Partenaire']['partenaire_id']), null, __('Voulez vous vraiment supprimer ce partenaire?')); ?>
			<?php 
				if($partenaire['Partenaire']['afficher']==1){
					echo $this->Form->postLink(__('Ne plus affciher'), array('action' => 'afficher', $partenaire['Partenaire']['partenaire_id'], false), null, __('Voulez vous vraiment ne plus afficher ce partenaire?')); 
				}else{
					echo $this->Form->postLink(__('Afficher'), array('action' => 'afficher', $partenaire['Partenaire']['partenaire_id'], true), null, __('Voulez vous vraiment afficher ce partenaire?')); 
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
		<?php echo $this->Html->link(__('Ajouter un partenaire'), array('controller' => 'partenaires', 'action' => 'add')); ?>
	</div>
	
</div>

