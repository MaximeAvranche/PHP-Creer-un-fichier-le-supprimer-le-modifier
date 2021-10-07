<?php
/**
 *
 * >> Ce code vous est proposé par Maxime Avranche <<
 * >> https://www.prestarvor.com/ <<
 * >>> Lien GitHub : https://github.com/MaximeAvranche/PHP-Creer-un-fichier-le-supprimer-le-modifier
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
    	$contenu = nl2br($_POST['content']);	// Variable texte qu'on affichera dans le fichier créé - nl2br permet de garder les espaces et retours à la ligne

    		// On vérifie le fichier existe sur le répertoire de notre serveur.
	    	if (file_exists($nameFile) == true) {
	    		echo "<center><FONT color='red'>Le fichier <strong><em>".$nameFile."</em></strong> existe déjà. Vous ne pouvez pas le recréer.</FONT></center>";
	    	}
	    	// Si le fichier n'existe pas on le créé
	    	else {
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
				echo '<center><FONT color="gree">Le fichier <strong>'.$nameFile.'</strong> vient d\'être créé avec succès <br /><a href="index.php">Recharger la page</a></FONT></center>';
		    }
    }
    else {
    	echo "Merci de remplir tous les champs.";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Créer un fichier</title>
</head>
<body>
	<h3>Cette page permet de créer un fichier en .php</h3>
	<form method="POST">
		<legend>Titre de la page</legend>
		<input type="text" name="titre" required="">
		<legend>Contenu</legend>
		<textarea name="content" required=""></textarea>
		<br /><br />
		<input type="submit" name="send">
	</form>
	<center><a href="supprimer.php">Je veux supprimer un fichier</a></center>
</body>
</html>