
<?php
    require_once('../inc/init.inc.php');



    //--------------------------- TRAITEMENT ------------------------------


    // 1- Vérification ADMIN

        if(!internauteEstConnecteEtEstAdmin()){
            header('location:../connexion.php'); // Si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
            exit();
        }

    // 7- Suppression d'une salle

        if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_salle'])){

            // On selectionnne en base la photo pour pouvoir supprimer le fichier photo correspondant :

            $resultat = executeRequete("SELECT photo FROM salle WHERE id_salle = :id_salle", array(':id_salle' => $_GET['id_salle'])); 

            $salle_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC);  // Pas de while car qu'un seul produit

            $chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $salle_a_supprimer['photo'];  // Chemin du fichier à suppr. 

            if (!empty($salle_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)){

                // si il y a un chemin de photo en base et que le fichier existe, on peut le supprimer : 
                unlink($chemin_photo_a_supprimer); // Supprime le fichier spécifié . 

                }
                // Puis suppression du produit en BDD : 

                executeRequete("DELETE FROM salle WHERE id_salle = :id_salle", array(':id_salle' => $_GET['id_salle']));

                $contenu .= '<div class="bg-succes"> La salle a été supprimé ! </div>';

                $_GET['action'] = 'affichage'; // pour lancer l'affichage des salles dans le tableau HTML (point 6). 
            
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

            executeRequete("REPLACE INTO salle (id_salle, titre, description, photo, pays, ville, adresse, cp, capacite, categories)VALUES(:id_salle, :titre, :description, :photo, :pays, :ville, :adresse, :cp, :capacite, :categories)", array('id_salle' => $_POST['id_salle'], 'titre' => $_POST['titre'], 'description' => $_POST['description'], ':photo' => $photo, 'pays' => $_POST['pays'], 'ville' => $_POST['ville'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'capacite' => $_POST['capacite'], 'categories' => $_POST['categories']));

            $contenu .='<div class="bg-success">Le salle a été enregistré</div>';

            $_GET['action'] = 'affichage'; // On met la valeur 'affichage' dans $_GET['action'] pour affcher automatiquement la table HTML des salles plus loin dans le script (point 6)
            } 

            // 2- Les liens "affichage" et "ajout d'un salle" :

            $contenu .='<ul class="nav nav-tabs">
                                <li><a href="?action=affichage">Affichage des salles</a></li>
                                <li><a href="?action=ajout">Ajout d\'une salle</a></li>
                        </ul>';

            // 6- Affichage des salles dans le back-office :

            if (isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])){ // si $_GET contient affichage ou que l'on arrive sur la page la 1er fois.

                $resultat = executeRequete("SELECT * FROM salle");  // on séléctionne tous les salles 

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

        $salle = $resultat->fetch(PDO::FETCH_ASSOC); // Pas de while car qu'un seul salle. 


     }

?>


    <form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" perùet d'uploader un fichier et de générer une superglobale $_FILES -->



                <input type="hidden" id="id_salle" name="id_salle" value="<?php echo $salle['id_salle'] ?? 0; ?>"> <!-- champ caché qui récetionne l'id_salle nécessaire lors de la modification d'un salle existant -->
                
                <label for="titre">Titre</label><br>
                <textarea id="titre" name="titre" value="<?php echo $salle ['titre'] ?? ''; ?>"></textarea><br><br>

                <label for="adresse">adresse</label><br>
                <textarea id="adresse" name="adresse" value="<?php echo $salle ['adresse'] ?? ''; ?>"></textarea><br><br>

                <label for="cp">code postal</label><br>
                <input type="text" id="cp" name="cp" value="<?php echo $salle ['cp'] ?? ''; ?>"><br><br>


                <label>pays</label><br>
                <select name="pays">
                    <option value="france" selected>France</option>
                    <option value="irlande" <?php if(isset($salle['pays']) && $salle['pays'] == 'irlande') echo 'selected '?>>Irlande</option>
                </select><br><br>

                <label>ville</label><br>
                <select name="ville">
                    <option value="paris" selected>Paris</option>
                    <option value="lyon" <?php if(isset($salle['ville']) && $salle['ville'] == 'lyon') echo 'selected '?>>Lyon</option>
                    <option value="marseille" <?php if(isset($salle['ville']) && $salle['ville'] == 'marseille') echo 'selected '?>>Marseille</option>
                    <option value="dublin" <?php if(isset($salle['ville']) && $salle['ville'] == 'dublin') echo 'selected '?>>Dublin</option>
                </select><br><br>

                   <label>Catégorie</label><br>
                <select name="categories">
                    <option value="reunion" selected>Reunion</option>
                    <option value="bureau"  <?php if(isset($salle['categories'])&& $salle['categories'] == 'bureau') echo 'selected '?>>Bureau</option>
                    <option value="formation"  <?php if(isset($salle['categories'])&& $salle['categories'] == 'formation') echo 'selected '?>>Formation</option>
                </select><br><br>

                <label for="description">Description</label><br>
                <textarea id="description" name="description" value="<?php echo $salle['description'] ?? ''; ?>"></textarea><br><br>


                <label>Capacité</label><br>
                <select name="capacite">
                    <option value="1" selected>1</option>
                    <option value="2"  <?php if(isset($salle['capacite'])&& $salle['capacite'] == '2') echo 'selected '?>>2</option>
                    <option value="3" <?php if(isset($salle['capacite'])&& $salle['capacite'] == '3') echo 'selected '?>>3</option>
                </select><br><br>

                <label for="photo">Photo</label><br><br>
                <input type="file" id="photo" name="photo"><br><br>
                <!--Coupler avec l'attribut enctype ="multipart/form-data" de la balise form, le type 'file' perment d'uploder un fichier ici une photo-->


                <?php
                    if(isset($salle['photo'])){

                        echo '<i>Vous pouvez uploader une nouvelle photo</i>';
                        // afficher la photo actuellle : 

                        echo '<img src="'. $salle['photo'] .'" width="90" height="90"><br>';
                        //  Mettre le chemin de la photo dans un champ caché pour l'enregistrer en base :

                        echo '<input type="hidden" name="photo_actuelle" value="'. $salle['photo'] .'">';
                        // ce champs renseigne le $_POST['photo_actuelle'] qui van en base quand on soument le formulaire de modification. Si on ne remplit pas le formulaire ici, le champs photo de la base est remplacé par un vide, ce qui efface le chemin de la photo. 
                    }

                ?>

             
                <input type="submit" value="enregistrer" class="btn"><br><br>

        </form>

<?php
        endif;
    require_once('../inc/footer.inc.php');
?>