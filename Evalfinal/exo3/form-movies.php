<?php

	require_once 'inc/connect.php'; // Récupération de $pdo (Instance de PDO)
	require_once 'inc/functions.php';

	// Récupération de tous les films
	$movies = getAllMovies($pdo);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ciné Phil</title>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<section id="list-movies">
		<ul>
		<?php foreach($movies as $movie) : ?>
			<li>
				<form action="#" method="POST">
					<button type="submit" name="add-view" value="<?= $movie['id'] ?>">Ajouter une vue</button>
					<?= $movie['title'] ?> (<i><?= $movie['genre_name'] ?></i>)
				</form>
			</li>
		<?php endforeach ?>
		</ul>
	</section>
	<section id="table-movies">
		
		<!-- Tableau de statistiques -->
<?php

$contenu = '';


$pdo = new PDO('mysql:host=localhost;dbname=exercice3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); 

$query = $pdo->prepare('SELECT * FROM movies ORDER BY nb_viewers, release_date desc limit 10'); 

$query->execute();  // on excute

// Affichage des liste de film dans la BDD en tableau HTML :

$contenu .= '<h1>Liste des Movies</h1>
			 <table border="2">';

		$contenu .= '<tr>
						<th>Nom du film</th>
						<th>Viewers</th>
						<th>Date de réalisation</th>
					</tr>';

// Boucle while qui parcourt l'objet $movie pour en faire faire un array associatif : 

while ($movies = $query->fetch(PDO::FETCH_ASSOC)){

		$contenu .= '<tr>
						<td>'. $movies['title'] .'</td>
						<td>'. $movies['nb_viewers'] .'</td>
						<td>'. $movies['release_date'] .'</td>
					</tr>';
	}	
	
$contenu .= '</table>';


echo $contenu;
?>
	</section>
</body>
</html>