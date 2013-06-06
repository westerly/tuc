<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');


echo'<div class="contacts form">';
echo $this->Form->create('Contact');

	echo'<fieldset>';
		echo"<legend> Contactez nous </legend>";
		
		
		echo'<div class="input text required">';
				echo'Nom*<input type="text" name="data[Contact][nom]" cols="30" maxlength="50" rows="6" id="ContactNom" required="required" ';
				if(isset($datas["nom"])){echo "value='".$datas["nom"]."'";}
				echo'"/>';
		echo'</div>';
		
		echo'<div class="input text required">';
				echo'Prénom*<input type="text" name="data[Contact][prenom]" cols="30" maxlength="50" rows="6" id="ContactPrenom" required="required"';
				if(isset($datas["prenom"])){echo "value='".$datas["prenom"]."'";}
				echo'/>';
		echo'</div>';
		
		echo'<div class="input text required">';	
			echo'Email*<input type="email" name="data[Contact][email]" cols="30" maxlength="50" rows="6" id="ContactEmail" required="required"';
			if(isset($datas["email"])){echo "value='".$datas["email"]."'";}
			echo'/>';
		echo'</div>';
		
		echo'<div class="input text required">';
			echo'Entité*';
			echo'<select name="data[Contact][entite]" id="ContactEntite">';
				echo'<option value="Mairie">Mairie</option>';
				echo'<option value="UTC">UTC</option>';
				echo'<option value="Collaborateur">Collaborateur</option>';
				echo'<option value="Autre">Autre</option>';
			echo'</select>';
		echo'</div>';
		
		echo'<div class="textarea required">';
			echo'Message*<textarea name="data[Contact][message]" cols="30" minlength="50" rows="6" id="ContactMessage" required="required">';
				if(isset($datas["message"])){echo $datas["message"];}
			echo'</textarea>';
		echo'</div>';
		
	echo'</fieldset>';
echo $this->Form->end(__('Submit'));

echo '</div>';

?>
