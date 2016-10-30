<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Formulaire de saisie</title>

		<script src="fonctions.js"></script>
		<link rel="stylesheet" type="text/css" href="skin/maquette.css" />
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	</head>



	<body>



	<?php
	include 'BDD/connectBdd.php';
	
	if(isset($_POST['nomUser']) AND isset($_POST['password']))
	{
		$nom = $_POST['nomUser'];
		$pwd = $_POST['password'];
		

		//$reponse2 = $connexion->query('SELECT * FROM mrbs_users WHERE name = "'.$nom.'" AND password = "'.MD5($pwd).'";') or die('Erreur SQL !'.$sql.'<br>'.mysql_error());;
		//$reponse3 = $connexion->query('SELECT id FROM mrbs_users WHERE name = "'.$nom.'" AND password = "'.MD5($pwd).'";') or die('Erreur SQL !'.$sql.'<br>'.mysql_error());;
	  	//$reqLogPas = $reponse2->rowcount();
	  	//$donneesrep3 = $reponse3->fetch();
		//$ligne = $reponse2->fetch(PDO::FETCH_OBJ);
		/*$pwd = $_REQUEST['password'];*/
		/* value="<?php echo $donnees->id_asso; ?>" */


		$req=('SELECT * FROM mrbs_users WHERE name = "'.$nom.'" AND password = "'.MD5($pwd).'";') or die('Erreur SQL !'.$sql.'<br>'.mysql_error());;
		$res=$connexion->query($req);
		$res->setFetchMode(PDO::FETCH_OBJ);
		$reqLogPas = $res->rowcount();

			if($reqLogPas > 0)
			{
				session_start();

				$_SESSION['username'] = $nom;

				$donnees = $res->fetch();
				$id = $donnees->id;
				$_SESSION['id'] = $id;
				$level = $donnees->level;
				$_SESSION['level'] = $level;

				header( "Location: index.php ?menu=accueil");
				
			}
			else
			{
				?>

				<div id="formulaire_insc">
					<h1>Utilisateur</h1>
					<p> Echec Identification utilisateur</p>

				<form name="btnValider" action="index.php ?menu=identification" method="post">
					<label>Pseudo : <br /> <input id="nomUser" type="text" name="nomUser" value="" /></label>
					<?php
					include 'BDD/connectBdd.php';
					$reponse = $connexion->query('SELECT name FROM mrbs_users');
					?>


					<br /><label>Mot de passe : <br /><input id="password" type="password" name="password" value="" /></label>

					<div id="envoie_formulaire insc">
						<br /><input type="submit" value="Connexion" />
					</div>

				</form>

				<br /><p>Désolé <?php echo $nom; ?> votre mot de passe n'est pas correct. </p></br>
				</div>
		
				 

			

				<?php
			}

	}
	else
	{
		?>

		<div id="formulaire_insc">
					<h1>Identification utilisateur:</h1>
					

				<form name="btnValider" action="index.php ?menu=identification" method="post">
					<label>Pseudo : <br /><input id="nomUser" type="text" name="nomUser" value="" /></label>
					<?php
					include 'BDD/connectBdd.php';
					$reponse = $connexion->query('SELECT name FROM mrbs_users');
					?>


					<br /><label>Mot de passe : <br /><input id="password" type="password" name="password" value="" /></label>

					<div id="envoie_formulaire_insc">
						<br /><input type="submit" value="Connexion" />
					</div>
		

				</form>

			</div>
		

	<?php
	}
	?>
	</body>

</html>