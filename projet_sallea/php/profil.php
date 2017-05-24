<?php
    require_once('inc/init.inc.php');
        //-------------------- TRAITEMENT ---------------------- 
            // Si visiteur nn connecté, on l'envoie vers connexion.php :
            if(!internauteEstConnecte()){
                header('location:connexion.php'); // Nous l'inviton à se connecter
                exit();
            }
            // echo '<pre>';print_r($_SESSION); echo '</pre>';
            $contenu .= '<h2>Bonjour ' . $_SESSION['membre']['pseudo']. ' ! </h2>';
            
            // On affiche le statut du membre :
            if($_SESSION['membre']['statut'] == 1){
                $contenu .= '<p>Vous êtes un administrateur</p>';
            }
            else{
                $contenu .= '<p>Vous êtes un membre</p>';                
            }
            $contenu .= '<div><h3>Voici vos information de profil</h3>';            
                $contenu .= '<p> Votre pseudo : ' . $_SESSION['membre']['pseudo'] . '</p>';
                $contenu .= '<p> Votre nom : ' . $_SESSION['membre']['nom'] . '</p>';
                $contenu .= '<p> Votre prenom : ' . $_SESSION['membre']['prenom'] . '</p>';
                $contenu .= '<p> Votre email : ' . $_SESSION['membre']['email'] . '</p>';
            $contenu .= '</div>';            
            
        //-------------------- AFFICHAGE ---------------------- 
    require_once('inc/header.inc.php');
    echo $contenu;
?>
<?php
    require_once('inc/footer.inc.php');
?>