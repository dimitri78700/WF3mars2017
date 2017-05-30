<?php 

// 07 - Methode Magique

    class Societe{

        public $adresse;
        public $ville;
        public $cp;
        
        public function __set($nom, $valeur){ // s'exécute au moment où on essaie d'affecter une valeur à une propriété qui n'existe pas 
            echo '<p style="color: white; background: red; padding: 5px">DSL mais la propriété ' . $nom . ' nexiste pas dans cette classe ! donc la valeur <strong> ' . $valeur .  '</strong> na pas pu etre affecter </p>';
        }

        public function __get($nom){
            echo '<p style="color: white; background: red; padding: 5px">DSL mais la propriété ' . $nom . ' nexiste pas dans cette classe ! </p>';
        }

        // __call() = quand j'appelle une méthode qui n'existe pas. 
        // __callstatic() = quand j'appelle une méthode static qui n'existe pas. 
        // __isset() = quand on fait une condition isset ou empty sur une propriété de mon objet 
        // __destruct() = s'exécute quand le script est terminé (pratique pour ferme une connexion à la BDD)
        // __toString() = se lance quand on essaie de faire un echo sur un objet

        // et pleins d'autres comme __wakeup(), __sleep(), __invoke(), __clone()...... 
    }

// ------------------

    $societe = new Societe;
    $societe -> pays = 'France';
