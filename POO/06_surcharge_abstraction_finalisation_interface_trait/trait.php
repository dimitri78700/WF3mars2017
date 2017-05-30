<?php
// 06 - surcharge_abstraction_finalisation_interface_trait
    // trait.php

    // Attention : les traits ne fonctionnent que depuis PHP 5.4 

    trait TPanier {
        public $nbProduit = 1;

        public function affichageProduit(){
            return 'Affichage des produits dans le panier';
        }
    }

// --------------

    trait TMembre {
        public function affichageMembre(){
            return 'Affichage des membres';
        }
    }

// --------------

    class Site {
        use TPanier, TMembre;
        // use permets d'importer le code contenu dans un ou plusieurs traits'
    }

// --------------

    $site = new Site;
    echo $site -> affichageProduit() . '<br>';
    echo $site -> affichageMembre() . '<br>';


 /*
    Commentaire :
        - les traits permettent d'importer du code dans une classe'
        - ils ont été inventés pour repousser l'héritage non multiple'
        - Une classe peut importer plusieurs traits
        - un trait peut importer un trait  
    */