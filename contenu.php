<?php


if (isset($_GET['menu'])) // on s'assure que les parametres envoyés dans la variables menu existent
	{
		if ($_GET['menu']=="accueil") {include ('accueil.php');} //on inclue la page correspondante en fonction du paramètre envoyé
		else if ($_GET['menu']=="assoc") {include ('assoc.php ');}
		else if ($_GET['menu']=="det") {include ('detail_asso.php');}
		else if ($_GET['menu']=="ges") {include ('choix_asso.php');}
		else if ($_GET['menu']=="modif") {include ('modif_asso.php');}
		else if ($_GET['menu']=="gesuser") {include ('à faire.php');}
		else if ($_GET['menu']=="identification") {include ('index2.php');}
	}
else
	{
		include ('accueil.php');
	}

?>