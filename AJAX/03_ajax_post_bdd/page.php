<?php 

    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

     $liste_prenom = $pdo->query("SELECT prenom, id_employes FROM employes ");
     $liste = "";
     while($personne = $liste_prenom->fetch(PDO::FETCH_ASSOC)){
         $liste .= '<option value="' . $personne['id_employes'] . '">' . $personne['prenom'] . '</option>';
     }

    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <style>
            form, #resultat {width: 50%; margin: 0 auto;}
            select, input {padding: 5px; width: 100%; border-radius: 3px; border: 1px solid; }
            input { cursor: pointer; }
            table { border-collapse: collapse; width: 80%; margin: 0 auto; color: black; }
            td, th { padding: 8px; background-color: red; }
        </style>
        <title>Document</title>
    </head>
    <body>
        <form id="mon_form">
            <label for="">Prénom</label>
            <select name="" id="choix">
                    <?php
                        // on récupére tous les prénoms dans la BBD entreprise sur la table employes et mettre l'id_employes dans la value
                        echo $liste;
                    ?>
            </select>
            </br>
            <input type="submit" id="valider" value="Valider">
        </form>
        <hr />
        <div id="resultat"></div>

         <script>
                // Mettre en place un événement sur la validation du formulaire ( submit )
                // Bloquer le rechargement de page conscutif à la validation du formulaire 
                // Déclencher une requete ajax qui envoie sur ajax php
                // Sur Ajax.php récupéré les infos de l'employes correspondant à l'id récup
                // Envoyer une réponse en forme de tableau html, le tableau doit avoir deux lignes, une avec le noms des colonnes et l'autre avec les valeurs

                var formulaire = document.getElementById("mon_form").addEventListener("submit", ajax);

                function ajax(event){
                    event.preventDefault();
                     var champSelect = document.getElementById("choix");
                     var valeur = champSelect.value;
                    console.log(valeur);

                     var file = "ajax.php";
                     var parametres = "personne="+valeur;

                     var xhttp = new XMLHttpRequest(); 

                     xhttp.open("POST", file, true);
                     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                      xhttp.onreadystatechange = function () {
                         if(xhttp.readyState == 4 && xhttp.status == 200){

                            var reponse = JSON.parse(xhttp.responseText);
                            document.getElementById("resultat").innerHTML = reponse.resultat;
                    }
                }
                xhttp.send(parametres); // envoie
            }
        </script>
    </body>
</html>