<?php

// Exercice :
// Principe : créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entreprise
    /*
    les étapes :
        1- création du formulaire 
        2- Connexion à la BDD
        3- Lorsque le formulaire est posté, insertion des infos du formulaire en BDD, faites-le avec une requête préparée.
        4- Afficher à la fin un message "l'employé a bien été ajouté". 
    */

     $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

     $form = $pdo->prepare("SELECT * FROM employes");

     if(!empty($_POST)) { 

            ("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES( 'prenom','nom','sexe','service','dateembauche','salaire'"));


            $resultat->bindParam('prenom', $_POST['prenom'] , PDO::PARAM_STR);
            $resultat->bindParam('nom',$_POST['nom'] , PDO::PARAM_STR);
            $resultat->bindParam('sexe', $_POST['sexe'], PDO::PARAM_STR);
            $resultat->bindParam('service', $_POST['service'], PDO::PARAM_STR);
            $resultat->bindParam('dateembauche',$_POST['dateembauche'] , PDO::PARAM_STR);
            $resultat->bindParam('salaire', $_POST['salaire'], PDO::PARAM_STR);
            $resultat->execute();

     }

?>

    <form action="" method="post">

            <label for="prenom">Prenom : </label>
            <input type="text" id="prenom" name="prenom"><br>

            <label for="nom">Nom : </label>
            <input type="text" id="nom" name="nom"><br>

            <label for="sexe">Sexe : </label>
            <input type="radio" id="f" name="sexe"><label for="sexe">Femme</label>
            <input type="radio" id="m" name="sexe"><label for="sexe">Homme</label><br>

            <label for="service">Service : </label>
            <input type="text" id="service" name="service"><br>

            <label for="dateembauche">date d'embauche : </label>
            <input type="text" id="dateembauche" name="dateembauche"><br>

            <label for="salaire">Salaire: </label>
            <input type="number" id="salaire" name="salaire"><br>

            <input type="submit" name="validation" value="envoyer">
    </form>