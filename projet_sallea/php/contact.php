<?php

    require_once('inc/init.inc.php');

     echo '<br>';

     if(!empty($_POST)) { 
        echo 'prenom : ' . $_POST['prenom']. '<br>';
        echo 'nom : ' . $_POST['nom']. '<br>';
        echo 'email : ' . $_POST['email']. '<br>';
        echo 'commentaire : ' . $_POST['commentaire']. '<br>';
     }

     require_once('inc/header.inc.php');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    
        <title>Document</title>
    </head>
    <body>

        <h2>Contactez-nous</h2>
        
        <form action="mailto:admin@admin.com" method="post">

            <label for="prenom">Prenom</label><br>
            <input type="text" id="prenom" name="prenom"><br>

            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom"><br>

            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" value=""><br>

            <label for="commentaire">Commentaire</label><br>
            <input type="text" id="commentaire" name="commentaire" value=""><br><br>

            <input type="submit" name="validation" value="envoyer">
        </form>
    </body>
</html>


<?php

require_once('inc/footer.inc.php');
?>


















