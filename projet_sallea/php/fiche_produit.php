<?php

    require_once('inc/init.inc.php');

    //--------------------------- TRAITEMENT --------------------------------

    $aside='';

    // 1- Contrôle de l'existence du produit demandé :

    if (isset($_GET['id_salle'])){ // Si existe l'indicee id-produit dans l'URL
        // On requête en base le produit demandé pour vérifier son existence :

        $resultat = executeRequete("SELECT s.*, p.* FROM salle s
                                    INNER JOIN produit p
                                    ON s.id_salle = p.id_salle 
                                    WHERE s.id_salle = :id_salle", 
                                    array(':id_salle'=> $_GET['id_salle']));
       
        if($resultat->rowCount() <= 0){

            header('location:sallea.php'); // Si il n'y a pas de résultat dans la requete, c'est que le produit n'existe pas: on oriente alors vers la fiche_produit
            exit();
        }
        // 2- Affichage du détail du produit:

        $produit = $resultat->fetch(PDO::FETCH_ASSOC); // Pas de while car qu'un seul produit

        // dd($produit);
        $contenu .= '<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">'. $produit['titre'] .'</h1>
                        </div>
                    </div>';
        $contenu .= '<div class="col-md-8">
                        <img class="img-responsive" src="'. $produit['photo'] .'" alt="">
                    </div>';
        $contenu .= '<div class="col-md-4">
                        <h3>Description</h3>
                        <p>'. $produit['description'] .'</p>
                        <h3>Informations complémentaires</h3>
                        <ul>
                            <li>Arrivé : '. $produit['date_arrivee'] .' </li>
                            <li>Départ : '. $produit['date_depart'] .' </li>
                            <li>Capacité : '. $produit['capacite'] .' </li>
                            <li>Catégorie : '. $produit['categories'] .' </li>
                            <li>Adresse : '. $produit['adresse'] .' </li>
                            <li>Prix : '. $produit['prix'] .' </li>
                            
                        </ul>
                        <p class="lead">Prix : '. $produit['prix'] .' €</p>
                        <button class="btn">Reserver</button><br>
                    </div>';
        // 3- Affichage du formulaire d'ajout au panier si stock > 0 :

        $contenu .= '<div class"col-md-4">';
            $contenu .= '<p><a href="sallea.php?categorie='. $produit['categories'] .'">Retour vers votre sélection</a></p>';
        $contenu .= '</div>';
    }
    else{
        // Si l'indice id_produit n'est pas dans l'URL

        header('location:sallea.php'); // On le redirige vers la fiche_produit
        exit();
    }
    // Affichage d'une fenêtre modale pour confirmer l'ajout du produit au panier :

    if(isset($_GET['statut_produit']) && $_GET['statut_produit'] == 'ajoute'){
        
        // On met dans une variable le HTML de la fenêtre modale pour afficher ensuite :
        
        $contenu_gauche ='<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                        <h4 class="modal-title">Le produit a bien été ajouté au panier</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><a href="panier.php">Voir le panier</a></p>
                                        <p><a href="sallea.php">Continuer ses achats</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>';
    }
    $suggestion = executeRequete("SELECT id_salle, photo, titre FROM salle WHERE categories = '$produit[categories]' AND id_salle != '$_GET[id_salle]' ORDER BY RAND() LIMIT 3", array(':categories' => $produit['categories'], ':id_salle' => $produit['id_salle']));

    
        while ($prod = $suggestion->fetch(PDO::FETCH_ASSOC)) {
            $aside .= '<div class="col-sm-3">';
                $aside .= '<a href="?id_salle='. $prod['id_salle'].'"><img src="'. $prod['photo'] .'" style="width:100%"></a>';
                $aside .= '<h4>'. $prod['titre'] .'</h4>';
            $aside .= '</div>';
        }
    //--------------------------- AFFICHAGE --------------------------------

    require_once('inc/header.inc.php');

    echo $contenu_gauche; // recevra le pop up de confirmation d'ajout au panier'
?>

<!-- HTML -->
    <div class="row">
        <?php echo $contenu; // Affiche le détail d'un produit ?>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Suggestions de produits</h3>
        </div>
        <?php echo $aside; // Affiche les produits suggérés ?>
    </div>

    <!-- Jquery -->

        <script>
            $(document).ready(function(){
                // Affiche la fenêtre modale :
                $("#myModal").modal("show");
            });
        </script>

<?php
    require_once('inc/footer.inc.php');
?>