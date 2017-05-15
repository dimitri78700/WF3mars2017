<?php


$contenu = '';

// Connexion à la BDD exercice_3

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); 

$query = $pdo->prepare('SELECT * FROM movies'); 

$query->execute();  // on excute

// Affichage des liste de film dans la BDD en tableau HTML :

$contenu .= '<h1>Liste des films</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom du film</th>
						<th>Réalisateur</th>
						<th>L\'année de production</th>
						<th>Autres infos</th>
					</tr>';

 // Boucle while qui parcourt l'objet $movie pour en faire faire un array associatif : 

while ($movie = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $movie['title'] .'</td>
						<td>'. $movie['director'] .'</td>
						<td>'. $movie['year_of_prod'] .'</td>
						<td>
							<a href="exo3_3.php?id_movie='. $movie['id_movie'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}			
			
$contenu .= '</table>';

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