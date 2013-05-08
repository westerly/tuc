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
	

