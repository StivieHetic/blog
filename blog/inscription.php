<?php 

session_start();
require_once 'config.php';

	if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['conf_password']))
	{

		$pseudo = htmlspecialchars($_POST['pseudo']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$conf_password = htmlspecialchars($_POST['conf_password']);

		$check = $dbb->prepare('SELECT pseudo, email, password FROM user WHERE email = ?');
		$check->execute(array($email));
		$data = $check->fetch();
		$row = $check->rowCount();

		if ($row == 0)
		{
			if(strlen($pseudo) <= 100)
			{
				if(strlen($email) <= 100)
				{
					if(filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						if($password == $conf_password)
						{
							$password = hash('sha256', $password);
							$insert = $dbb->prepare('INSERT INTO user(pseudo, email, password) VALUES(:pseudo, :email, :password)');
							$insert->execute(array(
								'pseudo' => $pseudo,
								'email' => $email,
								'password' => $password

							));
							header('location: index.php?reg_err=success');
						}else header('location: index.php?reg_err=password');
					}else header('location: index.php?reg_err=email');
				}else header('location: index.php?reg_err=email_length');
			}else header('location: index.php?reg_err=pseudo_length');
		}else header('location: index.php?reg_err=already');
	}


?>