<html>
<body>
<?php

		$logo = $_GET['logo'];

		$req="SELECT image_asso as image, logo_asso as logo, nom_asso as Nom,description_asso as Description, email_asso as AdresseMail,tel_asso as Telephone,rue_asso as Rue,codepost_asso as CP, ville_asso as Ville from mrbs_asso where id_asso = ".$logo." ";
		$res=$connexion->query($req);
		$res->setFetchMode(PDO::FETCH_OBJ);


		while($donnees = $res->fetch())
		{ 
			?>

			<div id= "affiche_assoc">


				<div id="image">
				 	<?php echo '<img src=images/'.$donnees->image.' >'; ?>
				 

					

					<div id="nom1">
					 	<h3> <?php echo "$donnees->Nom" ?></h3>
					</div>

					<div id="logo">
					  	<?php echo '<img src=images/'.$donnees->logo.' >'; ?>
					</div>

				</div>

				 <div id ="desc1" >
				 	<h2> Description :</h2>
				 	<p> <?php echo "$donnees->Description" ?> </p>
				 </div>
				 <br/>

				 <div id ="contact" >
					 <h2> Contact : </h2>
					 <div id="mail">
					 <p> <?php echo "$donnees->AdresseMail" ?> </p>
					 </div>

					 <div id="tel">
					 <p> Téléphone : <?php echo "$donnees->Telephone" ?> </p>
					 </div>

					 <div id="adresse">

					 <p> Adresse : <?php echo "$donnees->Rue $donnees->CP $donnees->Ville" ?> </p>
					 </div>

				 </div>

				 <div id= "affiche_assoc_retour">
				 		<a href= "index.php ?menu=assoc">Retour</a>
				 </div>

			 </div>

			 <?php
		}
		?>
</html>
</body>