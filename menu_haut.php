
<?php
		session_start();
?>

<html>

	<div id= "menu">

		<dl>
			<dt><a href="?menu=accueil">M2L Intranet</a></dt>
		</dl>

		<dl>
			<dt><a href="?menu=assoc">Sites des associations</a></dt>
			<dd>
				<ul>
					<li>
						<?php // plus optimisié mais ERREUR
						//include 'BDD/connectBdd.php';

						//$resultats=$connexion->query("SELECT distinct type_asso FROM mbrs_asso ORDER BY 1 ASC");
						//$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
						//while( $ligne = $resultats->fetch() ) // on récupère la liste des themes
						//{
						//	echo '<a href="?menu=assoc&filtre='.$ligne->type_asso.'" >Associations'.$ligne->type_asso.'</a>'; // on affiche les consoles sous forme de liens
						//}
						//$resultats->closeCursor(); // on ferme le curseur des résultats
						?>
						<a href="?menu=assoc&filtre=sport" >Associations sportives</a>
						<a href="?menu=assoc&filtre=serv" >Associations de services</a>
						<a href="?menu=assoc&filtre=lobi" >Associations politiques</a>

					</li>
				</ul>
			</dd>
		</dl>

		<?php
		if(isset($_SESSION['level']) AND $_SESSION['level'] > 0 )
		{
		?>

				<dl>
					<dt><a href="?menu=ges">Gestion des associations</a></dt>

					<dd>
						<ul>
							<li>
								<a href="?menu=ges">Modifier une page d'association</a>
								<?php
								if(isset($_SESSION['level']) AND $_SESSION['level'] > 1)
								{
									 ?><a href="?menu=gesuser">Gestion des utilisateurs</a><?php
								}

								?>
							</li>
						</ul>
					</dd>
				</dl>

		<?php
		}

		if(isset($_SESSION['username']) )
		{
		?>

				<dl>
					<dt><a href="index.php ?menu=accueil&session=close">Déconnexion</a></dt>
				</dl>

		<?php
		}
		else
		{
				?>

				<dl>
					<dt><a href="?menu=identification">S'identifier</a></dt>
				</dl>

		<?php
		}

		?>

		

	</div>





</html>