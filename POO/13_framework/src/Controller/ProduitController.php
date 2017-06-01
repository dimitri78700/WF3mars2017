<?php

    //src/Controller/ProduitController.php

    namespace Controller; 

    use Controller\Controller;

    class ProduitController extends Controller{
        
        public function afficheAll(){
            $produit = $this -> getRepository() -> getAllProduits();
            $categorie = $this -> getRepository() -> getAllCategories();

            // $this -> render()

            require('../View/Produit/boutique.php');
        }

         public function affiche($id){
             $produit = $this -> getRepository() -> getProduitById($id);
             $suggestion = $this -> getRepository() -> getAllSuggestions($produit['categorie'], $produit['id_produit']);

             // $this -> render()

           require('../View/Produit/fiche_produit.php');
        }


         public function categories ($categorie){
             $produit = $this -> getRepository() -> getAllProduitsByCategories($categorie);
             $categorie = $this -> getRepository() -> getAllCategories();

              // $this -> render()

            require('../View/Produit/categorie.php');
        }
        
                
        
    }