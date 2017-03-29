// Demander à l'utilisateur de choisir une couleur entre rouge, vert et bleu
var userChoice = prompt( 'Choisir une couleur vert, rouge ou bleu' );


console.log( userChoice == 'rouge' );

// Si userChoice est égale à "rouge"

if ( userChoice == 'rouge' ) {  // Si userChoice est égale à 'bleu'

    console.log('rouge ce dit Red en anglais');

} else if ( userChoice == 'bleu' ){  // Si userChoice est égale à 'bleu'

    console.log( 'bleu ce dit Blue en anglais ' );

} else if ( userChoice == 'vert' ) {   // Si userChoice est égale à 'bleu'

        console.log( 'vert ce dit Green en anglais ' );

} else {  // Dans les autres cas 
    console.log( 'Je ne connais pas cette couleur... ' );

};
