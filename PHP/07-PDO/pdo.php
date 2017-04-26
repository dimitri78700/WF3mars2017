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



// 04. While et fetch_assoc //

        echo '<h2> 04. While et fetch_assoc </h2>';


        $resultat = $pdo->query("SELECT * FROM employes");
        
        echo 'nombre d\'employés : ' . $resultat->rowCount() . '<br>';  // Permet de compter de nombre de lignes retournées par la requête

        while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){ // Fetch retourne la ligne suivante du jueu de résultat en array associatif. La boucle WHILE permet de faire avancer le curseur dans le jeu de resultats, et s'arrete quand il est à la fin des resultats.

             // echo '<pre>'; print_r($contenu); echo '<pre>'; // on voit que $contenu est un array associatif qui contient les données de chaque ligne du jeu de résultats. Les nom des indices correspondent aux noms des champs. 

             echo '----------<br>';
             echo $contenu['id_employes'] . '<br>';
             echo $contenu['prenom'] . '<br>';
             echo $contenu['nom'] . '<br>';
             echo $contenu['nom'] . '<br>';
             echo $contenu['service'] . '<br>';
             echo '----------<br>';
        }

        // Quand vous faites une requête qui ne sort qu'un seul resultat : pas de boucle WHILE, mais un fetch seul.
        
        // Quand vous avez plusieurs résultats dans la requête : on fait une boucle WHILE pour parcourir tous les resultats. 



// 05. fetchAll //

        echo '<h2> 05. fetchAll </h2>';

        $resultat = $pdo->query("SELECT * FROM employes");

        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC); // retourne toutes les lignes de résultats dans un tableau multidimmensionel sans faire de boucle : vous avez un array associatif à chaque indice numérique. Marche aussi avec FETCH_NUM

        // echo '<pre>'; print_r($donnees); echo '<pre>';

        // Pour lire le contenu d'un array multidimmensionel, nous faisons des boucles foreach imbriquées : 
        
        echo '<strong>Double boucle foreach</strong>';

        foreach ($donnees as $contenu){  // $contenu est un sous array assiociatif 
            foreach ($contenu as $indice => $valeur){  // On parcourt donc chaque sous array
                echo $indice . ' correspont à ' . $valeur . '<br>';
            }
            echo '---------<br>';
        }



// Exercice : 

        echo '<h2> 06. Exercice </h2>';

        // Afficher la liste des bases de données présentent sur votre SGBD dans une liste <ul><li>. 
        // Pour mémoire; la requête SQL est show database.

        echo '<ul>';

        $resultat = $pdo->query("SHOW DATABASES");
        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);

        foreach ($donnees as $contenu){  
            foreach ($contenu as $indice => $valeur){  
                echo '<li>' . $indice . ' correspont à ' . $valeur . '</li>' . '<br>';
            }
            echo '---------<br>';
        }
        echo '</ul>';

        // -------

        echo '<ol>';
        $resultat = $pdo->query("SHOW DATABASES");

        while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){ 
            echo  '<li>' . $contenu['Database'] . '</li>';
        }
        echo '</ol>';



// 07. Table HTML //  // notions importantes à apprendre //

        echo '<h2> 07. Table HTML </h2>';

         $resultat = $pdo->query("SELECT * FROM employes");

         echo '<table border ="1">';

            echo '<tr>';
                for($i = 0; $i < $resultat->columnCount(); $i++){
                    echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '<pre>'; // Pour voir ce que retourne la méthode getColumnMeta() : un array avec nottament l'indice name qui contient le nom de champs. 

                    $colonne = $resultat->getColumnMeta($i);  // $colonne est un array qui contient l'indice name 
                    echo '<th>' . $colonne['name'] . '</th>'; // l'indice name contient le nom du champs 
                }
            echo '</tr>';

            // Affichage des autres lignes :
            while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                    foreach($ligne as $information) {
                        echo '<td>' . $information . '</td>';
                    }
                echo '</tr>';
            }

         echo '</table>';



// 08. Requêtes préparées : prepare() + bindParam() + execute()  // 

         echo '<h2> 08. Requêtes préparées : prepare() + bindParam() + execute()  </h2>';

         $nom = 'sennard'; 

        //  Préparation de la requête : 
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom ");  // On prépare la requête sans l'exécuter, avec un marqueur nominatif ecrit :nom 

        // On donne une valeur au marqueur  :nom 
        $resultat->bindParam(':nom', $nom, PDO::PARAM_STR); // Je lie le marqueur :nom à la variable $nom. Si on change le contenu de la variable, la valeur du marqueur changera changera automatiquement si on fait plusieurs execute. 

        // On exécute la requête  :
        $resultat->execute();

        $donnees = $resultat->fetch(PDO::FETCH_ASSOC); // $donnees est un array associatif 
        echo implode($donnees, ' - ');  // implode transforme l'array en string 

        /*
            prepare() renvoie toujours un objet PDOstatement 
            execute() renvoie :
                        succés : un objet PDOstatement
                        Echec  : False

            les requêtes préparées sont à préconiser si vous exécuter plusieurs fois la même requête ( par exemple dans une boucle ), et ainsi le cycle complet analyse / interpretation / exécution de la requête. 

            Par ailleurs, les requêtes préparées sont souvent utilisées pour assainir les données en forçant le type des valeurs communiquées aux marqueurs. 

        */


// 09. Requêtes préparées : prepare() + bindValue() + execute()  // 

        echo '<h2> 08. Requêtes préparées : prepare() + bindValue() + execute()  </h2>';

        $nom = 'Thoyer'; 

        // on prépare la requete :
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom ");

        // on lie le marqueur à une valeur
        $resultat->bindValue(':nom', $nom, PDO::PARAM_STR); // bindValue recoit une variable ou un string . Le marqueur pointe uniquement vers la valeur : si celle çi change , il faudra refaire un bindValue pour prendre en compte cette nouvelle valeur lors d'un prochain execute(). 

        // on exécute la requête :
        $resultat->execute();

        $donnees = $resultat->fetch(PDO::FETCH_ASSOC); 
        echo implode($donnees, ' - ');

        // Si on change la valeur de la variable $nom, sans faire un nouveau bindValue, le marqueur de la requetes pointe toujours vers 'Thoyer' :
        $nom = 'Thoyer'; 
        
        $resultat->execute();

        $donnees = $resultat->fetch(PDO::FETCH_ASSOC); 
        echo implode($donnees, ' - '); // en effet, on obtient encore les informations de Thoyer et non de Durand.
        
         
        ?>