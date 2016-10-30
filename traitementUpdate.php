<?php
	include 'BDD/connectBdd.php';?>

<?php $description = $_POST['description']; ?>
<?php $mail = $_POST['mail']; ?>
<?php $tel = $_POST['tel']; ?>
<?php $adresse = $_POST['adresse']; ?>
<?php $cp = $_POST['cp']; ?>
<?php $ville = $_POST['ville']; ?>
<?php $image = $_POST['image']; ?>
<?php $logo = $_POST['logo']; ?>


<?php $updateDesc = $connexion->exec('UPDATE mrbs_asso SET description_asso ='.$description.';') ?>
<?php $updateMail = $connexion->exec('UPDATE mrbs_asso SET email_asso ='.$mail.';') ?>
<?php $updateTel = $connexion->exec('UPDATE mrbs_asso SET tel_asso ='.$tel.';') ?>
<?php $updateAdresse = $connexion->exec('UPDATE mrbs_asso SET rue_asso ='.$adresse.';') ?>
<?php $updateCp = $connexion->exec('UPDATE mrbs_asso SET codepost_asso ='.$cp.';') ?>
<?php $updateVille = $connexion->exec('UPDATE mrbs_asso SET ville_asso ='.$ville.';') ?>
<?php $updateImage = $connexion->exec('UPDATE mrbs_asso SET image_asso ='.$image.';') ?>
<?php $updateLogo = $connexion->exec('UPDATE mrbs_asso SET logo_asso ='.$logo.';') ?>
