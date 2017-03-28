var user = 'Dimitri S';

//  une variable de type ARRAY (tableau)
var myArray = [ 'du texte', 1990, true, user];

console.log(myArray);

// afficher la taille du tableau ( nombre d'index)
console.log( 'la taille du tableau est : ' + myArray.length );

// afficher un des index du tableau ('du texte' ou true )
console.log( myArray[0] ); 
console.log( myArray[2] ); 


// Ajouter un index dans le tableau
myArray.push( 'une valeur en plus' );
console.log( myArray );

// Supprimer et remplacer des index du tableau 
myArray.splice( 2, 1, false );
console.log( myArray );



