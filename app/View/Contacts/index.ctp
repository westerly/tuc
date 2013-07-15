<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');


echo'<div class="contacts form">';
echo $this->Form->create('Contact');

	echo'<fieldset>';
		echo"<legend><h3Contactez nous</h3></legend>";
		
	
		echo'<table class="contact"><tr class="input text required">';
				echo'<td style="width:6em;">Nom<span>*</span></td><td><input type="text" name="data[Contact][nom]" cols="30" maxlength="50" rows="6" id="ContactNom" required="required" ';
				if(isset($datas["nom"])){echo "value='".$datas["nom"]."'";}
				echo'"/></td>';
		echo'</tr>';
		
		echo'<tr class="input text required">';
				echo'<td>Prénom<span>*</span></td><td><input type="text" name="data[Contact][prenom]" cols="30" maxlength="50" rows="6" id="ContactPrenom" required="required"';
				if(isset($datas["prenom"])){echo "value='".$datas["prenom"]."'";}
				echo'/></td>';
		echo'</tr>';
		
		echo'<tr class="input text required">';	
			echo'<td>Email<span>*</span></td><td><input type="email" name="data[Contact][email]" cols="30" maxlength="50" rows="6" id="ContactEmail" required="required"';
			if(isset($datas["email"])){echo "value='".$datas["email"]."'";}
			echo'/></td>';
		echo'</tr>';
		
		echo'<tr class="input text required">';
			echo'<td>Entité<span>*</span></td><td>';
			echo'<select name="data[Contact][entite]" id="ContactEntite">';
				echo'<option value="Mairie">Mairie</option>';
				echo'<option value="UTC">UTC</option>';
				echo'<option value="Collaborateur">Collaborateur</option>';
				echo'<option value="Autre">Autre</option>';
			echo'</select></td>';
		echo'</tr>';
		
		echo'<tr class="textarea required">';
			echo'<td>Message<span>*</span></td><td><textarea name="data[Contact][message]" cols="30" minlength="50" rows="6" id="ContactMessage" required="required">';
				if(isset($datas["message"])){echo $datas["message"];}
			echo'</textarea></td>';
		echo'</tr></table>';
		
	echo'</fieldset>';
echo $this->Form->end(__('Valider'));

echo '</div>';

?>
