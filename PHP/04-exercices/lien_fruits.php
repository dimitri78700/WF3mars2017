<?php

// Exercice :

    // faire 4 liens hmtl avec le nom des fruits. 
    // Quand on click sur un lien , on affiche sur le prix pour 1000g de ce fruit dans cette page lien_fruits.php 

   include('fonction.inc.php');

   if(isset($_GET['fruit'])){
            echo calcul($_GET['fruit'], 1000);
        }
        else{
            echo 'choisir un fruit';
    }

?>
    <h1>Nos fruits :</h1>

    <a href="lien_fruits.php?fruit=cerises">Cerises</a>
    <br>
    <a href="lien_fruits.php?fruit=bananes">Bananes</a>
    <br>
    <a href="lien_fruits.php?fruit=peches">Peches</a>
    <br>
    <a href="lien_fruits.php?fruit=pommes">Pommes</a>

    