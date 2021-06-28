<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/script.js" defer></script>
  <title>Blog</title>
</head>
<body>
	<?php require_once 'include/nav.php'; ?>
  	<div class="container">
  		<div class="tab-body" data-id="connexion">
  			<?php 
  				if(isset($_GET['login_err']))
  				{
  					$err = htmlspecialchars($_GET['login_err']);

  					switch ($err)
  					{
  						case 'password':
  						?>
  							<div class="alert-">
  								<strong class="error">Erreur</strong>mot de passe incorrect
  							</div>
  						<?php
  						break;

  						case 'email':
  						?>
  							<div class="alert">
  								<strong>Erreur</strong>emailincorrect
  							</div>
  						<?php
  						break;

  						case 'already':
  						?>
  							<div class="alert">
  								<strong>Erreur</strong>compte non exsistant
  							</div>
  						<?php
  						break;
  					}
  				}
			?>
			<?php 
  				if(isset($_GET['reg_err']))
  				{
  					$err = htmlspecialchars($_GET['reg_err']);

  					switch ($err)
  					{
  						case 'success':
  						?>
  							<div class="alert-success">
  								<strong>Succès</strong> votre à bien été crée !
  							</div>
  						<?php
  						break;

  						case 'email':
  						?>
  							<div class="alert">
  								<strong>Erreur</strong>emailincorrect
  							</div>
  						<?php
  						break;

  						case 'already':
  						?>
  							<div class="alert">
  								<strong>Erreur</strong>compte non exsistant
  							</div>
  						<?php
  						break;
  					}
  				}
			?>
  			<form action="connexion.php" method="POST">
			    <h1>Connexion</h1>
			    <p>Veuillez vous connecter</p>
			    <hr>

			    <label for="email"><b>Votre e-mail</b></label>
			    <input type="text" placeholder="Votre mail" name="email" id="email" required="required">


			    <label for="password"><b>Votre mot de passe</b></label>
			    <input type="password" placeholder="Votre mot de passe" name="password" id="password" required="required">

			    <hr>
			    <p align="center">Je n'es pas compte <a class="tab-link" data-ref="inscription" href="javascript:void(0)">Inscription</a>.</p>

			    <button type="submit" class="registerbtn">Connexion</button>
		    </form>
  		</div>
  		<div class="tab-body" data-id="inscription">
		  	<form action="inscription.php" method="POST">
			    <h1>Inscription</h1>
			    <p>Veuillez remplir ce formulaire pour créer un compte.</p>
			    <hr>

			    <label for="pseudo"><b>Pseudo</b></label>
			    <input type="text" placeholder="Votre mail" name="pseudo" id="pseudo" required="required">

			    <label for="email"><b>Votre mail</b></label>
			    <input type="text" placeholder="Votre mail" name="email" id="email" required="required">

			    <label for="password"><b>Votre mot de passe</b></label>
			    <input type="password" placeholder="Votre mot de passe" name="password" id="password" required="required">

			    <label for="conf_password"><b>Confirmation mot de passe</b></label>
			    <input type="password" placeholder="Confirmation mot de passe" name="conf_password" id="conf_password" required="required">
			    <hr>
			    <p align="center">J'ai déjà un compte <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>.</p>

			    <button type="submit" class="registerbtn" name="register">Register</button>
		    </form>
		</div>
  	</div>
</body>
</html>
