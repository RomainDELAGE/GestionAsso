<html>
<head>
	<meta charset="utf-8">
	<title>Formulaire de saisie</title>

	<script src="fonctions.js"></script>
	<link rel="stylesheet" type="text/css" href="skin/maquette.css" />
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
</head>


<body>


<?php //  -> Problème ICI !!!!!!!!!!! <-

	// si tous les champs du formulaires sont remplis on modifie la bdd sinon on affiche le formulaire avec les données
	  // ne fonctionne pas revoir les requêtes
if (isset($_POST['nomAss']) AND isset($_POST['description']) AND isset($_POST['mail']) AND isset($_POST['tel']) AND isset($_POST['adresse']) AND isset($_POST['cp']) AND isset($_POST['1ville']) AND isset($_POST['image']) AND isset($_POST['logo'])) //vérifie que les champs sont remplis
	{
		
		include 'BDD/connectBdd.php';

		if (isset($_POST['nomAss']) and $_POST['nomAss'] !="")
		{	
			$nomAss = $_POST['nomAss'];
			//echo $nomAss;
		}
		//echo $nomAss;
		if (isset($_POST['idAss']) and $_POST['idAss'] !="")//le paramêtre idAss n'est pas récuppéré
		{	
			$idAss = $_POST['idAss'];
			//echo $idAss;
		}
		if(isset($_POST['description'])and $_POST['description'] !="") 	
		{	
			$description = $_POST['description'];
			//echo $description;
			//$requete = "UPDATE mrbs_asso SET description_asso ='".$description."' WHERE nom_asso="'.$nomAss.'";";
			$updateDesc = $connexion->exec("UPDATE mrbs_asso SET description_asso ='".$description."' WHERE nom_asso='".$nomAss."';");
		}
		if(isset($_POST['mail'])and $_POST['mail'] !="" )					
		{	
			$mail = $_POST['mail'];
			//echo $mail;
			$updateMail = $connexion->exec("UPDATE mrbs_asso SET email_asso ='".$mail."'WHERE nom_asso='".$nomAss."';");
		}
		if(isset($_POST['tel']) and $_POST['tel'] !="")					{
			$tel = $_POST['tel'];
			$updateTel = $connexion->exec("UPDATE mrbs_asso SET tel_asso ='".$tel."'WHERE nom_asso='".$nomAss."';");
		}
		if(isset($_POST['adresse'])and $_POST['adresse'] !="" )			{
			$adresse = $_POST['adresse'];
			$updateAdresse = $connexion->exec("UPDATE mrbs_asso SET rue_asso ='".$adresse."'WHERE nom_asso='".$nomAss."';");
		}
		if(isset($_POST['cp'])and $_POST['cp'] !="") 						
		{	
			$cp = $_POST['cp'];
			$updateCp = $connexion->exec("UPDATE mrbs_asso SET codepost_asso ='".$cp."'WHERE nom_asso='".$nomAss."';");
		}
		if(isset($_POST['1ville']) and $_POST['1ville'] !="")				
		{
			
			$ville = $_POST['1ville'];
			//echo $ville2; //decommenter pour voir si on passe dans la boucle
			$updateVille = $connexion->exec( "UPDATE mrbs_asso SET ville_asso ='".$ville."' WHERE mrbs_asso.nom_asso='".$nomAss."';") ;
			//echo $updateVille;
		}
		if (isset($_POST['image'])and $_POST['image'] !="") 				
		{
			$image = $_POST['image'];
			$updateImage = $connexion->exec("UPDATE mrbs_asso SET image_asso ='".$image."'WHERE nom_asso='".$nomAss."';");
		}
		if (isset($_POST['logo'])and $_POST['logo'] !="") 					
		{
			$logo = $_POST['logo'];
			$updateLogo = $connexion->exec("UPDATE mrbs_asso SET logo_asso ='".$logo."' WHERE nom_asso='".$nomAss."';");

		}//vérifie que les champs sont remplis


		?><h1> Les informations que vous avez saisies ont bien été prise en compte</h1><?php
		
	}

	else // tt est bon à partir d'ici
	{

			
			 $nomAsso = $_POST['nomAsso'];
			
				

			if($nomAsso == "-- Choisir une association --")
			{
				?>
				<div id="formulaire">

				<h1>Erreur vous n'avez pas choisit d'association</h1>

				<div id= "retour"><a href= "index.php ?menu=ges">Retour</a></div>
				</div>

				<?php
				
			}
			else
			{
				?>

				<?php include 'BDD/connectBdd.php';
				$req=('SELECT * FROM mrbs_asso WHERE nom_asso = "'.$nomAsso.'";') or die('Erreur SQL !'.$sql.'<br>'.mysql_error());;
				$res=$connexion->query($req);
				$res->setFetchMode(PDO::FETCH_OBJ);

						$donnees = $res->fetch();
						$reqid = $donnees->id_asso;
						$_POST['idAss'] = $reqid ;
						$reqDesc = $donnees->description_asso;
						$reqMail = $donnees->email_asso ;
						$reqTel = $donnees->tel_asso ;
						$reqRue = $donnees->rue_asso ;
						$reqVille =$donnees->ville_asso;
						$reqCp = $donnees->codepost_asso;
						$reqImage = $donnees->image_asso;
						$reqLogo = $donnees->logo_asso; ?> 



				
				<form action="index.php ?menu=modif" method="post">
				
				<div id="formulaire">
						
					



						<h1>Coordonnées :</h1>


						<p>Mail Association :</p>
						<input id="mail" type="email" name="mail" value="<?php echo $reqMail; ?>" class="champ" onkeyup="surveilleMail();"/>

						<p>Téléphone Association :</p>
						<input id="tel" type="text" name="tel" value="<?php echo $reqTel; ?>" class="champ" onkeyup="surveilleTel();"/>


						<p>Adresse Association :</p>
						<input id="adresse" type="text" name="adresse" value="<?php echo $reqRue; ?>" class="champ" />

						<p>Code Postal Association :</p>
						<input id="cp" type="text" name="cp" value="<?php echo $reqCp; ?>" class="champ" onkeyup="surveilleCp();"/>
						<p>Ville Association :</p>
						<input id="1ville" type="text" name="1ville" value="<?php echo $reqVille; ?>" class="champ" />

					</div>

					<div id="formulaire_nom">
						<input id="nomAss" type="text" readonly name="nomAss" value="<?php echo $nomAsso; ?>" />
	
					</div>

					<div id="formulaire">

						<h1>Description :</h1>
						<textarea id="description" type="text" name="description" value="" class="champ" ><?php echo $reqDesc; ?></textarea><br /><br />

					</div>
					

					<div id="formulaire">
						<h1>Autres</h1>

						<p>Image de l'association : <?php echo $reqImage; ?></p>
						<input type="file" name="image" value="" /> 
						<p>Logo de l'association : <?php echo $reqLogo; ?></p>
						<input type="file" name="logo" value=""/> 

					</div>
					<br />

					<div id="envoie_form">
							<input type="submit" value="Enregistrer" /></span> <!-- bouton pour s'inscrire -->

					</div>
				</form>

				
				</div>

				<?php
			}
	}
			?>
