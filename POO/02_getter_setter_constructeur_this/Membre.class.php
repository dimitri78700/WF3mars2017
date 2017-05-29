<?php

// 02-gette-setter-constructeur-this
    // -> Membre.class.php

    class Membre {

        private $pseudo;
        private $mdp;

        public function setPseudo($pseudo){
            if(!empty($pseudo) && is_string($pseudo) && strlen($pseudo) > 2 && strlen($pseudo) < 20){
                $this -> pseudo = $pseudo; 
            } else {
                return FALSE;
            }
        }
        public function getPseudo(){
            return $this -> pseudo;
        }

        public function setMdp($mdp){
            if(!empty($mdp) && is_string($mdp)){
                // $this -> mdp = $mdp; 
                $salt = 'Dimitri' . time();
                $salt = md5($salt);

                // Enregistrement dans la BDD. 
                $mdp_crypter = $mdp;
                $mdp_crypter = md5($mdp_crypter);
                $this -> mdp = $mdp_crypter;

            }
        }
        public function getMdp(){
            return $this -> mdp;
        }
    }
    

// --------------------------
// Exercice : Au regard de cette classe, veuillez créer un membre, affecter des valeurs à pseudo et mdp et les afficher : 

     $membre = new membre;

     $membre -> setPseudo('Dimmmm');
        echo 'Pseudo : ' . $membre -> getPseudo() . '<br>';

     $membre -> setMdp('123456');
        echo 'Mdp : ' . $membre -> getMdp();