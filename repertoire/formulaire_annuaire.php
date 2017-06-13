<?php 
    $mysqli = new mysqli("localhost", "root", "", "repertoire");
    
    $contenu = '';
    if(isset($_POST['inscription'])){
        
    //    echo '<pre>';
    //    print_r($_POST);
    //    echo '</pre>';
       echo '<div class="succes">';
       foreach( $_POST as $indice =>$valeur ) {

            echo " $indice - $valeur<br> ";

       }
      echo '</div>';
      $date_de_naissance = $_POST['annee'] . " - " . $_POST['mois'] . " - " . $_POST['jour'];
    }

    $a=10; $b=5; $c=2;
if($a == 8)	echo "1";
elseif($a != 10) echo "2";
else echo "3";

?>


<!--
    Nom
    Prenom
    Telephone
    ville
    cp
    adresse
    date de naissance : jour-mois-Année
    sexe: Homme-Femme
    description
    submit
-->


<!DOCTYPE html>
<html>
    <style>
        label, select{float: left; width: 100px;}
        fieldset {width: 300px;}
        .submit{clear: both;}
        .erreur{background: #ff0000;}
        .succes{background: #669933;}
    </style>

    <form method="post">
        <fieldset>
         <legend>Informations</legend>
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" value=""><br><br>

            <label for="prenom">Prenom :</label><br>
            <input type="text" id="prenom" name="prenom" value=""><br><br>

            <label for="phone">Telephone :</label><br>
            <input type="text" id="phone" name="phone" value=""><br><br>

            <label for="profession">Profession :</label><br>
            <input type="text" id="profession" name="profession" value=""><br><br>

            <label for="ville">Ville :</label><br>
            <input type="text" id="ville" name="ville" value=""><br><br>

            <label for="cp">Code postal :</label><br>
            <input type="text" id="cp" name="cp" value=""><br><br>

            <label for="adresse">Adresse :</label><br>
            <textarea id="adresse" name="adresse" value=""></textarea><br><br>

            <legend>Informations Supplémentaire</legend><br>

            <label>Date de Naissance :</label><br><br><br>

            <select name="jour" id="jour">
                <?php for ($i=1;$i<=31;$i++)
                    if($i<=9){
                        echo "<option>0$i</option>";
                    }else{
                        echo "<option>$i</option>";
                    }
                ?>
            </select>
            <select name="mois" id="mois">
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juil</option>
                <option value="08">Aout</option>
                <option value="09">Sept</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Déc</option>
            </select>
            <select name="annee" id="annee">
                <?php for ($i= date("Y");$i>=1930;$i--){
                         echo "<option>$i</option>";
                }
                ?>       
            </select><br><br>
            <label for="sexe">Sexe :</label><br>
             Homme: <input type="radio"  name="sexe" value="m" checked>
             Femme: <input type="radio"  name="sexe" value="f"><br><br>

            <label for="description">Description :</label><br>
            <textarea id="description" name="description"></textarea><br><br>

            <input type="submit" name="inscription" value="s'inscrire" class="submit"><br><br>
        </fieldset>
    </form>
</html>