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

        $message = '';

        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        if(!empty($_POST)) { // Si le formulaire est posté, il y a des indices dans $_post, il n'y a pas vide. 
           
        //  Controle du formulaire : 

           if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .= '<div>le prénom doit comporter au moins 3 cararactères</div>';

           if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .= '<div>le prénom doit comporter au moins 3 cararactères</div>';

           if($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f') $message .= '<div>le sexe n\'est pas correct</div>';

           if(strlen($_POST['service']) < 3 || strlen($_POST['service']) > 20) $message .= '<div>le service doit comporter 3 caractères </div>';

           $tab_date = explode('-', $_POST['date_embauche']);  // met le jour, le mois et l'année dans un array pour pouvoir les passer à la fonction checkdate ($mois,$jour,$annee). 

           if(!(isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate ($tab_date[1], $tab_date[2], $tab_date[0]) ) ) $message .= '<div>date pas valide</div>';  
           

           if(!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .= '<div>le salaire doit être supérieur à 0</div>';  // is_numeric teste si c'est un nombre. 
 
        // ---------------------------------------

            if(empty($message)) {  // si les messages sont vides, c'est qu'il n'y a pas d'erreur. 
           $resultat = $pdo->prepare("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom,:nom,:sexe,:service,:date_embauche,:salaire)");

            $resultat->bindParam('prenom', $_POST['prenom'] , PDO::PARAM_STR);
            $resultat->bindParam('nom',$_POST['nom'] , PDO::PARAM_STR);
            $resultat->bindParam('sexe', $_POST['sexe'], PDO::PARAM_STR);
            $resultat->bindParam('service', $_POST['service'], PDO::PARAM_STR);
            $resultat->bindParam('date_embauche',$_POST['date_embauche'] , PDO::PARAM_STR);
            $resultat->bindParam('salaire', $_POST['salaire'], PDO::PARAM_INT);

            $req = $resultat->execute();

            // Afficher un message "Ajout ok"
            if($req) { // execute () ci-dessus renvoie true en cas de succées de la requête, sinon false. 
                    echo 'Ajout Ok';
            } else {
                    echo ' une erreur est survenue';
            }
        }
    }

?>
<h1>Enregistrement de l'employé</h1>

<?php echo $message; ?>

    <form action="" method="post">

            <label for="prenom">Prenom : </label>
            <input type="text" id="prenom" name="prenom"><br>

            <label for="nom">Nom : </label>
            <input type="text" id="nom" name="nom"><br>

            <label for="sexe">Sexe : </label>
            <input type="radio" id="sexe" name="sexe" value="f"><label for="sexe">Femme</label>
            <input type="radio" id="sexe" name="sexe" value="m" checked><label for="sexe">Homme</label><br>

            <label for="service">Service : </label>
            <input type="text" id="service" name="service"><br>

            <label for="date_embauche">date d'embauche : </label>
            <input type="text" id="date_embauche" name="date_embauche"><br>

            <label for="salaire">Salaire: </label>
            <input type="number" id="salaire" name="salaire"><br>

            <input type="submit" name="validation" value="envoyer">
    </form>