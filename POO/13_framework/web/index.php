<?php

session_start();
require_once(__DIR__ . '/../vendor/autoload.php');


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


// echo '<pre>';
// print_r($resultat); 
// echo '</pre>';
