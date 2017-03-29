

// /Créer une fonction qui permet à l'utilisateur de choisir une couleur

function chooseColor(){

    // demander à l'user de choisir une couleur 
    var userPrompt = prompt ('Choisir une couleur entre rouge, vert et bleu');

    // appeler la fonction de traduction
    translateColor( userPrompt );

};

// Créer une fonction pour traduire les couleurs

function translateColor( paramColor ){

    if ( paramColor == 'rouge' ) {  // Si paramColor est égale à 'bleu'

        console.log('rouge ce dit Red en anglais');

    } else if ( paramColor == 'bleu' ){  // Si paramColor est égale à 'bleu'

        console.log( 'bleu ce dit Blue en anglais ' );

    } else if ( paramColor == 'vert' ) {   // Si paramColor est égale à 'bleu'

            console.log( 'vert ce dit Green en anglais ' );

    } else {  // Dans les autres cas 
        console.log( 'Je ne connais pas cette couleur... ' );

        // rappeler la fonction pour refaire choisir une couleur
        chooseColor();
    };

};

