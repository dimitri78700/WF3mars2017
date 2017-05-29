<?php

// 02-gette-setter-constructeur-this
    // -> Homme.class.php

    class Homme{
        private $prenom; // Propriété private
        private $nom; // Propriété private

        public function setPrenom($arg){
            if(!empty($arg) && is_string($arg) && strlen($arg) > 3 && strlen($arg) < 20){
                $this -> prenom = $arg; 
            }
        }
        public function getPrenom(){
            return $this -> prenom;
        }

         public function setNom($arg){
            if(!empty($arg) && is_string($arg) && strlen($arg) > 3 && strlen($arg) < 20){
                $this -> nom = $arg; 
            }
        }
        public function getNom(){
            return $this -> nom;
        }
    }

    

// ----------------------------------

    $homme = new Homme;

    // $homme -> prenom = 'Dimitri'; // ERREUR : Propriété private donc innaccessible ) l'exterieur de la classe 
    // echo $homme -> prenom;  

    $homme -> setPrenom('Dimitri');
    echo 'Prénom : ' . $homme -> getPrenom() . '<br>';

    $homme -> setNom('Raievsky');
    echo 'Nom : ' . $homme -> getNom();

    /*
    Commentaire :
        Pourquoi faire des getters et des setters ? 
            - Le PHP est un language qui ne type pas ses varibles. Il faut systématiquement controler l'intégrité des données renseignées . 

            - Donc utiliser la visibilité PRIVATE est une très bonne contrainte . Tout dev' devra OBLIGATOIRE passer le setter pour affecter une valeur, et donc par les controles ! 

            Setter : Affecter une valeur 
            Getter : Récup une valeur 
            On aura autant de Getter et Setter que de propriétés private

            $this réprésente à l'interieur de la classe l'objet en cours de manipulation 
    */