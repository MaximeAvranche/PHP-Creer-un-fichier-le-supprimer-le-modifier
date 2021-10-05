<?php
/**
 *
 * >> Ce code vous est proposé par Maxime Avranche <<
 * >> https://www.prestarvor.com/ <<
 * >>> Lien GitHub : https://github.com/MaximeAvranche/PHP-Creer-un-fichier-et-en-supprimer-en-fonction-d-une-extension
 * 
**/
/** SUPPRESSION D'UN FICHIER DANS UN REPERTOIRE DEFINI **/
    if (isset($_POST['destroy'])) {
    	// Nom du fichier AVEC l'extension php (on se préocupe pas des autres fichiers)
    	$nameFile = $_POST['file'];
    	// Le nom du fichier est passé en minuscule
    	$nameFile = strtolower($nameFile);
    	// Tout ce qui est différent des lettres ou des chiffres est remplacé par un tiret (on vise les espaces)
    	$nameFile = preg_replace('`[^a-z0-9]+`', '-', $nameFile);
    	// On remplace les espaces par des tirets
    	$nameFile = trim($nameFile, '-');
    	// Ajout de l'extension du fichier
    	$nameFile = $nameFile.".php";

	    	// On vérifie le fichier existe sur le répertoire de notre serveur.
	    	if (file_exists($nameFile) == false) {
	    		echo "<center><FONT color='red'>Le fichier <strong><em>".$nameFile."</em></strong> n'existe pas. Veuillez vous référer au répertoire affiché ci-dessous.</FONT></center>";
	    	}

	    	else {
	    	// On supprime le fichier indiqué
	    	unlink($nameFile);

	    	// Une fois le fichier supprimé, on affiche un message de succès
			echo '<center><FONT color="green">Le fichier <strong>'.$nameFile.'</strong> vient d\'être supprimé avec succès <br /><a href="supprimer.php">Recharger la page</a></FONT></center>';
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
    <title>Supprimer un fichier</title>
</head>
<body>
	<h3>Cette page permet de supprimer un fichier php créé en amont</h3>
	<form method="POST">
		<legend>Nom de la page à supprimer (sans l'extension)</legend>
		<input type="text" name="file">
		<br /><br />
		<input type="submit" name="destroy">
	</form>
	<h1>Contenu du répertoire</h1>
	<?php  
	/**
	*
	* Dans le cas présent, nous ne prenons pas en compte les dossiers. 
	* Pour supprimer un dossier ou un fichier autre que .php, il suffit de supprimer l'extension .php ou rajouter des extensions souhaitées
	*
	**/
		// On ouvre le répertoire sélectionné et on tri chaque résultat en fichier
		foreach (new DirectoryIterator('./') as $fileInfo) {
			// On vérifie si il s'agit bien d'un DOSSIER ou d'un FICHIER
		    if($fileInfo->isDot()) continue;
		    // On affiche le contenu du répertoire 
		    echo $fileInfo->getFilename() . "<br>\n";
		}
	?>
</body>
</html>