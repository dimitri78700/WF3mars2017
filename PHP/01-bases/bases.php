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


//-----------------------------
echo '<h2> Guillemets et quotes </h2>';
//-----------------------------

    $message = "Aujourd'hui"; // ou bien : 
    $message = 'Aujourd\'hui';  // dans les quotes on échappe les apostrophes avec l'anti slash ( alt gr + 8 )

    $txt = 'bonjour';
    echo "$txt tout les monde <br>"; // ici les variables sont évaluées quand elles sont présentes dans des guillemets, c'est leur contenu qui est affiché '
    echo '$txt tout les monde <br>'; // dans des quotes simples on affiche littéralemnt le nom des variables : elles ne sont pas évaluées


//-----------------------------
echo '<h2> Constantes </h2>';
//-----------------------------

    // Une constantes permet de conserver une valuer qui ne peut pas ( ou ne doit pas ) être modifiée durant la durée du script.Très utile pour garder de manière certaines la connexion à une BDD ou le chemin du site par exemple.

    define("CAPITALE", "Paris"); // par convention on écrit toujours le nom des constantes en MAJ. define() permet de déclarer une constante dont on indique d'abord le nom puis la valeur 
    echo CAPITALE . '<br>';  // Affiche Paris

    // Constantes magiques
    echo __FILE__ . '<br>'; // affiche le chemin complet du fichier dans lequel on est ...
    echo __LINE__ . '<br>'; // affiche la ligne à laquelle on est 


//----------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';
//----------------------------------------

    $a = 10;
    $b = 2;

    echo $a + $b . '<br>';  // Affiche 12
    echo $a - $b . '<br>';  // Affiche 8
    echo $a * $b . '<br>';  // Affiche 20
    echo $a / $b . '<br>';  // Affiche 5
    echo $a % $b . '<br>';  // Affiche 0 ( = le reste de la division entière)

    // ----
    // Opération et affectations combinées :

    $a += $b;  // $a vaut 12 car équivaut à $a = $a + $b soit 10 + 2 
    $a += $b;  // $a vaut 12 car équivaut à $a = $a + $b soit 10 + 2 
    $a *= $b;  // $a vaut 20 
    $a /= $b;  // $a vaut 10
    $a %= $b;  // $a vaut 0

    // ----
    //  Incrémenter et décrempter  :

    $i = 0;
    $i++; // Incrémentation de $i de +1 vaut 1
    $i--; // Décremtation de $i de -1 vaut 0

    $k = ++$i;  // la variable est incrémentée de 1, puis elle est afféctée à $k 
    echo $i . '<br>';  // = 1
    echo $k . '<br>'; // = 1

    $k = $i++; // la variable $i est d'abord affectée à $k puis incrementée de 1'
    echo $i . '<br>';  // = 2
    echo $k . '<br>'; // = 1


//-------------------------------------------------------------------------
echo '<h2> Structures conditionnelles et opérateurs de comparaison </h2>';
//-------------------------------------------------------------------------


    $a = 10; $b = 5; $c =2;

    if($a > $b ){  // Si la condition renvoie true, on exécute les accolades qui suivent :
        echo '$a est bien supérieur à $b <br>';
    } else {       // Sinon la condition renvoie false, on exécute le else :
        echo 'non, c\'est $b qui est supérieur à $a <br>';
    }

//----
    if($a > $b && $b > $c ){  // && signifie ET 
        echo 'les 2 conditions sont vraies <br>';
    }

//----
    if($a == 9 || $b > $c ) {  // l'opérateur de comparaison est == et l'opérateur OU s'écrit ||
        echo 'ok pour une des 2 conditions <br>';
    } else {
        echo 'les deux conditions sont fausses <br>';
    }

//----
    if($a == 8 ){
        echo 'reponse 1 <br>';
    } elseif ($a != 10){   // sinon si $a (!= signe de différent) de 10, on exécute les accolades qui suivent :
        echo 'reponse 2 <br>';
    } else {              // sinon, si les conditions précédentes sont fausses, on exécute les accolades qui suivent : 
        echo 'reponse 3 <br>';  // on entre ici dans le else
    }

//----
    if($a == 10 XOR $b == 6){
        echo 'Ok pour la condition exclusive <br>';  // si les 2 conditions sont vraies ou les 2 conditions sont fausses en même temps , nous n'entrons pas dans les accolades.
    }

    //  Pour que la condition s'exécute il faut que l'une soit vraie ou alors que l'autre soit vraie, mais pas les deux en même temps.

//----
//  Conditions ternaires  ( forme contractée de la condition ) :
    echo ($a == 10 ) ? '$a est égal à 10 <br>' : ' $a est différent de 10 <br>';  // le ? remplace IF , et le : remplace ELSE . Si a vaut 10 on fait un echo du 1er string, sinon du second. 

//----
//  Différence  entre == et === :
    $vara = 1;    // integer
    $varb = '1'; // String 

    if($vara == $varb) {
        echo 'il y a egalite en valeur entre les 2 variables <br>';
    } 

    if($vara === $varb){ 
        echo 'il y a égalité en valeur ET en type entre les 2 varibles <br>';
    }
?>