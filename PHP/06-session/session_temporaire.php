<?php

// Contexte souvent sur les sites bnancaires vout êtes déconnecté auto au bout de 10mn d'inactivité.
    session_start();  // on crée une session 

    echo '<pre>'; print_r($_SESSION); echo '</pre>';  

    if(isset($_SESSION['temps']) && isset($_SESSION['limite'])) {

        // On vérifie si les 10sec sont écoulées :
            if(time() > ($_SESSION['temps'] + $_SESSION['limite'])){
                session_destroy();  // si les 10sec sont écoulées, on suppr la session 
                echo 'Session Expiré <hr>';
            } else {
                $_SESSION['temps'] = time(); // sinon on remet le temps à jour pour relancer les 10sec
                echo 'MAJ.. <hr>';
            }

   } else{   // On entre dans ce else la 1ere fois pour remplir la session : 
                $_SESSION['temps'] = time();  // On remplit la session avec un indice 'temps' qui contient le timestamp de l'instant présent. 
                $_SESSION['limite'] = 10;     // On fixe la durée limite de session à 10 secondes. 

        echo 'vous êtes connecté <hr>';
    }