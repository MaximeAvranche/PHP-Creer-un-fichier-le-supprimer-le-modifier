<?php
/**
 *
 * >> Ce code vous est proposé par Maxime Avranche <<
 * >> https://www.prestarvor.com/ <<
 * >>> Lien GitHub : https://github.com/MaximeAvranche/PHP-Creer-un-fichier-et-en-supprimer-en-fonction-d-une-extension 
 * 
**/
/** AFFICHER LE CONTENU D'UNE PAGE **/
  ?>
 
  <?php
  // Quand le formulaire est rempli et le bouton pressé 
  if (isset($_POST['afficher'])) {
  	// On définit le lien vers le fichier
  	$nameFile = $_POST['link'];
  	// On renomme le fichier en php
  	$nameFile = $nameFile.".php";

  	  // Contenu du fichier à afficher si on affiche un fichier entier (peu conventionnel car affiche toutes les balises)
  	 // Pratique si vous souhaitez afficher un contenu txt, donc peu utilisé voir, inutile
    // $content = file_get_contents($nameFile);

    /**
    * On sélectionne en base le contenu stocké 
    * On doit donc se connecter à la base de données
    **/

    // Connexion à la base de données avec PDO
    $db = new PDO('mysql:host=localhost;dbname=bdd', 'root', '');
    // Requête pour sélectionner les données en base
    $selection = $db->prepare('SELECT content, link FROM contenu WHERE link = ?');
    // On cherche à afficher le contenu 'content' de la base de données 'contenu' où le lien 'link' = le nom du ficher
    $selection->execute(array($nameFile));
    // Une fois les données sélectionnées, on va les afficher
    $affichage = $selection->fetch();
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Afficher le contenu d'un fichier</title>
</head>
<body>
	<h3>Cette page permet d'afficher le contenu d'une page</h3>
		<form method="POST">
			<legend>Titre de la page / Lien sans l'extension</legend>
			<input type="text" name="link" required="">
			<br /><br />
			<input type="submit" name="afficher">
		</form>
		<textarea> <?php echo $affichage['content']; ?></textarea>

</body>
</html>