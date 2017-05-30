<?php
// 06 - surcharge_abstraction_finalisation_interface_trait
    // interface.php


    interface Mouvement{

            public function start(); // Dans une interface les méthodes n'ont pas de contenu 
            public function turnRight();
            public function turnLeft();
    }


    class Bateau implements Mouvement{ // On utilise pas extends, mais implements dans le cadre des interface
        
            public function start(){   // OBLIGATION de définir toutes les méthodes récupérées via l'implémentation de l'interface. 

            }
            public function turnRight(){

            }
            public function turnLeft(){

            }
    }

    class Avion implements Mouvement {

            public function start(){

            }
            public function turnRight(){

            }
            public function turnLeft(){

            }
    }


  /*
    Commentaire :
        - Une interface est une liste de méthodes (sans contenu) qui permets de garantir que toutes les classes qui vont implémenter l'interface contiendront les méthodes, et ces méthodes auront le même nom. C'est une sorte de contrat passé entre le dév maitre et les autres dev', c'est un plan de fabrication d'une classe. 
        
        - Une interface n'est pas instanciable 
        - Une classe peut implémenter plusieurs interfaces
        - une classe peut à la fois extends une autres classe et impléments une ou plusieurs interface(s)
        - Les méthodes d'une interface doivent forcément être public sinon elles peuvent pas être définies'
    */