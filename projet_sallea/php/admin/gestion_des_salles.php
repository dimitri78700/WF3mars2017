<?php

    require_once('../inc/init.inc.php');

?>
<?php
    // ----------------------  Traitement -------------------- //

        // 1- Vérification ADMIN

        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../profil.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }

    // 7- Suppression d'une salle

        if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_salle'])){

            // On selectionnne en base la photo pour pouvoir supprimer le fichier photo correspondant :

            $resultat = executeRequete("SELECT photo FROM salle WHERE id_salle = :id_salle", array(':id_salle' => $_GET['id_salle'])); 

            $salle_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC);  // Pas de while car qu'un seul salle

            $chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $salle_a_supprimer['photo'];  // Chemin du fichier à suppr. 

            if (!empty($salle_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)){
                // si il y a un chemin de photo en base et que le fichier existe, on peut le supprimer : 
                unlink($chemin_photo_a_supprimer); // Supprime le fichier spécifié . 

                }
                // Puis suppression du salle en BDD : 
                executeRequete("DELETE FROM salle WHERE id_salle = :id_salle", array(':id_salle' => $_GET['id_salle']));

                $contenu .= '<div class="bg-succes"> Le salle a été supprimé ! </div>';
                $_GET['action'] = 'affichage'; // pour lancer l'affichage des salles dans le tableau HTML (point 6). 
            
        }

    // 4- Enregistrement du salle en BDD :

        if($_POST){ // Equivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté
            // ici il faudrait mettre les contrôles sur le formulaire

                $photo_bdd=''; // La photo subit un traitement spécifique en BDD. Cette variable contiendra son chemin d'accès
            
             // 9- Modification de la photo (suite) : 

             if (isset($_GET['action'] ) && $_GET['action'] == 'modification') {
                //  si je suis en modification, je mets en base la photo du champs hidden photo_actuelle du formulaire:
                $photo_bdd = $_POST['photo_actuelle'];

             }

             // 5- traitement de la photo :

                // echo '<pre>'; print_r($_FILES); echo '</pre>';
                if(!empty($_FILES['photo'] ['name'])){ // si une image a été uploadée, $_FILES est remplie

                // on constitue un nom unique pour le fichier photo :

                $nom_photo = $_POST['reference'] . '_' . $_FILES['photo'] ['name']; 

                // On constitue le chemin de la photo enregistré en BDD :

                $photo_bdd = RACINE_SITE . 'photo/' . $nom_photo;  // On obtient ici le nom et le chemin de la photo depuis la racine du site

                // On constitue le chemin absolu complet de la photo depuis la racine serveur :

                $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . $photo_bdd; 
                //  echo '<pre>'; print_r($photo_dossier); echo '</pre>';

                // Enregistrement du fichier photo sur le serveur : 

                copy($_FILES['photo'] ['tmp_name'], $photo_dossier); // on copie le fichier tempoiraire de la photo stockée au chemin indiqué par $_FILES['photo'] ['tmp_name'] dans le chemin $photo_dossier de notre serveur

             }

            // 4- Suite de l'enregistrement en BDD :

            executeRequete("REPLACE INTO salle (id_salle, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock)VALUES(:id_salle, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo_bdd, :prix, :stock)", array('id_salle' => $_POST['id_salle'], 'reference' => $_POST['reference'], 'categorie' => $_POST['categorie'], 'titre' => $_POST['titre'], 'description' => $_POST['description'], 'couleur' => $_POST['couleur'], 'taille' => $_POST['taille'], 'public' => $_POST['public'], ':photo_bdd' => $photo_bdd, 'prix' => $_POST['prix'], 'stock' => $_POST['stock']));

            $contenu .='<div class="bg-success">Le salle a été enregistré</div>';
            $_GET['action'] = 'affichage'; // On met la valeur 'affichage' dans $_GET['action'] pour affcher automatiquement la table HTML des salles plus loin dans le script (point 6)
            } 

    
    

            // 2- Les liens "affichage" et "ajout d'un salle" :

            $contenu .='<ul class="nav nav-tabs">
                                <li><a href="?action=affichage">Affichage du salles</a></li>
                                <li><a href="?action=ajout">Ajout d\'un salles</a></li>
                        </ul>';

            // 6- Affichage des salles dans le back-office :

            if (isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])){ // si $_GET contient affichage ou que l'on arrive sur la page la 1er fois.

                $resultat = executeRequete("SELECT * FROM salle");  // on séléctionne tous les salles 

                $contenu .= '<h3>Affichage des salles</h3>';

                $contenu .= '<p>nombre de salle(s)  : ' . $resultat->rowCount() . '</p>';

                $contenu .=  '<table class="table">';
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
                                       $contenu .= '<td><img src="'. $data .'" width="70" height="70"></td>';
                                   }else{
                                       $contenu .= '<td>' . $data . '</td>';
                                    }   
                                } 
                            $contenu .= '<td>
                                            <a href="?action=modification&id_salle='. $ligne['id_salle'] . '">Modifier</a> /
                                            <a href="?action=suppression&id_salle='. $ligne['id_salle'] . '"onclick="return(confirm(\'etes vous certains de vouloir supprimer ce salle ? \'));">Supprimer</a>
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
        // Si on a demandé l'ajout d'un salle ou sa modification, on affiche le formulaire :

    // 8- Formulaire de modification avec présaisiei des infos dans le formulaire :

    if(isset($_GET['id_salle'])){

        // Pour préremplir le formulaire, on requête en BDD les infos du salle passé dans l'url :
        $resultat = executeRequete("SELECT * FROM salle WHERE id_salle = :id_salle", array(':id_salle' => $_GET['id_salle']));

        $salle_actuel = $resultat->fetch(PDO::FETCH_ASSOC); // Pas de while car qu'un seul salle. 


    }
?>


    <form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" perùet d'uploader un fichier et de générer une superglobale $_FILES -->

                <input type="hidden" id="id_salle" name="id_salle"> <!-- champ caché qui récetionne l'id_salle nécessaire lors de la modification d'un salle existant -->
                
                <label for="titre">Titre</label><br>
                <textarea id="titre" name="titre"></textarea><br><br>

                <label for="adresse">adresse</label><br>
                <textarea id="adresse" name="adresse"></textarea><br><br>

                <label for="code_postal">code postal</label><br>
                <input type="text" id="code_postal" name="code_postal"><br><br>


                <label>pays</label><br>
                <select name="pays">
                    <option value="france">France</option>
                </select><br><br>

                <label>ville</label><br>
                <select name="ville">
                    <option value="paris">Paris</option>
                    <option value="lyon" >Lyon</option>
                    <option value="marseille">Marseille</option>
                </select><br><br>

                   <label>Catégorie</label><br>
                <select name="Catégorie">
                    <option value="reunion">Reunion</option>
                    <option value="bureau">Bureau</option>
                    <option value="formation">Formation</option>
                </select><br><br>

                <label for="description">Description</label><br>
                <textarea id="description" name="description"></textarea><br><br>


                   <label>Capacité</label><br>
                <select name="capacite">
                    <option value="1">1</option>
                    <option value="2" >2</option>
                    <option value="3">3</option>
                </select><br><br>

                <label for="photo">Photo</label><br><br>
                <input type="file" id="photo" name="photo" ><br><br>
                <!--Coupler avec l'attribut enctype ="multipart/form-data" de la balise form, le type 'file' perment d'uploder un fichier ici une photo-->

                <input type="submit" value="enregistrer" class="btn"><br><br>

        </form>

<?php
        endif;
    require_once('../inc/footer.inc.php');
?>