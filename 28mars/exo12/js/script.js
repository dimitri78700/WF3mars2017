//  Créer un objet 
var user = {
        firstName: 'Dimitri',
        lastName: 'Supertramp',

        //Ajouter une fonction pour Afficher le nom complet
        fullName: function(){
             console.log( this.firstName + ' ' + this.lastName );
    }
};

// Afficher l'objet
console.log( user );

// Afficher une propriété de l'objet
console.log( user.firstName );

//  Modifier la valeur d'un propriété de l'objet
user.lastName = 'Mélenchon';
console.log( user );

// Appeler la fonctionde l'objet 
user.fullName();