<?php 
session_start();
	if(!isset($_SESSION['user']))
		header('location:index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mon Profil</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php require_once 'include/nav.php'; ?>
wsshhhhhhhh ! <?php echo  $_SESSION['user']; ?>
	<a href="deconnexion.php">Déconnexion</a>
</body>
</html>