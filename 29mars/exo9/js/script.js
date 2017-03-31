//  Créer un objet contenant 4 propriétés
    var users = {
        first: 'Nesta',
        second: 'Jinete',
        third: 'Marvin',
        four: 'Jacky'
};

//  Faire une boucle for..in sur l'objet
    for( var prop in users ){

            // Afficher le nom de la propriétés
            console.log( prop );

            // Afficher la valeur des propriétés
            console.log( users[prop] );

};