// Créer une application pour calculer une moyenne (l'utilisateur à la posibilité d'ajouter autant de notes qu'il le souhaite, lorsqu'il le souhaite, il peut calculer la moyenne)

// Variable globales

var notesArray = []; // => tableau vide 
var notesAmount = 0; 

// Fonction 

function addNote(){

    // Demander ç l'utilisateur une note
    var newNote = prompt ('ajouter une note de 0 à 20');

    // Convertir newNote en Variable de type NUMBER
    var newNoteNumber = parseInt( newNote )
        // Ajouter la note dans le tableau 
        notesArray.push( newNoteNumber );
        console.log( notesArray );

        // Additionner notesAmount et newNote
        notesAmount += newNoteNumber;
        console.log( notesAmount );

};


function average(){

        // La somme de toutes les notes divisée par le nombre de note
        var averageNote = notesAmount / notesArray.length;

        // arrondir le résultat
        var roundAverage = Math.round( averageNote );
        console.log('La moyenne est de ' + roundAverage + '/20');

}