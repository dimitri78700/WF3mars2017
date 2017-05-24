<?php
    require_once('../inc/init.inc.php');
    //--------------------------- TRAITEMENT ------------------------------
    
    // 1- Vérification ADMIN

        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }
    // 7- Suppression d'un commande

        if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_commande'])){
            $resultat = executeRequete("SELECT * FROM commande WHERE id_commande = :id_commande", array(':id_commande' => $_GET['id_commande']));
            $avis_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC); 

            // Puis suppression de l'avis en BDD :

            executeRequete("DELETE FROM commande WHERE id_commande = :id_commande", array(':id_commande' => $_GET['id_commande']));
            $contenu .= '<div class="bg_success">Le commande a été supprimée !</div>';
            $_GET['action'] = 'affichage'; // Pour lancer l'affichage des membre dans le tableau HTML (point 6)
        }
    // 4- Enregistrement du commande en BDD
        if($_POST){ // Equivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté
   
            // 4- Suite de l'enregistrement en BDD :

            executeRequete("REPLACE INTO commande (id_commande, id_membre, id_produit, date_enregistrement)VALUES(:id_commande, :id_membre, :id_produit, NOW())", array('id_commande' => $_POST['id_commande'], 'id_membre' => $_POST['id_membre'], 'id_produit' => $_POST['id_produit']));
            $contenu .='<div class="bg-success">La commande a été enregistré</div>';

            $_GET['action'] = 'affichage'; // On met la valeur 'affichage' dans $_GET['action'] pour affcher automatiquement la table HTML des commandes plus loin dans le script (point 6)
        } 
    // 2- Les liens "affichage" et "ajout d'un commande" :

        $contenu .='<ul class="nav nav-tabs">
                        <li><a href="?action=affichage">Affichage des commande</a></li>
                        <li><a href="?action=ajout">Ajout d\'une commande</a></li>
                    </ul>';
  
    // 6- Affichage des commandes dans le back-office :

        if(isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])) {

            // Si $_GET contient affichage ou que l'on arrive sur l apage la 1ere fois ($_GET['action'] n'existe pas)

            $resultat = executeRequete("SELECT * FROM commande"); // On sélectionne tous les commande
            $contenu .= '<h3>Affichage des commande</h3>';
            $contenu .= '<p>Nombre d\'commande : '. $resultat->rowCount() . '</p>';
            $contenu .= '<table border="2" class="table">';
                // La ligne des entêtes

                $contenu .= '<tr>';
                    for($i = 0; $i< $resultat->columnCount(); $i++){
                        $colonne = $resultat->getColumnMeta($i);
                        // echo '<pre>'; print_r($colonne) ; echo '</pre>';
                        $contenu .='<th>' . $colonne['name'] . '</th>'; // getColumnMeta() retourne un array cotenant notamment l'indice name contenant le nom de la colonne' 
                    }
                    $contenu .= '<th>Action</th>'; // On ajoute une colonne "Action"
                $contenu .= '</tr>';
                // Affichage des lignes :

                while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
                    $contenu .= '<tr>';
                        // echo '<pre>'; print_r($ligne) ; echo '</pre>';                    
                        foreach($ligne as $index => $data){ // $index réceptionne les indices, $data les valeurs
                                $contenu .= '<td>' . $data . '</td>';
                        }
                        $contenu .= '<td>
                                        <a href="?action=modification&id_commande='. $ligne['id_commande'] .'">modifier</a> /
                                        <a href="?action=suppression&id_commande='. $ligne['id_commande'] .'"onclick="return(confirm(\'Etes-vous certain de vouloir supprimer cet commande ?\'));">supprimer</a>
                                    </td>';
                    $contenu .= '</tr>';
                }
            $contenu .= '</table>';
        }
    //--------------------------- AFFICHAGE ------------------------------

    require_once('../inc/header.inc.php');
    echo $contenu;

    // 3- Formulaire  HTML

        if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification' )) :
        // Si on a demandé l'ajout d'un commande ou sa modification, on affiche le formulaire :

            // 8- Formulaire de modification avec présaisie des infos dans le formulaire :

            if(isset($_GET['id_commande'])){
                // Pour préremplir le formulaire, on requête en BDD les infos de commande passé dans l'URL:
                $resultat = executeRequete("SELECT * FROM commande WHERE id_commande = :id_commande", array(':id_commande' => $_GET['id_commande']));
                $commande_actuel= $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car un seul commande
            }
?>

<h3>Formulaire d'ajout ou de modification d'un commande</h3>
<form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" permet d'uploader un fichier et de générer une superglobale $_FILES -->
    <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $commande_actuel['id_commande']?? 0;?>"> <!-- champ caché qui récetionne l'id_commande nécessaire lors de la modification d'un membre existant -->

    
    <label for="id_membre">id_membre</label><br>
    <input type="text" id="id_membre" name="id_membre" value="<?php echo $commande_actuel['id_membre']?? ''; ?>"><br>

    <label for="id_produit">id_produit</label><br>
    <input type="text" id="id_produit" name="id_produit" value="<?php echo $commande_actuel['id_produit']?? ''; ?>"><br>

    <label for="date_enregistrement">Date d'enregistrement</label><br>
    <p value="<?php echo $commande_actuel['date_enregistrement']?? '';?>"></p><br>

    <input type="submit" value="enregister" class="btn"><br><br>

</form>
<?php
        endif;
    require_once('../inc/footer.inc.php');
?>