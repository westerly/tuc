<?php
//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');
?>


<div class="login-admin">
<?php
	
	echo $this->Form->create('User',array('url'=>array('action'=>'login')));
        
	echo $this->Form->input('login');
	echo $this->Form->input('password');
	
	echo $this->Form->end('Connexion');
	
	if(isset($errorMessage))
	{
		echo $errorMessage;
	}
?>	
</div>	

