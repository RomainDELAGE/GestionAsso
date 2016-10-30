
<html lang="fr">
 
	<head>
        <meta charset="utf-8" />
		<!--[if lt IE 9]>
             <script src="http://github.com/aFarkas/html5shiv/blob/master/dist/html5shiv.js"></script>
        <![endif]-->
		
		<!--<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>-->		<!-- Appel du fichier javascript-->
        <!--<script src="js/form.js" type="text/javascript"></script>-->
		
		<link rel="stylesheet" href="skin/maquette.css" media="screen" />
		
		<title>Formulaire</title>
    </head>
	
	<body>


		<?php

		if(isset($_SESSION['username']) ){

			$name = $_SESSION['username'];
			?>
		<div id="identif">
				<h2> Bonjour <?php echo $name; ?> vous êtes connecté sur votre profil. </h2>

				<div id="accueil">
					
					<p>
					Vous pouvez toujours consulter les pages de nos associations partenaires.
					</p>
							
					<p>
					Désormais accedez également à la gestion des associations ! 
					</p>
					
				</div>
		</div>
		<?php

		}


		else if(isset($_GET['session']) AND $_GET['session'] == "close" ){


			?>
				<div id="identif">
						<h2>Vous venez de vous déconnecter de votre session du site de la Maison des ligues </h2>

						<div id="accueil">
							
							<p>
							Vous pouvez consulter les pages de nos associations partenaires.
							</p>
									
							<p>
							Pour acceder à la gestion des associations il vous faudra toutefois vous identifier.
							</p>
							
						</div>
				</div>
		<?php
		}

		else
		{
		?>
		<div id="identif">
				<h2> Bienvenue sur le site de présentation des associations partenaires de la Maison des ligues </h2>

				<div id="accueil">
					
					<p>
					Vous pouvez dès à présent consulter les pages de nos associations partenaires.
					</p>
							
					<p>
					Pour accéder à la gestion des associations il vous faudra toutefois vous identifier.
					</p>
					
				</div>
		</div>
		<?php
		}
		
		?>


				
	</body>
	
</html>