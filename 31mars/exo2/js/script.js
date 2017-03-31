// Attendre le chargement du DOM
$(document).ready(function(){

        // Supprimer la class active de la balise h1
        $('h1').removeClass('active');

        // Ajouter la class active à la balise h2
        $('h2').addClass('active');

        // ajouter ou supprimer la class hidden sur la balise lorsqu'on clique sur la balise h2
        $('h2').click( function(){

            $('p').toggleClass('hidden');
        });

});