<?php
    require_once('../inc/init.inc.php');
    //--------------------------- TRAITEMENT ------------------------------
    
    // 1- Vérification ADMIN

        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }
    // 7- Suppression d'un avis
    
        if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_avis'])){
            $resultat = executeRequete("SELECT a.id_avis, a.note, a.date_enregistrement, a.commentaire, m.id_membre, m.email, s.id_salle, s.titre
                                            FROM avis a
                                            INNER JOIN membre m
                                            ON a.id_membre = m.id_membre
                                            INNER JOIN salle s
                                            ON a.id_salle = s.id_salle
                                            WHERE id_avis = :id_avis", array(':id_avis' => $_GET['id_avis']));

            $avis_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC); 

            // Puis suppression de l'avis en BDD :

            executeRequete("DELETE FROM avis WHERE id_avis = :id_avis", array(':id_avis' => $_GET['id_avis']));
            $contenu .= '<div class="bg_success">L\'avis a été supprimé !</div>';

            $_GET['action'] = 'affichage'; // Pour lancer l'affichage des membre dans le tableau HTML (point 6)
        }

    // 4- Enregistrement du produit en BDD

        if($_POST){ // Equivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté
   
            // 4- Suite de l'enregistrement en BDD :

            executeRequete("REPLACE INTO avis (id_avis, id_membre, id_salle, commentaire, date_enregistrement)VALUES(:id_avis, :id_membre, :id_salle, :commentaire, NOW())", array('id_avis' => $_POST['id_avis'], 'id_membre' => $_POST['id_membre'], 'id_salle' => $_POST['id_salle'], 'commentaire' => $_POST['commentaire']));
            $contenu .='<div class="bg-success">L\'avis a été enregistré</div>';


            $_GET['action'] = 'affichage'; // On met la valeur 'affichage' dans $_GET['action'] pour affcher automatiquement la table HTML des produits plus loin dans le script (point 6)
        } 

    // 2- Les liens "affichage" et "ajout d'un produit" :

        $contenu .='<ul class="nav nav-tabs">
                        <li><a href="?action=affichage">Affichage des avis</a></li>
                        <li><a href="?action=ajout">Ajout d\'un avis</a></li>
                    </ul>';
  
    // 6- Affichage des produits dans le back-office :

        if(isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])) {

            // Si $_GET contient affichage ou que l'on arrive sur l apage la 1ere fois ($_GET['action'] n'existe pas)

            $resultat = executeRequete("SELECT * FROM avis"); // On sélectionne tous les avis

            $contenu .= '<h3>Affichage des avis</h3>';
            $contenu .= '<p>Nombre d\'avis : '. $resultat->rowCount() . '</p>';
            $contenu .= '<table table border="2" class="table">';
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
                                        <a href="?action=modification&id_avis='. $ligne['id_avis'] .'">modifier</a> /
                                        <a href="?action=suppression&id_avis='. $ligne['id_avis'] .'"onclick="return(confirm(\'Etes-vous certain de vouloir supprimer cet avis ?\'));">supprimer</a>
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

        // Si on a demandé l'ajout d'un produit ou sa modification, on affiche le formulaire :

            // 8- Formulaire de modification avec présaisie des infos dans le formulaire :

            if(isset($_GET['id_avis'])){

                // Pour préremplir le formulaire, on requête en BDD les infos de avis passé dans l'URL:

                $resultat = executeRequete("SELECT a.id_avis, a.note, a.date_enregistrement, a.commentaire, m.id_membre, m.email, s.id_salle, s.titre
                                            FROM avis a
                                            INNER JOIN membre m
                                            ON a.id_membre = m.id_membre
                                            INNER JOIN salle s
                                            ON a.id_salle = s.id_salle
                                            WHERE id_avis = :id_avis", array(':id_avis' => $_GET['id_avis']));

                $avis_actuel= $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car un seul produit
            }
?>

<h3>Formulaire d'ajout ou de modification d'un avis</h3>
<form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" permet d'uploader un fichier et de générer une superglobale $_FILES -->
    <input type="hidden" id="id_avis" name="id_avis" value="<?php echo $avis_actuel['id_avis']?? 0;?>"> <!-- champ caché qui récetionne l'id_avis nécessaire lors de la modification d'un membre existant -->


    
    <label for="id_avis">id_avis</label><br>
    <input type="text" id="id_avis" name="id_avis" value="<?php echo $avis_actuel['id_avis']?? '';?>"><br>
    
    <label for="id_membre">id_membre</label><br>
    <input type="text" id="id_membre" name="id_membre" value="<?php echo $avis_actuel['id_membre']?? ''; ?>"><br>

    <label for="email">email</label><br>    
    <input type="text" id="email" name="email" value="<?php echo $avis_actuel['email']?? ''; ?>"><br>

    <label for="id_salle">id_salle</label><br>
    <input type="text" id="id_salle" name="id_salle" value="<?php echo $avis_actuel['id_salle']?? ''; ?>"><br>

    <label for="titre">titre</label><br>    
    <input type="text" id="titre" name="titre" value="<?php echo $avis_actuel['titre']?? ''; ?>"><br>

    <label for="commentaire">commentaire</label><br>
    <input type="text" id="commentaire" name="commentaire" value="<?php echo $avis_actuel['commentaire']?? '';?>"><br><br>

    <label for="note">note</label><br>
    <p value="<?php echo $avis_actuel['note']?? '';?>"></p><br>

    <label for="date_enregistrement">Date d'enregistrement</label><br>
    <p value="<?php echo $avis_actuel['date_enregistrement']?? '';?>"></p><br>

    <input type="submit" value="enregister" class="btn"><br><br>

</form>
<?php
        endif;
    require_once('../inc/footer.inc.php');
?>