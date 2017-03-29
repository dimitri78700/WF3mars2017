

// /Créer une fonction qui permet à l'utilisateur de choisir une couleur

function chooseColor(){

    // demander à l'user de choisir une couleur 
    var userPrompt = prompt ('Choisir une couleur entre rouge, vert et bleu');

    // appeler la fonction de traduction
    translateColor( userPrompt );

};

// Créer une fonction pour traduire les couleurs

function translateColor( paramColor ){

    //  Utilisation du switch 
    switch ( paramColor ){

            // 1,2 et 3 cas : paramColor 
            case 'rouge' : console.log('Rouge = Red'); break;

            case 'vert' : console.log('Vert = Green'); break;

            case 'bleu' : console.log('Bleu = Blue'); break;

            // Pour tous les autres cas : default est OBLIGATOIRE
            default: console.log('je ne connais pas cette couleur'); break;

    }

};

