var myNumber = 45;

// egalité simple : vérifier la valeur de la variable 

console.log( myNumber == 45 );  // => true 
console.log( myNumber == "45" ); // => true 

// Inégalité simple : vérifier la valeur de la variable

console.log( myNumber != 45 ); // => False
console.log( myNumber != "45" ); // => False
console.log( myNumber != 12 );  // => True 
console.log( myNumber != "12" );  // => True 

//  egalité STRICTE: vérifier la valeur ET le type de la variable 

console.log( myNumber === 45 ); // => True 
console.log( myNumber === "45" ); // => False


// Inégalité STRICT :  vérifier la valeur et le type de la variable

console.log( myNumber !== 45 ); // => False
console.log( myNumber !== "45" ); // => True

//  Supérieur / inférieur 

console.log( myNumber > 46 ); // => False
console.log( myNumber < 46 );  // => True

// Supérieur ou Egal / inférieur ou Egal

console.log( myNumber >= 12 ); // => True
console.log( myNumber <= 22 ); // => False

console.log( myNumber >= 45 ); // => True
console.log( myNumber <= 45 ); // => True