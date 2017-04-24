<?php

    // Exercice : créer le forumulaire "pseudo" et "email" dans formulaire3.php, en recupérent et affichant les informations dans formulaire4.php. 

    //  de plus, une fois le formulaire soumis,vous véréfiez que les pseudo n'est pas vide. Si tel est le cas, affichez un message d'erreur à l'internaute ( dans formulaire4.php).'

     echo '<br>';

     if(!empty($_POST)) { // = si le formulaire est soumis, il y a les indices correspondants aux names

         if(!empty($_POST['pseudo'])){ 
        echo 'pseudo : ' . $_POST['pseudo']. '<br>';
        
     } else {
        echo 'Erreur !';
     }
        echo '<br>';

        echo 'email : ' . $_POST['email']. '<br>';
     }
?>