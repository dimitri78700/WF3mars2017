/*
Programme pour saluer un user et afficher un son année de naissance
    - demander le nom et le prénom 
    - Saluer l'user : en Disant Bonjour 
    - Demander l'age de l'user
    - afficher l'année de naissance
*/ 

// demander le prénom et le prénom
var firstName = prompt ('Quel est ton Nom ?');
var lastName = prompt ('Quel est ton Prénom ?');

// Saluer en disant : bonjour prénom nom
console.log('bonjour ' + firstName + ' ' + lastName);

//  Demander l'age !
var age = prompt('Quel est ton âge');
console.log(age);

// Transformer une variable en type STRING en type NUMBER
var ageNumber = parseInt(age);
console.log(ageNumber);

// afficher l'année de naissance 
var currentYear = 2017;
console.log('Ton année de naissance est ' + (currentYear - age));