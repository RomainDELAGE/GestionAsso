<html>
<head>
	<meta charset="utf-8">
	<title>Formulaire de saisie</title>

	<script src="fonctions.js"></script>
	<link rel="stylesheet" type="text/css" href="skin/maquette.css" />
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
</head>



<body>



<div id="formulaire">
			<h1>Utilisateur</h1>
			<p>Identification utilisateur</p>


			<select id="nomUser" type="list" name="nomUser" value="" />
			   <?php
			      include 'BDD/connectBdd.php';
			         $reponse = $connexion->query("SELECT count(*) as nombre FROM mrbs_users WHERE name='".@$_POST['nomUser']."' AND password='".@$_POST['password']."'");
               $resultats=$connexion->query($reponse); // on execute notre requête
               $resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
               $ligne = $resultats->fetch();
               if ($ligne->nombre>0)
               {
		               /* on sauve le user */
		                 $_SESSION['utilisateur']=@$_POST['nomUser'];
		                   echo "Vous êtes connecté ".$_SESSION['utilisateur']."<br/><br/>";

               }
               else
               {
                 ?>
                 <form id='connection' method="post" action="">
                 <legend><h2 align="center">Connectez-vous</h2> </legend>
                 <?php
	                if (@$_POST['Pseudo']!='')
                  {
		                  /* on vide le user */
		                    $_SESSION['utilisateur']='';
		                      echo "Utilisateur ou mot de passe incorrect.<br/><br/>";
	                }
                  ?>
               }

			</select>

</div>


<form name="btnValider" action="choix_asso.php" method="post">
<div id="submit">
				<br /><input type="submit" value="Valider" />
</div>
</form>
</body>
</html>
