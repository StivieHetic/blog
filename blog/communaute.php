<?php 
session_start();
require_once 'config.php';
	
	if(!isset($_SESSION['user']))
		header('location:index.php');
	
	$messages = $dbb->query('SELECT * FROM messages ORDER BY created_at DESC LIMIT 10');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Communauté</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
.message{
  box-shadow: 1px 1px 10px #555;
  margin-top: 15px;
  padding: 15px;
}
</style>
<body>
	<?php require_once 'include/nav.php'; ?>
	<div class="container">
		<?php while($a = $messages->fetch()) { ?>
			<div class="content">
				<div class="message">
					<div style=" word-break: break-word; margin-bottom: 12px; line-height: 26px;"><?= $a['content_message'] ?></div>
					<hr>
					<div style="float: right;"><span style="font-weight: 700; font-size: 14px;">Le <?= $a['created_at'] ?></span></div>

					<div><span style="font-weight: 700; font-size: 14px; color: red;">Écrit par Stivie</span></div>
				</div>
			</div>
		<?php } ?>
	</div>

</body>
</html>