<?php
try {
/*
	$dbname = "dbnf17p095";
	$host = "tuxa.sme.utc";
	$user = "nf17p095";
	$mdp = "IG2YkyQd";
*/
	$dbname = "tuc";
	$host = "sql.mde.utc";
	$user = "tuc";
	$mdp = "shaSh1ie";
	
	$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $mdp );
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>