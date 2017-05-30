<?php
// 06 - surcharge_abstraction_finalisation_interface_trait
    // surcharge.php

    // Surcharge ou override : Permet de modifier le comportement d'une méthode héritée et d'y apportter des traitement supplémentaire 
    // Surcharge != rédéfinition 

    class A {
        public function calcul(){
            return 10;
        }

    }

    class B extends A {  // B hérite de A 
        public function calcul(){

            // return $this -> calcul() + 5; ne fonctionne pas car s'appelle soit meme : recursivité'
            
            return parent::calcul() + 5; // OK permet d'appeler le comportement de la méthode calcul() telle que définie dans la classe parente. 
        }
    }