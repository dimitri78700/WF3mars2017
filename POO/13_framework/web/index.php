<?php

session_start();
require_once(__DIR__ . '/../vendor/autoload.php');



if(isset($_GET['controller']) && !empty($_GET['controller']) && isset($_GET['action']) && !empty($_GET['action'])){
    $controller = 'Controller\\' . ucfirst($_GET['controller']) . 'Controller';
    if(file_exists(__DIR__ . '/../src/Controller/' . ucfirst($_GET['controller']) . 'Controller.php')){
        $a = new $controller;
        $action = strtolower($_GET['action']);
        if(method_exists($a, $action)){
            if(isset($_GET['id'])){
                $id = (int) $_GET['id'];
                $a -> $action($id);
            } elseif(isset($_GET['categorie'])){
                $cat = (string) $_GET['categorie'];
                $a -> $action($cat);
            }
                else {
                $a ->$action();
            }
        }
    }
} else {
    $a = new Controller\ProduitController;
    $a -> afficheAll();
}


// // Test 1 : Entity Produit 
// $produit = new Entity\Produit;
// $produit -> setTitre('mon produit');
// echo $produit -> getTitre();


// // TEST 2 : PDOManager
// $pdom = Manager\PDOManager::getInstance();
// $resultat = $pdom -> getPdo() -> query("SELECT * FROM produit");
// $produit = $resultat -> fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($produit);
// echo '</pre>'; 

// TEST 3 : EntityRepository
// $er = new Manager\EntityRepository;

// $resultat = $er -> findAll();

// echo '<pre>';
// print_r($resultat); 
// echo '</pre>';

// $resultat = $er -> find(6);

// echo '<pre>';
// print_r($resultat); 
// echo '</pre>';

// $resultat = $er -> delete(7);

// echo '<pre>';
// print_r($resultat); 
// echo '</pre>';


// $produit = array(

//     "id_produit" => NULL,
//     "reference" => "erggrgr",
//     "categorie" => "pantalon",
//     "titre" => "couleur",
//     "prix" => "15",
//     "taille" => "M",
//     "stock" => "3",
//     "public" => "f",
//     "photo" => "couleur.jpg",
//     "couleur" => "rouge",
//     "description" => "rgrgrgrgrgrg",
// );

// $resultat = $er -> register($produit);

// echo '<pre>';
// print_r($resultat); 
// echo '</pre>';


// TEST 4 : ProduitRepository
// $pr = new Repository\ProduitRepository;

// $resultat = $pr -> getAllProduit();
// $resultat = $pr -> getProduitById(5);
// $resultat = $pr -> DeleteProduitById(8);
// $resultat = $pr -> getAllProduitByCategorie('pull');
// $resultat = $pr -> getAllSuggestions('jean', 6);


//TEST 5 : ProduitController : 
// $pc = new Controller\ProduitController;
// $pc -> afficheAll();
// $pc -> affiche(6);
// $pc -> categories('jean');



