<?php

namespace Model;
use App\Cnx;

class User {
    
        /**
         * @var int
         */
        private $id; 

        /**
         * @var string
         */
        private $firstname;
        /**... 3 lines */
        private $lastname;
        /**... 3 lines */
        private $email;
        /**... 3 lines */
        private $adresse;
        
        public function __construct(
                
            $firstname = null,
            $lastname = null,            
            $email= null,
            $adresse = null,
            $id = null

        ) {
            $this->id = $id;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->adresse = $adresse;
        }

        public function getId() {
            return $this->id;
        }

        public function getFirstname() {
            return $this->firstname;
        }

        public function getLastname() {
            return $this->lastname;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getAdresse() {
            return $this->adresse;
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function setFirstname($firstname) {
            $this->firstname = $firstname;
            return $this;
        }

        public function setLastname($lastname) {
            $this->lastname = $lastname;
            return $this;
        }

        public function setEmail($email) {
            $this->email = $email;
            return $this;
        }

        public function setAdresse($adresse) {
            $this->adresse = $adresse;
            return $this;
        }
        /**
         * Méthode qui retourne tous les utilisateurs enregistrés en BDD
         * 
         * @return array Un tableau d'objets User
         */
        public static function findAll(){
            $pdo = Cnx::getInstance();
            $query = 'SELECT * FROM user ORDER BY id';
            $stmt = $pdo->query($query);
            $dbUsers = $stmt->fetchAll();
            $users = [];
            
            foreach ($dbUsers as $dbUser){
                $user = new self (
                        $dbUser['firstname'],                        
                        $dbUser['lastname'],
                        $dbUser['email'],
                        $dbUser['adresse'],
                        $dbUser['id']

                     );
                
                $users[] = $user;
            }
            
            return $users;
        }
}
