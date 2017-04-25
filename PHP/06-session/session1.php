<?php

// *****************
// les sessions
// *****************

    // Le terme de SESSION désigne la période de temps correspondant à la navigation continue de l'internaute sur un site : continue, car si l'internaute ferme la session le navigateur, la SESSION s'interrompt.  

    // Principe : un fichier temporaire appelé session est crée sur le serveur, avec un identifiant unique. Cette session est liée à un internaute car, dans le même temps, un cookie est déposé sur le poste de l'internaute avec l'identifiant. Ce cookie se détruit lorsqu'on quitte le navigateur. 
    
    // On stocke entre autre dasn une session, les paniers d'achats ou les informations de connexion. Ces informations sont accessibles dans tous les scripts du site grace à la session. 


// Création ou ouverture d'une session : 
    session_start();  // permet de créer un fichier de session sur le serveur ou de l'ouvrir si il existe dèjà. 

// Remplissage de la session : 
    $_SESSION['pseudo'] = 'Jean';
    $_SESSION['mdp'] = '1234'; // $_SESSION est une superglobale, donc un array. 

    echo '1- session après remplissage : ';
    echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Vider une partie de la session en cours : 
    unset($_SESSION['mdp']);  // Nous pouvons supprimmer une partie de la session avec unset()

    echo '<br> 2- session après suppr mdp : ';
    echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Supprimer entierement la session :
   // session_destroy();  // Suppression de la sessions MAIS il faut savoir que la session destroy est d'abord vu par l'interpréteur qui ne l'exute qu'a la fin du script

    echo '<br> 3- après suppr total : ';
    echo '<pre>'; print_r($_SESSION); echo '</pre>'; // en effet, on voit encore le contenu de la session car la suppression n'intervient qu'a la fin du script, pour s'en convaincre, verifier le fichier suppr dans le dossier xampp/tmp. '