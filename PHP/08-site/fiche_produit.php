<?php 

    require_once ('inc/init.inc.php');

// -------------------------- Traitement ---------------------------- //

    $aside = ''; 

    // 1- Controler de l'existence du produit démandé : 

    if(isset($_GET['id_produit'])) {  // si existe l'indice id_produit dans l'url
        // on requête en base le produit demandé pour vérifier son existence : 


    } else {
        // Si l'indice id_produit n'est pas dans l'url 
        

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