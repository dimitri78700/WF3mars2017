<?php

$contenu = '';



// Connexion à la BDD exercice_3

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(isset($_GET['id_movie'])){
	
	$query = $pdo->prepare('SELECT * FROM movies WHERE id_movie = :id_movie');

	$query->bindParam(':id_movie', $_GET['id_movie'], PDO::PARAM_INT);

	$query->execute(); 

	
	
	$movie = $query->fetch(PDO::FETCH_ASSOC);


    // On affiche le contenu du film :

	$contenu .= '<h1>Détail du Film</h1>';
	if (!empty($movie)) {
		$contenu .= '<p>Titre : '. $movie['title'] .'</p>';
		$contenu .= '<p>Acteur : '. $movie['actors'] .'</p>';
		$contenu .= '<p>Réalisateur : '. $movie['director'] .'</p>';
		$contenu .= '<p>Producteur : '. $movie['producer'] .'</p>';
		$contenu .= '<p>Année de production : '. $movie['year_of_prod'] .'</p>';
		$contenu .= '<p>Langue : '. $movie['language'] .'</p>';
		$contenu .= '<p>Category : '. $movie['category'] .'</p>';
		$contenu .= '<p>Synopsis : '. $movie['storyline'] .'</p>';
		$contenu .= '<p>Lien video : '. $movie['video'] .'</p>';
	} else {
		$contenu .= '<div>Ce film n\'existe pas</div>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste des films</title>
</head>
<body>
	<?php echo $contenu; ?>
</body>
</html>
