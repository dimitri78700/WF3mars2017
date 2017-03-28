//  Créer un type d'objet pour en farire des déclinaisons
function CarType( paramDoors, paramColor, paramBrand, paramGear  ){
       
       
        //  des portes, une couleur, marque, boite de vitesses
        this.doors = paramDoors;
        this.color = paramColor;
        this.brand = paramBrand;
        this.gear =  paramGear;

};

//  Ajouter une fonction au type d'objet CarType
CarType.prototype.welcome = function(){

    console.log(  'Bonjour, je suis une ' + this.brand + ',je possède ' + this.doors + ' portes et ' + this.gear + ' vitesse et je suis de couleur ' + this.color);
}


// Créer une déclinaisons de CarType
var fiat = new CarType( 3, 'rouge', 'Fiat', 4 );
console.log( fiat );
// Appeler la fonction welcome
fiat.welcome();

var hummer = new CarType(5, 'Noir', 'Boloss America', 8 );
console.log( hummer );
hummer.welcome();

