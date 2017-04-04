//  Chargement du DOM
$(document).ready(function(){

    // Capter le clique sur le 1er button
    $('button:first').click(function(){

        // charger le ficher home.html dans le main 
        $('main').load('views/home.html')
    })
});