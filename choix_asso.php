<html>
<head>
	<meta charset="utf-8">
	<title>Formulaire de saisie</title>

	<script src="fonctions.js"></script>
	<link rel="stylesheet" type="text/css" href="skin/maquette.css" />
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
</head>


<body>


<div id="envoie_form">
	
	
			<h1>Association :</h1>

			<?php

			include 'BDD/connectBdd.php';

			$iduser = $_SESSION['id'];
			
			 $reqAsso = $connexion->query('SELECT nom_asso FROM mrbs_asso INNER JOIN mrbs_user_asso ON mrbs_user_asso.id_asso = mrbs_asso.id_asso INNER JOIN mrbs_users ON mrbs_user_asso.id_user=mrbs_users.id where mrbs_users.id='.$iduser.';')?>
		    <form name="btnValider" action="index.php ?menu=modif" method="post">
			<select id="nomAsso" type="list" name="nomAsso" value=""/>

			<?php
			include 'BDD/connectBdd.php';
			//$reponse = $connexion->query('SELECT id_asso, nom_asso FROM mrbs_asso'); //Donnes toutes les infos
			//$reqAsso = $connexion->query('SELECT nom_asso FROM mrbs_asso INNER JOIN mrbs_user_asso ON mrbs_user_asso.id_asso = mrbs_asso.id_asso INNER JOIN mrbs_users ON mrbs_user_asso.id_user=mrbs_users.id where mrbs_users.id='.$iduser.';') //Donnes seulement les infos liée a l'utilisateur
			if(isset($_SESSION['level']) AND $_SESSION['level'] > 1)    
			{
			$reqAsso = $connexion->query('SELECT id_asso, nom_asso FROM mrbs_asso');			
			}
			else{
			$reqAsso = $connexion->query('SELECT nom_asso FROM mrbs_asso INNER JOIN mrbs_user_asso ON mrbs_user_asso.id_asso = mrbs_asso.id_asso INNER JOIN mrbs_users ON mrbs_user_asso.id_user=mrbs_users.id where mrbs_users.id='.$iduser.';');
			}
			?>
				<option> --  Choisir une association  -- </option selected>
				<?php
			while ($donnees = $reqAsso->fetch(PDO::FETCH_OBJ))
			{
				?>
				<option> <?php echo $donnees->nom_asso; ?></option>
				<?php
			}
			?>

			</select>
	
	
			
				<br /><input type="submit" value="Suivant >" />

</div>


</form>


</html>
