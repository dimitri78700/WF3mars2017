<?php 

    require_once ('inc/init.inc.php');

// -------------------------- Traitement ---------------------------- //









// -------------------------- Affichage ---------------------------- //

    require_once ('inc/haut.inc.php');
    echo $contenu;


    echo '<h2>Voici votre panier</h2>';

    if (empty($_SESSION['panier']['id_produit'])){

        // Si votre panier est vide :

        echo '<p>Votre panier est vide</p>';

    } else {
        echo '<table class="table">';
            echo '<tr class="info">
                        <th>Titre</th>
                        <th>N° du produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Action</th>
                  </tr>';

            // On parcourt l'array $_SESSION['panier'] pour afficher les produits qui s'y trouve. 
            for ($i = 0; $i < count($_SESSION['panier'] ['id_produit']); $i++){
                echo '<tr>';
                    echo '<td>' . $_SESSION['panier'] ['titre'] [$i] . '</td>';
                    echo '<td>' . $_SESSION['panier'] ['id_produit'] [$i] . '</td>';
                    echo '<td>' . $_SESSION['panier'] ['quantite'] [$i] . '</td>';
                    echo '<td>' . $_SESSION['panier'] ['prix'] [$i] . '</td>';
                    echo '<td>
                            <a href="?action=supprimer_article&articleASupprimer='. $_SESSION['panier'] ['id_produit'] [$i] .'">Supprimer article</a>
                         </td>';
                echo '</tr>';
            }
            
            echo '<tr class="info">
                    <th colspan="3">Total</th>
                    <th colspan="2">'. montantTotal() .' €</th> 
                  </tr>'; // la fonction utilisateur montantTotal() est déclarée dans fonction.inc.php et retourne le total du panier. 

            // Si le membre est connécté on affiche le formulaire de validation du panier :

            if(internauteEstConnecte()){
                echo '<form method="post" action="">
                          <tr class="text-center">
                                <td colspan="5">
                                  <input type="submit" name="valider" value="Valider le panier">
                                </td>
                          </tr>
                      </form>';
            } else {
                // Membre non connecté, on l'invite à s'inscrire ou à se connecter
                echo  '<tr class="text-center">
                               <td colspan="5">
                                    Veuillez vous <a href="inscription.php"> inscrire </a> ou vous <a href="connexion.php">Connecter</a> afin de valider le panier
                               </td>
                        </tr>';
            }
                echo  '<tr class="text-center">
                             <td colspan="5">
                                <a href="?action=vider">Vider le panier</a>
                             </td>
                      </tr>';

        echo '</table>';
    } // fin du else 

    require_once ('inc/bas.inc.php');