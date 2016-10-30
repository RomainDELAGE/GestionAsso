<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>M2L Associations</title>
	<link rel="stylesheet" href="skin/maquette.css" media="screen" />
	<!-- <script src="script.js"></script> -->
</head>

<body>
	<?php
		include 'BDD/connectBdd.php';
	

	
	if(isset($_GET['logo']))
	{
			include 'detail_assoc.php';
	}
	else
	{

		if (isset($_GET['filtre'])) // on s'assure que les parametres envoyés dans la variables menu existent
		{

				$filtre = $_GET['filtre'];
				

				$req="SELECT id_asso as id, nom_asso as nom ,logo_asso as logo FROM mrbs_asso WHERE type_asso='$filtre' ";
				$res=$connexion->query($req);
				$res->setFetchMode(PDO::FETCH_OBJ);

				if($filtre == 'sport'){$titre="Associations sportives";}
				else if($filtre == 'serv'){$titre="Associations de services à la personne";}
				else if($filtre == 'lobi'){$titre="Associations politiques";}		
		}
		else
		{

				$req="SELECT id_asso as id, nom_asso as nom ,logo_asso as logo FROM mrbs_asso ";
				$res=$connexion->query($req);
				$res->setFetchMode(PDO::FETCH_OBJ);

				$titre="Nos associations partenaires";
		}


		?>
			<h2><?php echo $titre; ?></h2>

		<?php

		while($donnees = $res->fetch())
				{ 
					?>
					<div id ="block-vignette">
						 <div id ="vignette"><a href="assoc.php?logo=<?php echo $donnees->id; ?>"><?php echo '<img src=images/'.$donnees->logo.' >'; ?></a>
						 
						 	<div id ="nom"><a href="assoc.php?logo=<?php echo $donnees->id; ?> "><?php echo $donnees->nom; ?></a></div>

						 </div>
					</div> 
					<?php
				}

				$res->closeCursor();


	} ?>
</body>
</html>