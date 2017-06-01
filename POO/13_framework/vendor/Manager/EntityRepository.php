<?php

    namespace Manager; 
    use PDO;

    class EntityRepository {

       private $db;  // Contiendra la connexion à la BDD (objet, PDO, récupéré grâce à PDOManager)

       public function getDb(){
		$this -> db = PDOManager::getInstance() -> getPdo();
		return $this -> db;
        }

       public function getTableName(){
		// Objectif : récupérer le nom de la table à interroger selon l'entité dans laquelle je suis'
            // get_called_class() nous retourne le nom de la classe dans laquelle nous somme.
            // Soit ex : Repository\ProduitRepository. 
            
            return strtolower(str_replace(array('Repository\\', 'Repository'), '', get_called_class()));

        //  return 'produit';
	    }
   

	// REQUETES GENERIQUES !!

        // Récupére toutes les infos d'une table :
        public function findAll(){
            $requete = "SELECT * FROM " . $this -> getTableName();
            $resultat = $this -> getDb() -> query($requete);
            
            $donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC);
            
            if(!$donnees){ // si c'est false;
                return FALSE;
            }
            else{
                return $donnees;
            }
        
        }

        //Récupére toutes les infos d'un enregistrement par son ID
        public function find($id){
            $requete = "SELECT * FROM " . $this -> getTableName() . " WHERE id_" . $this -> getTableName() . " = :id"; 

            // SELECT * FROM produit WHERE id_produit = :id;
            // SELECT * FROM produit WHERE id_membre = :id;

            $resultat = $this -> getDb() -> prepare($requete);
            $resultat -> bindParam (':id', $id, PDO::PARAM_INT);
            $resultat -> execute();

            $donnees = $resultat -> fetch(PDO::FETCH_ASSOC);

                if(!$donnees){ // si c'est false;
                    return FALSE;
                }
                else{
                    return $donnees;
                }

            }
          
        public function delete($id){
            $requete = "DELETE FROM " . $this -> getTableName() . " WHERE id_" . $this -> getTableName() . " = :id"; 

            $resultat = $this -> getDb() -> prepare($requete);
            $resultat -> bindParam (':id', $id, PDO::PARAM_INT);
            $resultat -> execute();

            return $resultat;

            }

        public function register($infos){
            $requete = 'INSERT INTO '  . $this -> getTableName() . ' (' . implode(',' , array_keys($infos)) . ' ) VALUES ( ' . ":" . implode(",:" , array_keys($infos)) . ')';
            
            $resultat = $this -> getDb() -> prepare($requete);
            $resultat -> execute($infos);

                if(!$resultat){ // si c'est false;
                    return FALSE;
                }
                else{
                    return $this -> getDb() -> lastInsertId();
                }
        }

        
 }