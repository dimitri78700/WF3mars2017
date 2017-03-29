/*
    Créer un tableau contenant 4 index
        - 1 string
        - 1 number
        - 2 booleans différents
*/ 


var myArray = [ 'du texte', 1990, true, false ];
console.log( myArray );

/*
    Ajouter un string dans le tableau.
    Afficher le tableau dans la console.
*/ 

myArray.push('du texte');
console.log(myArray);


/*
    Afficher dans la console la taille du tableau
    Afficher le premier et le dernier index du tableau dans la console
*/

console.log(myArray.length, myArray[0], myArray[4]);


/*
    Créer un objet contenant 3 propriétés
     - le tableau
     - 1 prénom
     - 1 âge
     Afficher l'objet dans la console
*/

var myObject = {
    array: myArray,
    name: 'Dimitri',
    age: 37
    
};
console.log( myObject );

/*
     Afficher toutes les propriétés de l'objet dans la console une par une
*/

console.log( myObject.array, myObject.name, myObject.age );

/*
     Afficher l'objet dans la console
     Modifier la propriété age de l'objet
*/

myObject.age = 27;
console.log( myObject );
