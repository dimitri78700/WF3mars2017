<?php
    require_once('../inc/init.inc.php');
    //--------------------------- TRAITEMENT ------------------------------


    // 1- Vérification ADMIN

        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }
    // 7- Suppression d'un produit

        if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])){
            // On selectionnne en base la photo pour pouvoir supprimer le fichier photo correspondant :
            $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit'])); 
            $produit_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC);  // Pas de while car qu'un seul produit
            $chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo'];  // Chemin du fichier à suppr. 
            if (!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)){
                // si il y a un chemin de photo en base et que le fichier existe, on peut le supprimer : 

                unlink($chemin_photo_a_supprimer); // Supprime le fichier spécifié . 
                }
                // Puis suppression du produit en BDD : 

                executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));
                $contenu .= '<div class="bg-succes"> Le produit a été supprimé ! </div>';
                $_GET['action'] = 'affichage'; // pour lancer l'affichage des produits dans le tableau HTML (point 6). 
            
        }
    // 4- Enregistrement du produit en BDD :

        if($_POST){ // Equivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté
            // ici il faudrait mettre les contrôles sur le formulaire
                $photo = ''; // La photo subit un traitement spécifique en BDD. Cette variable contiendra son chemin d'accès
            
             // 9- Modification de la photo (suite) : 

       if (isset($_GET['action'] ) && $_GET['action'] == 'modification') {
                //  si je suis en modification, je mets en base la photo du champs hidden photo_actuelle du formulaire:
                $photo = $_POST['photo'];
             }
             // 5- traitement de la photo :
                // echo '<pre>'; print_r($_FILES); echo '</pre>';

                if(!empty($_FILES['photo'] ['name'])){ // si une image a été uploadée, $_FILES est remplie
                // on constitue un nom unique pour le fichier photo :

                $nom_photo = $_POST['ville'] . '_' . $_FILES['photo']['name']; 
                // On constitue le chemin de la photo enregistré en BDD :

                $photo = RACINE_SITE . 'photo/' . $nom_photo;  // On obtient ici le nom et le chemin de la photo depuis la racine du site
                // dd($photo);
                // On constitue le chemin absolu complet de la photo depuis la racine serveur :

                $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . $photo; 
                //  echo '<pre>'; print_r($photo_dossier); echo '</pre>';

                // Enregistrement du fichier photo sur le serveur : 

                copy($_FILES['photo']['tmp_name'], $photo_dossier); // on copie le fichier tempoiraire de la photo stockée au chemin indiqué par $_FILES['photo'] ['tmp_name'] dans le chemin $photo_dossier de notre serveur
             }
            // 4- Suite de l'enregistrement en BDD :

            executeRequete("REPLACE INTO produit (id_produit, id_salle, date_arrivee, date_depart, prix, etat)VALUES(:id_produit, :id_salle, :date_arrivee, :date_depart, :prix, :etat)", array('id_produit' => $_POST['id_produit'], 'id_salle' => $_POST['id_salle'], 'date_arrivee' => $_POST['date_arrivee'], ':date_depart' => $date_depart, 'prix' => $_POST['prix'], 'etat' => $_POST['etat']));
            $contenu .='<div class="bg-success">Le produit a été enregistré</div>';

            $_GET['action'] = 'affichage'; // On met la valeur 'affichage' dans $_GET['action'] pour affcher automatiquement la table HTML des produits plus loin dans le script (point 6)
            } 
            // 2- Les liens "affichage" et "ajout d'un produit" :

            $contenu .='<ul class="nav nav-tabs">
                                <li><a href="?action=affichage">Affichage des produits</a></li>
                                <li><a href="?action=ajout">Ajout d\'une produit</a></li>
                        </ul>';

            // 6- Affichage des salles dans le back-office :

            if (isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])){ // si $_GET contient affichage ou que l'on arrive sur la page la 1er fois.

                $resultat = executeRequete("SELECT * FROM produit");  // on séléctionne tous les produits

                $contenu .= '<h3>Affichage des salles</h3>';

                $contenu .= '<p>nombre de salle(s) : ' . $resultat->rowCount() . '</p>';
                $contenu .=  '<table border="2" class="table">';

                        // la ligne des entêtes 

                        $contenu .= '<tr>';
                            for ($i = 0; $i < $resultat->columnCount(); $i++){
                                $colonne = $resultat->getcolumnMeta($i);
                                // echo '<pre>'; print_r($colonne); echo '</pre>';
                                $contenu .= '<th>' . $colonne['name'] . '</th>'; // getcolumnMeta retourne un array contenant notament l'indice name contenant de la colonne . 
                            }
                            $contenu .= '<th>Action </th>';
                        $contenu .= '</tr>';

                        // Affichage des lignes  : 

                        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
                            $contenu .= '<tr>';

                                // echo '<pre>'; print_r($ligne); echo '</pre>';

                                foreach ($ligne as $index => $data ){  // $index receptionne les indices et $data les valeurs. 
                                   if($index == 'photo'){
                                       $contenu .= '<td><img src="'. $data .'" width="80" height="80"></td>';
                                   }else{
                                       $contenu .= '<td>' . $data . '</td>';
                                    }   
                                } 
                            $contenu .= '<td>
                                            <a href="?action=modification&id_salle='. $ligne['id_salle'] . '">Modifier</a> /
                                            <a href="?action=suppression&id_salle='. $ligne['id_salle'] . '"onclick="return(confirm(\'etes vous certains de vouloir supprimer ce produit ? \'));">Supprimer</a>
                                        </td>';  
                            $contenu .= '</tr>';
                        }
                $contenu .=  '</table>';
            }
    //--------------------------- AFFICHAGE ------------------------------

    require_once('../inc/header.inc.php');

    echo $contenu;

    // 3- Formulaire  HTML

        if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) :
    
        // Si on a demandé l'ajout d'un produit ou sa modification, on affiche le formulaire :

    // 8- Formulaire de modification avec présaisie des infos dans le formulaire :

        if(isset($_GET['id_produit'])){
        // Pour préremplir le formulaire, on requête en BDD les infos du produit passé dans l'url :

        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));
        $produit = $resultat->fetch(PDO::FETCH_ASSOC); // Pas de while car qu'un seul produit. 
     }
