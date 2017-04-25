<?php

    // Exercice :

        // 1. Réaliser un formulaire permettant de séléctionner un fruit dans un sélécteur, et de saisir un poids quelconque exprimé en grammes.
        // 2. faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué, en passant par la fonction calcul
        // 3. faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire après que celui-ci soit validé.

         echo '<br>';

         include('fonction.inc.php');

         if(isset($_POST['fruit'])){ 
                echo calcul($_POST['fruit'], $_POST['poids']) . '<br>';
            }



?>

        <h1>Formulaire</h1>
        <form action="" method="post">

            <select id="select" name="fruit">
                <option value="NULL">--Selectionner--</option>

                <option value="bananes"<?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'bananes') echo 'selected';  ?>>Bananes</option>

                <option value="cerises"<?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'cerises') echo 'selected';  ?>>Cerises</option>
                
                <option value="peches"<?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'peches') echo 'selected';  ?>>Peches</option>

                <option value="pommes"<?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'pommes') echo 'selected';  ?>>Pommes</option> 
            </select><br>

            <label for="poids">Poids</label><br>
            <input type="number" name="poids" value"<?php echo $_POST['poids'] ?? ''; ?>"><br>

            <input type="submit" name="validation" value="envoyer">
    </form>