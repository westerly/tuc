<?php

?>

<?php
//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');
?>


<div class="login-admin">
<?php
	
	echo $this->Form->create('User',array('url'=>array('action'=>'login')));
?>
    <table style="margin: auto;">
    <tr class="input text"><td><label for="UserLogin">Login</label></td><td><input name="data[User][login]" maxlength="255" type="text" id="UserLogin"></td></tr>
    <tr class="input password"><td><label for="UserPassword">Password</label></td><td><input name="data[User][password]" type="password" id="UserPassword"></td></tr>
    </table>
        <?php
	echo $this->Form->end('Connexion');
	
	if(isset($errorMessage))
	{
		echo $errorMessage;
	}
?>	
</div>	

