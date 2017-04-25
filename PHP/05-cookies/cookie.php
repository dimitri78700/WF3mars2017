<?php 


    // **********************
    // Les cookies
    // **********************

        // . un cookie est un petit fichier (4ko max) déposé par le serveur du site sur le poste de l'internaute, et qui peut contenir des informations sous forme de texte. Les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par les cookies. 

        // . PHP peut très facilement récupérer les données contenues dans un cookie : ses informations sont stockées dans la superglobale $_COOKIE. 

        // . Précaution à prendre avec les cookies : un cookie étant sauvegardé sur le poste de l'internaute, il peut être volé ou détourné. On n'y stocke donc pas de données sensibles (mot de passe , CB .... )


    //  Application pratique : nous allons stocker la langue choisie par l'internaute dans un cookie. 

        // 1. affectation de la langue à la variable  $langue : 


            if(isset($_GET['langue'])) {  // Si une langue est passée dans l'url c'est que nous avons cliqué sur un lien 
                $langue = $_GET['langue'];
            }elseif (isset($_COOKIE['langue'])) { // $_COOKIE est une superglobale dont l'indice correspond au nom du cookie. On entre dans le elseif si un cookie appeler "langue" a été envoyé par le client
                $langue = $_COOKIE['langue'];
            }else{
                $langue ='fr';  // par default, si aucun choix est fait et que n'existe pas le cookie, alors on affecte 'fr'. 
            }


        // 2. Envoi du cookie avec la langue 

            $un_an = 365*24*60*60;  // un an exprimé en secondes

            setcookie('langue', $langue, time() + $un_an);  // setcookie('nom', 'valeur', 'date', 'expiration en timesstamp') permet de créer et d'envoyer le cookie vers le client. 


        // 3. Affichage de la langue 

             echo 'votre langue : ' ;
                switch($langue) {
                    case 'fr' : echo 'francais'; break;
                    case 'es' : echo 'espagnol'; break;
                    case 'en' : echo 'anglais'; break;
                    case 'it' : echo 'italien'; break;
                }


?>


<h1>Votre langue : </h1>

<ul>
    <li><a href="?langue=fr">Francais</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=en">Anglais</a></li>
    <li><a href="?langue=it">Italien</a></li>
</ul>