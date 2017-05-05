<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	3- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

?>

<?php

			$message = '';

			$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

			if(!empty($_POST)) { // Si le formulaire est posté, il y a des indices dans $_post, il n'y a pas vide. 
           
        //  Controle du formulaire : 

		   if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) $message .= '<div>le prénom doit comporter au moins 2 cararactères</div>';

           if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $message .= '<div>le prénom doit comporter au moins 2 cararactères</div>';

           if(strlen($_POST['telephone']) < 10 || strlen($_POST['telephone']) > 20) $message .= '<div>le telephone doit comporter 10 caractères </div>';

     	   if (!(is_numeric($_POST['annee_rencontre']) && checkdate('01', '01', $_POST['annee_rencontre']))){ $message .= '<div>L\'année de rencontre n\'est pas valide</div>';}

		   if(($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact']!= 'professionnel' && $_POST['type_contact'] != 'autre')) $message .= '<div>Le type de contact doit être conforme</div>';
           
           if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $message .= '<div>email doit être valide</div>';  


		   if(empty($message)) {  

			$resultat = $pdo->prepare("INSERT INTO contact(prenom,nom,telephone,email,type_contact) VALUES(:prenom,:nom,:telephone,:email,:type_contact)");

			$resultat->bindParam('prenom', $_POST['prenom'] , PDO::PARAM_STR);
			$resultat->bindParam('nom',$_POST['nom'] , PDO::PARAM_STR);
			$resultat->bindParam('telephone', $_POST['telephone'], PDO::PARAM_STR);
			$resultat->bindParam('annee_rencontre',$_POST['annee_rencontre'] , PDO::PARAM_STR);
			$resultat->bindParam('email', $_POST['email'], PDO::PARAM_STR);
			$resultat->bindParam('type_contact', $_POST['type_contact'], PDO::PARAM_STR);

			$req = $resultat->execute();

          //   Afficher un message "Ajout ok"
          if($req) { // execute () ci-dessus renvoie true en cas de succées de la requête, sinon false. 
                  echo 'Ajout Ok';
          } else {
                  echo 'une erreur est survenue';
          }
       }
    }


?>


	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title>Contacts</title>
		</head>

		<body>
			
			<h3>Veuillez renseigner le formulaire pour vous inscire</h3>
				<?php echo $message ?>
				<form method="post" action="">
					<input type="hidden" name="id_contact" value=""><br><br>

					<label for="nom">Nom :</label><br>
					<input type="text" id="nom" name="nom" value=""><br><br>

					<label for="prenom">Prénom :</label><br>
					<input type="text" id="prenom" name="prenom" value=""><br><br>

					<label for="telephone">Téléphone :</label><br>
					<input type="text" id="telephone" name="telephone" value=""><br><br>

					<label for="annee_rencontre"> Année de rencontre :</label><br>
					<select name="annee_rencontre" id="annee_rencontre">
							<?php
							for($i=date('Y'); $i>=date('Y')-100; $i--) {
									echo "<option value=$i>$i</option>";
									} 
				?>
					</select><br><br>

					<label for="email">Email :</label><br>
					<input type="email" id="email" name="email" value=""><br><br>

					<label for="type_contact"> Type de contact :</label><br>
					<select name="type_contact" id="type_contact">
						<option value="NULL">--Selectionner--</option>
						<option value="ami">Ami</option>
						<option value="famille">Famille</option>
						<option value="professionnel">Professionnel</option>
						<option value="autre">Autre</option>
					</select><br><br>

					<input type="submit" name="inscription" value="s'inscrire" class="btn"><br><br>
				</form>
		</body>
	</html>