?>


    <form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" perùet d'uploader un fichier et de générer une superglobale $_FILES -->



                <input type="hidden" id="id_produit" name="id_produit" value="<?php echo $produit['id_produit'] ?? 0; ?>"> <!-- champ caché qui récetionne l'id_produit nécessaire lors de la modification d'un produit existant -->

                <label for="id_salle">Salle</label><br>
                <input id="id_salle" name="id_salle" value="<?php echo $produit ['id_salle'] ?? ''; ?>"><br>

                <label for="date_arrivee">date d'arrivee</label><br>
                <input id="date_arrivee" name="date_arrivee" value="<?php echo $produit ['date d\'arrivee'] ?? ''; ?>"><br>

                <label for="date_depart">date de depart</label><br>
                <input id="date_depart" name="date_depart" value="<?php echo $produit ['date de depart'] ?? ''; ?>"><br>

                <label for="prix">prix</label><br>
                <input id="prix" name="prix" value="<?php echo $produit ['prix'] ?? ''; ?>"><br>

                <label>Etat</label><br>
                <select name="etat">
                    <option value="libre"  <?php if(isset($salle['etat'])&& $salle['etat'] == 'libre') echo 'selected '?>>libre</option>
                    <option value="reservation"  <?php if(isset($salle['etat'])&& $salle['etat'] == 'reservation') echo 'selected '?>>Reservé
                    </option>
                </select><br><br>
             
                <input type="submit" value="enregistrer" class="btn"><br><br>

        </form>

<?php
        endif;
    require_once('../inc/footer.inc.php');
?>