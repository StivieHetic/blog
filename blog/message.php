<?php 
session_start();
require_once 'config.php';

if(!isset($_SESSION['user']))
		header('location:index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require_once 'include/nav.php'; ?>

<?php 
	if(isset($_POST['content_message'])) {  
		if(!empty($_POST['content_message'])) {

			$content_message = htmlspecialchars($_POST['content_message']);

				$insert = $dbb->prepare('INSERT INTO messages (content_message, created_at) VALUES(?, NOW())');
				$insert->execute(array($content_message));

				$message = 'Votre message à bien été publié';

		} else {
			$message = 'veuillez remplir les champs';
		}
	}
?>
<div class="container">
	<div class="content">
		<h2>Publier votre poste</h2>
		<form method="POST">
			<textarea rows="20" style="width: 100%; resize: none; padding: 10px;" placeholder="écrire votre poste...." name="content_message"></textarea>
			<button type="submit">Envoyer</button>
		</form>
		<br />
		<?php if(isset($message)) { echo $message; } ?>
	</div>
</div>
</body>
</html>