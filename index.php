<!doctype html>
<html lang="fr">

<?php

if(isset($_GET['session']) AND $_GET['session'] == "close" ){session_start(); $_SESSION=array(); session_destroy();}	

		
?>


<head>
	<meta charset="utf-8" />
	<title>M2L Associations</title>
	<link rel="stylesheet" href="skin/maquette.css" media="screen" />
	<!-- <script src="script.js"></script> -->
</head>

<body>
	<div id="fond">
		
		<div id="menu_haut">
			<?php include('menu_haut.php'); ?>
		</div>	
			
		<div id="contenu">
			<?php include('contenu.php'); ?>
		</div>
		
	</div>

</body>

</html>