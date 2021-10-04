<?php
/**
 *
 * >> Ce code vous est proposé par Maxime Avranche <<
 * >> https://www.prestarvor.com/ <<
 * >>> Lien GitHub : https://github.com/MaximeAvranche/PHP-Creer-un-fichier/ 
 * 
**/
/** CREATION D'UN FICHIER PHP & ECRITURE **/
    if (isset($_POST['send']) AND !empty($_POST['titre']) AND !empty($_POST['content'])) {
    	// Nom du fichier
    	$nameFile = strtolower($_POST['titre']);
    	// On retire les accents : Plus sécurisé 
    	$nameFile = preg_replace('`[^a-z0-9]+`', '-', $nameFile);
    	// On remplace les espaces par des tirets
    	$nameFile = trim($nameFile, '-');
    	// On renomme le fichier avec l'extension souhaitée .php
    	$nameFile = $nameFile.'.php';
    	
    	// Autres variables
    	$title = $_POST['titre'];	// Titre de la page qui servira d'URL (comme WordPress le fait par exemple)
    	$contenu = $_POST['content'];	// Variable texte qu'on affichera dans le fichier créé

    	// Contenu du fichier en cours d'édition
    	$content = '
    	<!DOCTYPE html>
			<html>
			<head>
			    <meta charset="utf-8">
			    <title>Test</title>
			</head>
			<body>
				<center><strong>'.$contenu.'</strong></center>
			</body>
			</html>
    	';

    	// Création du fichier
    	$newFile = fopen($nameFile, "x+");
    	// Ecriture dans le fichier
    	fputs($newFile, $content);
    	// Fermeture de l'édition du fichier
    	fclose($newFile);   
    	// Une fois le fichier créé, on affiche un message de succès
		echo 'Le fichier '.$nameFile.' vient d\'être créé avec succès <br /><a href="index.php">Recharger la page</a>';
    }
    else {
    	echo "Une erreur est survenue.";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test</title>
</head>
<body>
	<form method="POST">
		<legend>Titre</legend>
		<input type="text" name="titre">
		<legend>Contenu</legend>
		<textarea name="content"></textarea>
		<br /><br />
		<input type="submit" name="send">
	</form>
</body>
</html>