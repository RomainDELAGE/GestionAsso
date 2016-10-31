<?php
	include 'connectBdd.php';
echo "avant";
	if (isset($_POST['nom']) and ($_POST['description']) and ($_POST['mail']) and ($_POST['tel']) and ($_POST['adresse']) and ($_POST['cp']) and ($_POST['ville']) and ($_POST['image']) and ($_POST['logo'])) //vérifie que les champs sont remplis
	{
echo "coucou";
		$nom = $_POST['nom'];	//attribue le champ à la variable
		$description = $_POST['description'];
		$mail = $_POST['mail'];
		$tel = $_POST['tel'];
		$adresse = $_POST['adresse'];
		$cp = $_POST['cp'];
		$ville = $_POST['ville'];
		$image = $_POST['image'];
		$logo = $_POST['logo'];

		$req = "INSERT INTO mrbs_asso(description_asso, email_asso, tel_asso, rue_asso, codepost_asso, ville_asso, image_asso, logo_asso)
		VALUES ('".$nom."', '".$description."', '".$mail."', '".$tel."', '".$adresse."', '".$cp."', '".$ville."', '".$image."', '".$logo."');";

		$resultat= $connexion->query($req) or die('Erreur SQL !'.$req.'<br />'.mysql_error());
	}
?>
