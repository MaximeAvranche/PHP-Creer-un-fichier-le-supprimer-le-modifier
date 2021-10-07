<?php
/**
 *
 * >> Ce code vous est proposé par Maxime Avranche <<
 * >> https://www.prestarvor.com/ <<
 * >>> Lien GitHub : https://github.com/MaximeAvranche/PHP-Creer-un-fichier-le-supprimer-le-modifier 
 * 
**/
/** CREATION D'UN FICHIER PHP & ECRITURE **/
  ?>
 
  <?php
  
  if (isset($_POST['send'])) {
  	$nameFile = $_POST['titre'];
  	$homepage = file_get_contents($nameFile);
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Créer un fichier</title>
</head>
<body>
	<h3>Cette page permet d'afficher le contenu d'une page</h3>
		<form method="POST">
			<legend>Titre de la page</legend>
			<input type="text" name="titre" required="">
			<br /><br />
			<input type="submit" name="send">
		</form>
		<textarea> <?php echo $homepage; ?></textarea>
	<?php echo $homepage; ?>
</body>
</html>