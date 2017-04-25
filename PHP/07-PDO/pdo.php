<?php

// ************************************
//   PDO
// ************************************

        echo '<h1> PDO  </h1>';

    // l'Extention PHP date Object (PDO) définit une interface pour accéder à une base de données depuis PHP. 

// 01. Connexion //


            echo '<h2>01. Connexion </h2>';

    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    // $pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la BDD. 
    /* Les arguments passés à PDO :

            - driver + serveur + nom de la base de données
            - pseudo du SGBD
            - mdp du SGBD
            - options : option 1 pour générer l'affichage des erreur, option 2 = commande à exécuter lors de la         connexion au serveur qui définit le jeu de caractères des échanges avec la BDD'


    */

    print_r($pdo);
    echo '<pre>'; print_r(get_class_methods($pdo)); echo '<pre>';  // Permet d'afficher les méthodes disponibles dans l'objet $pdo



// 02. Exec() avec INSERT, UPDATE et DELETE //


    echo '<h2>02. Exec() avec INSERT, UPDATE et DELETE</h2>';
    
    // $resultat = $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");

    // exec() est utilisé pour formuler des requtes ne retournant pas de jeu de resultats : INSERT, UPDATE et DELETE

    // Valeur de retour :  succés : un integer correspondant au nombre de lignes afféctées, Echec : false. 

    // echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
    echo 'dernier id généré : ' . $pdo->lastInsertId();

    // -------

    $resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
    echo "Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";

// 03. query() avec SELECT + fetch //

     echo '<h2>03. query() avec SELECT + fetch </h2>';

     $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");

    //  Avec query : $result est un objet issus de la classe prédéfinie PDOStatement

    /*
        Au contraire d'exec(), query() est utilisé pour la formulation de requêtes retournant un ou plusieurs résultats : SELECT. 

        Valeur de retour :
            Succés : Objet PDOstatement 
            Echec : false

        Notez qu'avec query, on peut aussi utiliser INSERT, DELETE et UPDATE. 
    */

      echo '<pre>'; print_r($result); echo '<pre>'; 

      echo '<pre>'; print_r(get_class_methods($result)); echo '<pre>'; // On voit les nouvelles méthodes de la classe PDOstatement.  

     // $result constitue le résultat de la requete sous forme inexploitable directement : il faut donc le transformer par la méthode fetch() : 

     $employe = $result->fetch(PDO::FETCH_ASSOC);  // la methode fetch () avec le paramétre PDO::FETCH_ASSOC permet de transformer l'objet $result en un array associatif exploitable indéxé avec le nom des champs de la requetes. 

     echo '<pre>'; print_r($employe); echo '<pre>'; 
     echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";


     // Ou encore faire un fetch selon l'une des methodes suivantes :

     $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
     $employe = $result->fetch(PDO::FETCH_NUM);  // pour obtenir un array indexé numériquement
     echo '<pre>'; print_r($employe); echo '<pre>'; 
     echo $employe[1]; // on accède au prenom par l'indice 1 de l'array $employe. 


     //---

     $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
     $employe = $result->fetch(); // pour un mélange de fetch_assoc et fetch_num 
     echo '<pre>'; print_r($employe); echo '<pre>'; 

     //---

     $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
     $employe = $result->fetch(PDO::FETCH_OBJ); // retourne un nouvel objet avec les noms de champs comme propriété (=attribut) public
     echo '<pre>'; print_r($employe); echo '<pre>';
     echo $employe->prenom; // affiche la valeur de la propriété prenom de l'objet $employe 


    //  Attention il faut choisir l'un des fetch que vous voulez exécuter sur un jeu de de résultats, vous ne pouvez pas faire plusieurs fetch sur le même résultat n'en contenant qu'une seule. En effet, cette méthode déplace un curseur de lecture sur le resultat suivant contenu dans le jeu résultat : ainsi , quand on en a qu'un seul, on sort du jeu. 

    // EXERCICE : afficher le service de l'employer laura selon deux methode differente de votre choix

     $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'laura'");
     $employe = $result->fetch(PDO::FETCH_NUM); 
     echo '<pre>'; print_r($employe); echo '<pre>'; 
     echo $employe[4];

     echo '<br>';
     
     $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'laura'");
     $employe = $result->fetch(PDO::FETCH_ASSOC);
     
     echo "Bonjour je suis du service $employe[service] <br>";
    
