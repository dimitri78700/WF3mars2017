<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sallea</title>

        <!-- les liens Bootstrap-->

        <link rel="stylesheet" href="<?php echo RACINE_SITE . '/inc/css/bootstrap.min.css';?>">
        <link rel="stylesheet" href="<?php echo RACINE_SITE . '/inc/css/shop-homepage.css';?>">
        <link rel="stylesheet" href="<?php echo RACINE_SITE . '/inc/css/portfolio-item.css';?>">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="<?php echo RACINE_SITE . 'inc/js/jquery.js';?>"></script>
        <script src="<?php echo RACINE_SITE . 'inc/js/bootstrap.min.js';?>"></script>
    </head>

    <body>

        <!-- Navigation -->

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo RACINE_SITE . 'sallea.php'; ?>">SalleA</a>
                
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php 
                        echo '<li><a href="'. RACINE_SITE .'sallea.php">Qui sommes nous</a></li>';
                        echo '<li><a href="'. RACINE_SITE .'contact.php">Contacts</a></li>';

                            if(internauteEstConnecte()){ // si membre est connecté

                                echo '<ul class="nav navbar-nav navbar-right">
        
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Espace membre <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="'. RACINE_SITE .'profil.php">Profil</a></li> 
                                    <li><a href="#">Mes commandes</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="'. RACINE_SITE .'connexion.php?action=deconnexion">Se déconnecter</a></li>
                                </ul>
                                </li>
                            </ul>';      
                            }

                            else{ // Sinon s'il n'est pas connecté
                            
                                 echo '<ul class="nav navbar-nav navbar-right">
        
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Espace membre <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="'. RACINE_SITE .'inscription.php">Inscription</a></li>
                                    <li><a href="'. RACINE_SITE .'connexion.php">Connexion</a></li>';                                
                            }

                            // Menu admin :

                            if(internauteEstConnecteEtEstAdmin()){

                                echo '<li><a href="'. RACINE_SITE .'admin/gestion_des_salles.php">Gestion salles</a></li>';
                                echo '<li><a href="'. RACINE_SITE .'admin/gestion_des_produit.php">Gestion produits</a></li>';   
                                echo '<li><a href="'. RACINE_SITE .'admin/gestion_des_membre.php">Gestion membres</a></li>';   
                                echo '<li><a href="'. RACINE_SITE .'admin/gestion_des_avis.php">Gestion avis</a></li>';   
                                echo '<li><a href="'. RACINE_SITE .'admin/gestion_des_commandes.php">Gestion commandes</a></li>';   
                            }
                        ?>
                    </ul>
                </div>
            </div> <!-- .container -->
        </nav>
        
        <div class="container" style="min-height: 80vh;">
            <!-- ici il y a le contenu spécifique de chaque page -->