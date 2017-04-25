<?php

// Création ou ouverture de la session : 
    session_start();  // lorsque j'effectue un session_start(), la session n'est pas recrée car elle existe dèja grace au session_start() lancé dans le fichier session1.php. 

    echo ' la session est accessible dans tous les scripts du site : ';
    echo '<pre>'; print_r($_SESSION); echo '</pre>';  // affiche le contenu de la session

// Ce fichier session2.php n'as rien avoir avec l'autre, il n'y a pas d'inclusion. Et pourtant il accéde à la session en cours créer dans la session1.php. Notez que c'est l'identifiant de la session envoyé dans un cookie dans le poste de l'internaute par session1.php qui indique quelle session ouvrir dans session2.php. 