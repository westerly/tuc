<?php
	echo $this->Html->image($partenaire['Partenaire']['fichierLogo'],array('height' => '100'));
?>

<ul>
	<?php
	$display = array('partenaire' => 'Nom','description' => 'Description', 'adresse' => 'Adresse','cp' => 'Code Postale' 'ville' => 'Ville', 'email' => 'Email');
		foreach($display as $key => $val) {
			if(!empty($partenaire['Partenaire'][$key])) {
				echo "<li><b>".$val."</b> : ".$partenaire['Partenaire'][$key]."</li>";
			}
		}
	?>
</ul>