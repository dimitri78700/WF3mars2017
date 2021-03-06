<?php

// *************  FONCTIONS MEMBRES  ****************

    function internauteEstConnecte() {
        // Cette fonction indique si l'internaute est connecté : si la session membre est définie, c'est que l'internaute est passé par la page de connexion avec le bon mdp. 

        if(isset($_SESSION['membre'])) {
            return true; 
        } else {
            return false;
        }

        // On pourrait écrire aussi : return isset ($_SESSION['membre']);
    }

    // --------------------

    function internauteEstConnecteEtEstAdmin(){
        // Cette fonction indique si le membre connecté est admin 
        if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
            return true; 
        } else {
            return false;
        }

     }

      // -----------------------------------------------
        
        function executeRequete($req, $param = array()){ // $param est un array vide par défaut: il est donc optionnel
            // htmlspecialchars :
            if (!empty($param)){
                // Si on a bien reçu un array, on le traite :
                foreach($param as $indice => $valeur){
                    $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // transofrme en entiées HTML chaque caractères spéciaux, dont les quotes
                }
            }
            //  La requête préparée :
            global $pdo; // $pdo est déclarée dans l'espace global (fichier init.inc.php). Il faut donc faire global $pdo pour l'utiliser dans l'espace local de cette fonction
            $r = $pdo->prepare($req);
            $succes = $r->execute($param); // On exécute la requête en lui passant l'array $param qui permet d'associer chaque marqueur à sa valeur
            // Traitement erreur SQL éventuelle :
            if(!$succes){ // Si $succes vaut false, il y a une erreur sur la requête
                die('Erreur sur la requête SQL : ' . $r->errorInfo()[2]); // die arrête le script et affiche un message.
                // Ici on affiche le message d'erreur SQL donné par errorInfo(). Cette méthode retourne un array, dans lequel le msg se situe à l'indice[2]
            }
            return $r; // retourne un objet PDOStatement qui contient le résultat de la requête
            
        }


// *************  FONCTION PANIER  ****************

            function creationDuPanier(){
                if(!isset($_SESSION['panier'])){
                    // si il n'existe pas dans session on le crée ( le panier )
                    $_SESSION['panier'] = array();   // le panier est un array vide. 
                    $_SESSION['panier'] ['titre'] = array();
                    $_SESSION['panier'] ['id_produit'] = array();
                    $_SESSION['panier'] ['quantite'] = array();
                    $_SESSION['panier'] ['prix'] = array();

                }
            }


            function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix) {  // Ces arguments sont en provenance de panier.php 

                creationDuPanier(); // pour créer la structure si elle n'existe pas 

                $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); // array_search retourne un chiffre si l'id_produit est présent dans l'array $_SESSION['panier'], qui correspond à l'indice auquel se situe l'élément (rappel : dans un array le 1er indice vaut 0). Sinon retourne FALSE. 

                if($position_produit === false ) {

                    // si le produit n'est pas dans le panier, on l'ajoute 

                    $_SESSION['panier'] ['titre'] [] = $titre;  // les crochets vides pour ajouter l'élément à la fin de l'array 
                    $_SESSION['panier'] ['id_produit'] [] = $id_produit; 
                    $_SESSION['panier'] ['quantite'] [] = $quantite; 
                    $_SESSION['panier'] ['prix'] [] = $prix; 
                } else {
                    
                    //  si le produit existe, on ajoute la quantité nouvelle à la quantité deja prensente dans le panier

                    $_SESSION['panier'] ['quantite'] [$position_produit] += $quantite;

                }

            }



            //-------------------------------------
  
            function montantTotal(){

                $total = 0; // contient le total de la commande

                for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){

                    // Tant que $i est inférieur au nombre de produits présents dans le paner, on additionne le prix fois la quantité :

                    $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
                    // Le symbole += pour ajouter la nouvelle valeur à l'ancienne sans l'écraser

    
                }

                return round($total,2);  // on retourne le total arrondi à 2 décimales. 
            }



            // ------------------------------------------

            function retirerProduitDuPanier($id_produit_a_supprimer){

                // on cherche la position du produit dans le panier : 
                $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']); // array_search renvoie la position renvoie la position du produit (integer) sinon false  s'il n'y pas 

                if ($position_produit !== false ) {

                    // si le produit est bien dans le panier, on coupe sa ligne :
                    array_splice($_SESSION['panier']['titre'], $position_produit, 1); // efface la portion du tableau à  partir de l'indice indiqu" par $position_produit et sur la 1ligne 
                    
                    array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
                    array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
                    array_splice($_SESSION['panier']['prix'], $position_produit, 1);

                }

            }

// --------------------
// Exercice : créer une fonction qui retourne le nombre de produits différents dans le panier. Et afficher le résultat à coté du lien "panier" dans le menu de navigation, exemple : panier(3) . Si le panier est vide, vous affichez panier(0)

            function articlePanier(){

                if (isset($_SESSION['panier'])){
                    return count($_SESSION['panier']['id_produit']);
                    // return array_sum($_SESSION['panier']['quantite']);  // array_sum additionne les valeurs situées à un indice. 
                } else {
                    return 0;
                }


            }