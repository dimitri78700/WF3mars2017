<?php

    // Exercice : créer le forumulaire indiqué au tableau, récupérer les données saisies et les afficher dans la même page. 


     print_r($_POST);

     echo '<br>';

     if(!empty($_POST)) { 
        echo 'ville : ' . $_POST['ville']. '<br>';
        echo 'codepostal : ' . $_POST['codepostal']. '<br>';
        echo 'adresse : ' . $_POST['adresse']. '<br>';
     }

    

?>
    <h1>Formulaire</h1>
    <form action="" method="post">

            <label for="ville">Ville : </label>
            <input type="text" id="ville" name="ville"><br>

            <label for="codepostal">Code Postal : </label>
            <input type="text" id="codepostal" name="codepostal"><br>

            <label for="adresse">Adresse : </label>
            <textarea name="adresse" id="adresse"></textarea><br>

            <input type="submit" name="validation" value="envoyer">
    </form>