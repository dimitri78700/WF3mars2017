<?php

        $message = '';

        $pdo = new PDO('mysql:host=localhost;dbname=exercice2', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        if(!empty($_POST)) { // Si le formulaire est posté, il y a des indices dans $_post, il n'y a pas vide. 
           
        //  Controle du formulaire : 

           if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .= '<div>le nom doit comporter au moins 3 cararactères</div>';

           if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .= '<div>le prénom doit comporter au moins 3 cararactères</div>';

        
           if(strlen($_POST['password']) < 3 || strlen($_POST['password']) > 20) $message .= '<div>le prénom doit comporter au moins 3 cararactères</div>';

           if($_POST['type'] != 'eleve' && $_POST['type'] != 'formateur') $message .= '<div>le type n\'est pas correct</div>';
            
           if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL )) {
                    echo 'Cette email est pas bon .';
                } 

          if(empty($message)) {  

          foreach($_POST as $indice => $valeur){
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); 
		        }

        // ---------------------------------------

            if(empty($message)) {  // si les messages sont vides, c'est qu'il n'y a pas d'erreur. 

           $resultat = $pdo->prepare("INSERT INTO employes(nom, prenom, email, password, type]) VALUES(:nom,:prenom,:email,:password,:type)");

            $resultat->bindParam(':nom', $_POST['nom'] , PDO::PARAM_STR);
            $resultat->bindParam(':prenom',$_POST['prenom'] , PDO::PARAM_STR);
            $resultat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $resultat->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
            $resultat->bindParam(':type',$_POST['type'] , PDO::PARAM_STR);
           
            $req = $resultat->execute();

            // Afficher un message "Ajout ok"
            if($req) { // execute () ci-dessus renvoie true en cas de succées de la requête, sinon false. 

                   echo 'Ajout Ok';
            } else {
                    echo ' une erreur est survenue';
            }

        }
     }
   }
?>