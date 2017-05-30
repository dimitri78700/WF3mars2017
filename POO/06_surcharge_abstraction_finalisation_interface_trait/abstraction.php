<?php
// 06 - surcharge_abstraction_finalisation_interface_trait
    // abstraction.php

    abstract class Joueur{ // Création d'une classe abstraite. 
        public function seConnecter(){
            return $this -> etreMajeur();
        }

        abstract public function etreMajeur(); // Une methode abstraite n'a pas de contenu
    }


// ----------------

    class JoueurFr extends Joueur{
         public function etreMajeur(){
             return 18;

         }
    }

// ----------------

    class JoueurUs extends Joueur {
         public function etreMajeur(){
             return 21;

         }

    }

// -----------------

    $fr = new JoueurFr;
    echo $fr -> seConnecter() . '<br>';

    $us = new JoueurUs;
    echo $us -> seConnecter() . '<br>';


/*
    Commentaire : 
        - Une classe abstraite ne peut pas etre instancier
        - Les méthodes abstraites n'ont pas de contenu
        - Pour déclarer une méthode abstraite on doit obligatoirement être dans une classe abstraite. 
        - Une classe abstraite peut contenir des méthodes normales. 
        - Lorsqu'on hérite d'une classe on doit obligatoirement rédéfinir les méthodes abstraites. 

        Le développeur maitre, qui est au coeur de l'application, va obliger les autres dév à redéfinir des méthodes, ceci est une bonne pratique dans le cadre d'un travail collaboratif et hierarchisé. 
*/