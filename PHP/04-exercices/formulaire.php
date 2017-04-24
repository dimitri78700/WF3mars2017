<?php

    // Exercice :

        // 1. Réaliser un formulaire permettant de séléctionner un fruit dans un sélécteur, et de saisir un poids quelconque exprimé en grammes.
        // 2. faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué, en passant par la fonction calcul
        // 3. faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire après que celui-ci soit validé.

         echo '<br>';

         include('fonction.inc.php');

        if(isset($_POST['fruit'])){ 
                echo calcul($_POST['fruit'], $_POST['poids']);
            }
?>

        <h1>Formulaire</h1>
        <form action="" method="post">

            <select id="select" id="fruit">
                
                <option value="bananes">Bananes</option>
                <option value="cerises">Cerises</option>
                <option value="peches">Peches</option>
                <option value="pommes">Pommes</option> 
            </select>

            <label for="poids">Poids</label>
            <input type="number">

            <input type="submit" name="validation" value="envoyer">
    </form>