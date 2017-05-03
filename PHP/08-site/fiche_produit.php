<?php 

    require_once ('inc/init.inc.php');

// -------------------------- Traitement ---------------------------- //

    $aside = ''; 

    // 1- Controler de l'existence du produit démandé : 

    if(isset($_GET['id_produit'])) {  // si existe l'indice id_produit dans l'url

        // on requête en base le produit demandé pour vérifier son existence :

        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

        if($resultat->rowCount() <= 0){
            header('location:boutique.php');  // si il n'y a pas de résusltat dans la requête, c'est que le produit n'existe pas : on oriente alors vers la boutique. 
            exit();
        }

     // 2- affichage du détail du produit : 

    $produit = $resultat->fetch(PDO::FETCH_ASSOC);  // pas de while car qu'un seul produit 

    $contenu .= '<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">'. $produit['titre'] .'</h1>
                    </div>
                  </div>';

    $contenu .= '<div class="col-md-8">
                    <img class="img-responsive" src="' . $produit['photo'] . '" >
                </div>';

    $contenu .= '<div class="col-md-4">
                    <h3>Description</h3>
                    <p>' . $produit['description'] . '</p>
                    <h3>Détails</h3>
                    <ul>
                        <li>Catégorie : '. $produit['categorie'] .'</li>
                        <li>Couleur : '. $produit['couleur'] .'</li>
                        <li>Taille : '. $produit['taille'] .'</li>
                    </ul>

                    <p class="lead">Prix : ' . $produit['prix'] . ' €</p>

                 </div>';

    //  3- Affichage du formulaire d'ajout au panier si sotck > 0 :

    $contenu .= '<div class="col-md-4">';
                    if($produit['stock'] > 0) {

                        // si il y a du stock on met le bouton d'ajout au panier
                        $contenu .= '<form method="post" action="panier.php">';

                                $contenu .= '<input type="hidden" name="id_produit" value="'. $produit['id_produit'] . '">';

                                $contenu .= '<select name="quantite" id="quantite" class="form-group-sm form-control-static">';
                                        for($i = 1; $i <= $produit['stock'] && $i <= 5; $i++) {
                                            $contenu .= "<option>$i</option>";
                                        }
                                $contenu .=  '</select>';
                                
                                $contenu .= '<input type="submit" name="ajout_panier" value="ajouter au panier" class="btn" style="margin-left:10px">';

                        $contenu .= '</form>';

                    } else {
                        $contenu .= '<p>Rupture de Stock</p>';

                    }

                    echo '<br>';

                    // 4- lien retour vers la boutique : 
                    $contenu .= '<p><a href="boutique.php?categorie='. $produit['categorie'] .'">Retour vers votre sélection</a></p>';

                $contenu .= '</div>';

    } else {
        // Si l'indice id_produit n'est pas dans l'url 
        header('location:boutique.php'); // On le redirige vers la boutique
        exit();
    }

// ---------------
//     Exercice
// ---------------

/*
    Vous allez créer des suggestions de produits : affichez 2 produits (photo et titre) aléatoirement appartement à la catégorie du produit affiché dans la détail. Ces produits affiché dans la page détails. Ces produits doivent être différents du produit affiché. La photo est cliquable et amène à la fiche produit. 

    Utilisez la variable $aside pour afficher le contenu. 

*/
    
    $suggest = executeRequete("SELECT id_produit, photo, titre FROM produit WHERE categorie = '$produit[categorie]' AND id_produit <> '$_GET[id_produit]' ORDER BY RAND() LIMIT 2");  // <> = différent de 
       
    while($affichage = $suggest->fetch(PDO::FETCH_ASSOC)){
        $aside .= '<div class="col-sm-3">';
            $aside .=  '<a href="fiche_produit.php?id_produit='. $affichage['id_produit'] .'"><img src="'. $affichage['photo'] .'" style="width:100%"></a>';
            $aside .=  '<h4>' . $affichage['titre'] . '</h4>';
        $aside .= '</div>';
    }

   
// -------------------------- Affichage ---------------------------- //

    require_once ('inc/haut.inc.php');
    echo $contenu_gauche;  // recevra le pop up de confirmation d'ajout au panier. 
    ?>

        <div class="row">
            <?php echo $contenu; // affiche le détail d'un produit ?> 
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Suggestion de produits</h3>
            </div>

            <?php echo $aside;  // affiche les produits suggérés ?>

        </div>


    <?php 
    require_once ('inc/bas.inc.php');