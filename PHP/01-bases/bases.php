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

    //  Avec la présnece du triple =, la comparaison ne fonctionne pas car les variables ne sont pas du même type : on compare un integer avec un string.
    //  Avec le double =, on ne compare que la valeur : ici la comparaison est donc juste.


    // = signe d'affectation 
    // == comparaison en valeur 
    // === comparaison type et valeur 


//----
//  empty() et isset() :

    //  empty() : teste si c'est vide ( c'st-à-dire 0, '', NULL, False ou non défini. 
    //  isset() : teste si c'est défini et a une valeur non NULL. 

    $var1 = 0;
    $var2 = '';  // Chaine vide

    if (empty($var1)) echo 'on a 0, vide, ou non définie <br>';
    if (isset($var2)) echo 'var 2 existe bien <br>';

    // Diffrénce entre empty et isset : si on met les lignes 204 et 205 en commentaire (pour les neutraliser), empty reste vrai car $var1 n'est pas définie, alors que isset est car $var2 n'est pas définie.

    // Empty sera utilisé pour vérifier, par exmple, que les champs d'un formulaire sont remplis. isset permettra par exemple de vérif l'existance d'un indice dans un arry avant de l'utiliser.


     // phpinfo();


    //  --------------------------------
    // Entrer une valeur dans une variable sous condition (PHP7). 

    $var1 = isset($maVar) ? $maVar : 'valeur par défaut'; // Dans cette ternaire , on affecte la valeur de $maVar à $var1 si elle existe. Celle-ci n'existent pas, on lui affecte 'valeur par défaut'.
    echo $var1 . '<br>'; // Affiche "valeur par défaut"

    // En version PHP7 :
    $var2 = $maVar ?? 'valeur par défaut'; // on fait exactement la même chose mais en plus court : le "??" signifie "soit l'un soit l'autre", "prend la 1ere valeur qui existe"
    echo $var2 . '<br>';

    $var3 = $_GET['pays'] ?? $_GET['ville'] ?? 'pas infos'; // Soit on prend le pays qu'il existe, sinon on prend la vielle si existe, sinon on prend "pas d'infos" par defaut.
    echo $var3 . '<br>'; // affiche "pas infos"


//-------------------------------------------------------------------------
echo '<h2> Condition Switch </h2>';
//-------------------------------------------------------------------------

 // Dans le switch ci dessous, les "case" représentent les cas différents dans lesquels on peut potentiellement tomber.

    $couleur = 'jaune';

    switch($couleur){
            case 'bleu' : echo 'vous aimez le bleu'; break;
            case 'rouge' : echo 'vous aimez le rouge'; break;
            case 'vert' : echo 'vous aimez le vert'; break;
            default : echo 'vous n\'aimez rien <br>';
    }

    // Le switch compare la valeur de la variable entre parenthèses à chaque cases. Lorsqu'une valeur correspond, on exécute l'instructiion en regarde du case, puis le break qui indique qu'il faut sortir de la condition. 
    // le default correspond à un else : on l'exécute par défaut quand aucune case ne correspond. 


// EXERCICE : écrivez la condition switch ci-dessus avec des if... 


    if($couleur == 'bleu '){
        echo 'vous aimez le bleu <br>';
    }
     elseif($couleur == 'rouge ') {
        echo 'vous aimez le rouge <br>';
    }
     elseif($couleur == 'vert ') {
        echo 'vous aimez le vert <br>';
    }
     else {
        echo 'vous n\'aimez rien <br>';
    }


//-------------------------------------------------------------------------
echo '<h2> Fonctions prédéfinies </h2>';
//-------------------------------------------------------------------------

    // Une fonction prédéfinies permet de réaliser un traitement spécifique qui est prévu dans le langage

    // -------
    echo '<h2> Traitement des chaines de caracteres ( strlen, strpos, substr)</h2>';
    $email1 = 'prenom@site.fr';

    echo strpos($email1, '@') . '<br>';  // strpos() indique la position 6 du caractere @ dans la chaine $email1
    echo strpos('bonjour', '@');

    var_dump(strpos('bonjour', '@')); 

    // Quand j'utilise une fonction prédéfinie, il faut se demander quels sont les arguement à lui fournir pour qu'elle s'exécute correctement et ce qu'elle peut retourner comme resultat
    // dans l'exemple de strpos() : succées => integer, échec => booléan FALSE

    // -------
    $phrase = 'mettez une phrase à cet endroit';

    echo '<br>' . strlen($phrase) . '<br>'; // Affiche la longueur du string : succés => integer, echec => false.

    $texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis laboriosam, cumque exercitationem omnis eligendi delectus nihil eefegrhrhjjtyjtjtyjtyj.';

    echo substr($texte, 0, 20) . '...<a href="">Lire la suite</a><br>'; // On découpe une partie du texte et on lui concatène un lien . succès => string, échec => false. 

    // ---------
    echo str_replace('site', 'gmail', $email1);  // remplace 'site' par 'gmail' dans le string contenu dans $email1. 

    // --------
    $message = '   hello world     ';
    echo strtolower($message) . '<br>'; // passe le string en Minuscules
    echo strtoupper($message) . '<br>'; // passe le string en majuscules
    
    echo strlen($message) . '<br>'; 
    echo strlen(trim($message)) . '<br>'; // trim() permet de suppr les espaces au début et à la fin d'un string. 


//-------------------------------------------------------------------------
echo '<h2> PHP Manuel </h2>';
//-------------------------------------------------------------------------
    // Pour avoir plus d'infos : http://php.net/manual/fr/


//-------------------------------------------------------------------------
echo '<h2> Gestion des dates </h2>';
//-------------------------------------------------------------------------

    echo date('d/m/Y H:i:s') . '<br>';  // Affiche la date et heure de l'instant selon le format indiqué : d= day , m = month Y = year sur 4 chiffres, H = hours en 24h , i = minutes, s = secondes. On peut choisir les séparateurs.$_COOKIE
    
    echo time() . '<br>';  // retourne le timestamp actuel = nombre de secondes écoulées depuis 01/01/1970 à 00:00:00

    // la fonction prédéfinie strtotime() :

    $dateJour = strtotime ('10-01-2016'); // retourne le timestamp de la date indiquée
    echo $dateJour . '<br>';

    // la fonction strftime() :

    $dateFormat = strftime('%Y-%m-%d', $dateJour); // transforme le timestamp donnée en date selon le format indiqué, ici Y - m - d.
    echo $dateFormat . '<br>'; // affiche 2016-01-10.

    
    // Exemple de conversion de format de date  : 
    // Transformer 23-05-2015 en 2015-05-23 :

    echo strftime('%Y-%m-%d', strtotime('23-05-2015'));

    echo '<br>';
    // Transformer 2015-05-23 en 23-05-2015

    echo strftime('%d-%m-%Y', strtotime('2015-05-23'));

    echo '<br>';

    // Cette méthode de transformation est limitée dans le temps (2038).... On peut donc utiliser une autre méthode avec la classe DateTime :

    $date = new DateTime('11-04-2017');
    echo $date->format('Y-m-d');

        // DateTime est une classe que l'on peut comparer à un plan ou un modèle qui sert à construire des objets "date". 

        // On construit un objet "date" avec le mot new, en indiquant la date qui nous intéresse entre parenthèses. $date est donc un objet "date"

        // Cete objet bénéf de méthode (=fonctions) offertes par la classe : il y a entre autres, la méthode format() qui permet de modifier le format d'une date. Pour appeler cette méthode sur l'objet $date, on utilise la fléche "->" . 







?>