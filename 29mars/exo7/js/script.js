/*

    le Chifoumy 
     - l'utilisateur doit choisir entre pierre, feuille et ciseaux
     - l'ordinateur doit entre pierre, feuille et ciseaux
     - nous comparons le choix de l'utilisateur et de l'ordinateur
     - selon le résultat, l'utilisateur a gagné ou l'ordinateur a gagner
     - une partie se joue ne 3 manches

*/ 

// Variable Globlale pour le choix de l'utilisateur 
var userBet = '';
var userWin = 0;
var computerWin = 0;



/*
    1# l'utilisateur doit entre pierre, feuille et ciseaux
        - Créer une fonction qui prend en paramètre le choix de l'utilisateur 
        - Appeler la fonction au clique sur les buttons du DOM
        - Afficher le résultat dans la console
*/ 

function userChoice( paramChoice ){


        // Assigner à la Variable userBet la valeur de paramChoice
        userBet = paramChoice;
};

/*

    2# l'ordinateur doit choisir entre pierre, feuille et ciseaux
        - Faire une fonction pour déclencher le choix sur un bouton 
        - Créer un tableau contenant 'pierre' 'feuille' et 'ciseaux'
        - Faire en sorte de choisir aléatoirement l'un des 3 index du tableau 
        - afficher le résultat dans la console
*/ 

function computerChoice(){

    var computerMemory = [ 'pierre', 'feuille', 'ciseaux' ];


    // Choisir aléatoirement l'un de 3 index du tableau
    var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];
   
    // Afficher les deux choix dans la balise H2
    document.querySelector('h2').textContent = userBet + ' vs ' + computerBet;
 
    // Verifier si userBet n'est pas vide

    if(userBet == '' ){
        document.querySelector('h2').innerHTML = 'Hey Play !'

    } 
    else{
    
     // Afficher les deux choix dans la balise H2
     document.querySelector('h2').textContent = userBet + ' vs ' + computerBet;

      // Comparer les variables 

    if( userBet == computerBet ){
        document.querySelector('p').textContent = 'Draww';


    } else if(userBet == 'pierre' && computerBet == 'ciseaux' ){
        document.querySelector('p').textContent = 'Gagnééé';
        
            // Incrémenter la Variable userWin de 1
            userWin++;

    } else if (userBet == 'feuille' && computerBet == 'pierre' ){
        document.querySelector('p').textContent = 'Gagnééé';

            // Incrémenter la Variable userWin de 1
            userWin++;

    } else if (userBet == 'ciseaux' && computerBet == 'feuille'){
        document.querySelector('p').textContent = 'Gagnééé';

            // Incrémenter la Variable userWin de 1
            userWin++;

    } else{
        document.querySelector('p').textContent = 'YOU LOOSEE';

            // Incrémenter la variable computerWin de 1
            computerWin++;
    };

   }; 

        // Verifier les valeurs de userWin et de computerWin
        if(userWin == 3){
            

            // afficher le message dans le body
            document.querySelector('body').innerHTML = '<h1>Vous avez Gagnééé !</h1><a href="index.html">Rejouer</a>'

        };

        if(computerWin == 3){
            
            // afficher le message dans le body
            document.querySelector('body').innerHTML = '<h1>Vous avez Perduuu !</h1><a href="index.html">Rejouer</a>'
        };
       
 };