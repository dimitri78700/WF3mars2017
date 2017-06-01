<?php
    //vendor/Repository/ProduitRepository.php

    namespace Repository;

    use Manager\EntityRepository; // /!\ Trés important car l'héritage ne permet pas de charger le fichier' /!\
    use PDO;

    class ProduitRepository extends EntityRepository{

    // Tout le code de EntityRepository est présent ici
	
	
        public function getAllProduits(){
            return $this -> findAll();
        }

        public function getProduitById($id){
		    return $this -> find($id);
	    }

        public function deleteProduitById($id){
            return $this -> delete($id);
        }

        public function registerProduit($infos){
		    return $this -> register($infos);
	    }


        // requetes spécifiques //  

        public function getAllCategories(){

		// récupére toutes les catégories

            $requete = "SELECT DISTINCT categorie FROM produit";
            $resultat = $this -> getDb() -> query($requete);
            
            $cat = $resultat -> fetchAll(PDO::FETCH_ASSOC);
            
            if(!$cat){
                return false;
            }
            else{
                return $cat;
            }
	    }


        public function getAllProduitsByCategories($categorie){

		//récupére tous les produits en fonction d'une catégorie
            $requete = "SELECT * FROM produit WHERE categorie = :categorie";
            $resultat = $this -> getDb() -> prepare($requete);
            $resultat -> bindParam (':categorie', $categorie, PDO::PARAM_STR);
            $resultat -> execute();
            $cate = $resultat -> fetchAll(PDO::FETCH_ASSOC);
            
            if(!$cate){
                return false;
            }
            else{
                return $cate;
            }
           
	    }


         public function getAllSuggestions($categorie, $id){

		// récupére toutes les suggestions

            $requete = "SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit <> $id";
            $resultat = $this -> getDb() -> query($requete);
            
            $suggestion = $resultat -> fetchAll(PDO::FETCH_ASSOC);
            
            if(!$suggestion){
                return false;
            }
            else{
                return $suggestion;
            }
	    }






























 }