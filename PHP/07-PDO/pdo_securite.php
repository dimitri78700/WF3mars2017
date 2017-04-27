<?php

    echo '<h2>Cas pratique : un espace de commentaire : </h2>';

// ----------------------
//  Cas pratique : un espace de commentaire
// ----------------------

/*
    Objectif : nous allons créer un espace de commentaire types avis ou livres d'or.
    
    Modélisation de la BDD "dialogue" : 
            Table : commentaire
            Champs : id_commentaire       INT(3) PK AI
                     pseudo               VARCHAR (20)
                     message              TEXT
                     date_enregistrement  DATETIME

*/

//  II. Connexion à la BDD et traitement du post :

     $pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

     if(!empty($_POST)){

            // Traitement contre les failles XSS ( injection JS ) ou les injections CSS : on parle d'échappement des données reçues :
            // Pour l'exemple on va injecter dans le champs message, le code suivant <style>body{display:none}</style>

            // Et pour un autre exemple le code JS suivant :
            // <script></script>while(true){alert('vous êtes bloqué...');}</script>

            $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
            $_POST['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);
            // htmlspecialchars convertit les caractères spéciaux (<,>, ', ", &') en entités HTML (par exemple < devient &lt;), ce qui permet de rendre inoffensives les balises HTML. 
            // ENT_QUOTES permet d'ajouter les quotes à la liste des caractères convertis

            // En complément 
            $_POST['message'] = strip_tags($_POST['message']); // Permet de suppr toutes les balises HTML. 

            // htmlentities() permet lui aussi de convertir les balises HTML en entité HTML. 

            // 1- Nous allons faire une 1ère requête qui n'est pas protégée contre les injections et qui n'accepte pas les apostrophes :
            // $r = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message)VALUES('$_POST[pseudo]', NOW(), '$_POST[message]')");

            // 2- Nous allons faire une injection SQL : dans le champs message saisir OK'); DELETE FROM commentaire; (

            // Pour se prémunir des injections SQL et pouvoir mettre des apostrophes, nous pouvons faire une requête préparée :

            $stmt = $pdo->prepare( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)" );

            $stmt->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $stmt->bindParam(':message', $_POST['message'], PDO::PARAM_STR);

            $stmt->execute();



     } // FIN DU if(!empty($_POST)) 


?>


<!--I. Formulaire de saisie du message -->
<form method="post" action="">

    <label for="pseudo">Pseudo : </label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="message">Message : </label><br>
    <textarea name="message" id="message"></textarea><br><br>

    <input type="submit" name="envoi" value="envoi">

</form>


<?php

//  III. Affichage des messages contenus en BDD :
    $resultat = $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d-%m-%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC"); 

    echo '<h3>' . $resultat->rowCount() . ' commentaire(s) </h3>';

    while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo'<div>';
            echo ' <p>Par ' . $commentaire['pseudo'] . ' le ' . $commentaire['datefr'] . ' à ' .$commentaire['heurefr'] . '</p>';
            echo '<p>' . $commentaire['message'] . '</p>';
        echo'</div><hr>';

    }


?>