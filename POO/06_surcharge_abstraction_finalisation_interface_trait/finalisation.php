<?php
// 06 - surcharge_abstraction_finalisation_interface_trait
    // finalisation.php


    final class Application { // Création d'une classe finale : signifiant qu'elle ne pourra pas être héritée
            public function run(){
                return 'Application Lancée !';
            }
    }

// --------------

    // class Extention extends Application {  // INPOSSIBLE ! une classe finale ne peut pas être héritée
    //  }

    $app = new Application; // OK une classe finale peut etre instanciée 
    $app -> run();


    class Application2 {
        final public function run2(){
            return 'Application lancée !'

        }

    }

    class Extension2 extends Application2 { // Application 2 n'est pas final donc on peut en héritée 
        public function run2(){ // ERREUR IMPOSSIBLE de rédéfinir ni de surcharger une méthode final. 

        }
    }


    /*
    Commentaire :
        - Une classe finale ne peut pas etre héritée 
        - Une classe finale peut être instanciée
        - Une classe finale n'a pas forcément que des méthodes finales puisque par définition elle ne pourra être héritée donc ses méthodes ne pourront être surchargées ou redéfinies. 

        - Une méthode final peut être présente dans une classe "normale"
        - Une méthode final ne peut pas être surchargée ou redéfinie
    */