<style>
    h2{
        font-size: 15px; color: red;
      }
</style>

<?php



//-------------------------------------
    echo '<h2> les balises PHP </h2>';
//-------------------------------------
?>

    <?php 
        // Pour Ouvrir un passage en PHP, on utilise la balise précédente 
        // Pour Fermer un passage en PHP, on utilise la balise suivante :
      ?>

<strong>Bonjour</strong>   <!-- En dehors des balises d'ouverture et de fermeture du PHP, nous pouvons ecrire du HTML -->


<?php 
//-------------------------------------------
    echo '<h2> Ecriture et affichages </h2>';
//--------------------------------------------

    echo 'bonjour';  // echo est une instruction qui nous permet d'effectuer un affichage. Notez que les instructions se terminent par un  ";".
    echo '<br>';  // On peut mettre des balises HTML dans un echo, elles sont interprétées comme telles.

    print 'Nous sommes jeudi'; // Print est une autre instruction d'affichage.


// Pour infos il existe d'autres instructions d'affichage ( cf plus loin ): 

// print_r();
// var_dump(); 


//--------------------------------------------------------------
echo '<h2> Variable : types / déclaration  / affectation </h2>';
//---------------------------------------------------------------

// Définition : une variable est un espace mémoire nommé qui permet de conserver une valeur.

// En PHP, on déclare une variable avec le signe $


$a = 127;  // Je déclare la variable a, et je lui affecte la valeur 127  // le type de la variable a est integer ( entier )


$b = 1.5; // un type double pour nombre à virgule

$a = 'une chaine de caractères';  // Un type de string pour une chaine de caractères.


$b = '127'; // il s'agit aussi d'un string car il y a des quotes


$a= true; // Un type boolean qui prend que 2 valeurs possibles : true ou false 



//-----------------------------
echo '<h2> Concaténation </h2>';
//-----------------------------

$x = 'bonjour ';
$y = 'tout le monde';

echo $x . $y . '<br>';  // Point de concaténation que l'on peut traduire par 'suivi de'

echo "$x $y <br>";  // on obtient le même résultat dans concaténation ( CF chapitre d'aprés pour l'explication de l'évaluation des variables dans les guillemets ).

//--------------
// concaténation lors de l'affectation 

$prenom1 = 'bruno'; // déclaration de la variable $prenom1.
$prenom1 = 'Claire';  // Ici la valeur Claire écrase la valeur précédente Bruno qui était contenue dans la variable 
echo $prenom1 . '<br>'; // affiche Claire 

$prenom2 = 'bruno'; 
$prenom2 .= 'Claire'; // On affecte la valeur "Claire" à la variable $prenom2 en l'ajoutant à la valeur précedement contenue dans la variable grâce à l'opérateur .=
echo $prenom2 . '<br>'; // Affiche BrunoClaire 











?>