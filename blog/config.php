<?php 
	try{
		$dbb = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	}catch(Exeption $e)
	{
		die('Erreur' .$e->getMessage());
	}

?>