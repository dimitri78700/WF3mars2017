<?php

// 01- Class Objet instance visibilite //

        // -> Panier.class.php

        class Panier {

            public $nbProduit;  // propriété (variable)

            public function ajouterProduit() {
                return ' Article Ajouter ! '; 

            }

            protected function retirerProduit(){
                return ' Article Retirer ! ';
            }

            private function affichagePanier(){
                return ' Voici les produits dans le panier ';
            }

        }

// ------------------------------

        $panier = new Panier;  // Instanciation $panier représente un objet de la classe Panier.

        var_dump($panier);
        var_dump(get_class_methods($panier));

        $panier -> nbProduit = 5;
        echo ' Nombre de produits : ' . $panier -> nbProduit . '<br>';
        echo '<pre>';
        var_dump($panier);
        echo '</pre>';

        echo 'Panier : ' . $panier -> ajouterProduit() . '<br>';  

        // echo 'Panier : ' . $panier -> retirerProduit() . '<br>';  // Erreur : Impossible d'accéder à un élément protected à l'exterieur de la classe.
        // echo 'Panier : ' . $panier -> affichageProduit() . '<br>'; // Erreur : Impossible d'accéder à un élément private à l'exterieur de la classe.

        $panier2 = new Panier;
        echo '<pre>';
        var_dump($panier2);
        echo '</pre>';

        /*
        Commmentaire :
        
            New : Est un mot clé qui permet de créer un objet issus d'une classe (instanciation)

            On peut créer plusieurs objets d'une même classe. Et lorsqu'on affecte une valeur à une propriété d'un objet cela n'a pas d'incidence sur les autres objets de la classe. 

            Niveau de visibilité :
            - Public : Accessible de partout 
            - Protected : Accessible depuis la classe où l'élément à été déclaré ainsi que depuis les classes héritères.
            - Private : Accessible UNIQUEMENT depuis la classe où l'élément à été déclaré. 
        */