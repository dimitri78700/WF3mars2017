<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".



*/


        $pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        $contenu ='';

			$envoi = $pdo->query("SELECT id_contact, nom, prenom, telephone FROM contact");

					echo '<table>';
						$contenu .= '<tr>
								<th>Nom </th>
								<th>Prénom </th>
								<th>Téléphone </th>
								<th>Infos </th
						      </tr>';

                while( $contact = $envoi->fetch(PDO::FETCH_ASSOC)){
						$contenu .= '<tr>';       
                               echo '<td>'. $contact['nom'] . '</td>';
                               echo '<td>'. $contact['prenom'] . '</td>';
                               echo '<td>'. $contact['telephone'] . '</td>';
                               echo '<td><a href="?id_contact='. $contact['id_contact'] .'"> Infos </a></td>';
							echo '</tr>';
				}
					 echo '</table>';

					
		$contenu ='';

		if(isset($_GET['id_contact'])){
	
				$query = $pdo->prepare('SELECT * FROM contact WHERE id_contact = :id_contact');
				$query->bindParam(':id_contact', $_GET['id_contact'], PDO::PARAM_INT);
				$query->execute();
				$contact = $query->fetch(PDO::FETCH_ASSOC);

		$contenu .= '<h1>Détail d\'un contact</h1>';
		if (!empty($contact)) {
			$contenu .= '<p>Nom : '. $contact['nom'] .'</p>';
			$contenu .= '<p>Prénom : '. $contact['prenom'] .'</p>';
			$contenu .= '<p>Téléphone : '. $contact['telephone'] .'</p>';
	}  else {
		$contenu .= '<div>Ce contact n\'existe pas</div>';
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste des contacts</title>
</head>
<body>
	<?php echo $contenu; ?>
</body>
</html>         
