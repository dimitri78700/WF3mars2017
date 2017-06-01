<?php

    //src/Controller/ProduitController.php

    namespace Controller; 

    use Controller\Controller;

    class ProduitController extends Controller{
        
        public function afficheAll(){
            $produits = $this -> getRepository() -> getAllProduits();
            $categories = $this -> getRepository() -> getAllCategories();

            $params = array(
			"categories" => $categories,
			"produits" => $produits,
			"title" => 'Ma boutique',

		    );

            return $this -> render('layout.html', 'boutique.html', $params);
            
        }

         public function affiche($id){
             $produits = $this -> getRepository() -> getProduitById($id);
             $suggestions = $this -> getRepository() -> getAllSuggestions($produits['categorie'], $produits['id_produit']);

            $params = array(
			"produit" => $produit,
			"suggestions" => $suggestions,
			"title" => 'fiche produit - ' . $produit['titre']

		    );

            return $this -> render('layout.html', 'fiche_produit.html', $params);
        }


         public function categories ($categorie){
             $produits = $this -> getRepository() -> getAllProduitsByCategories($categorie);
             $categories = $this -> getRepository() -> getAllCategories();

             $params = array(
			"produits" => $produits,
			"categories" => $categories,
			"title" => 'fiche produit - ' . $categorie

		    );

            return $this -> render('layout.html', 'categorie.html', $params);
        }
        
                
        
    }