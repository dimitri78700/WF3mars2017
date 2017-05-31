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

// $resultat = $er -> find(7);

// echo '<pre>';
// print_r($resultat); 
// echo '</pre>';


