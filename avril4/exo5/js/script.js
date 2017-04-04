// Attendre le chargement du DOM
$(document).ready(function(){

        // Burger Menu classique
        $('.fa-bars').click(function(){

                $('nav ul').fadeIn();
        });

        // Fermer le Burger Menu
        $('a').click(function(evt){

                evt.preventDefault();
                $('nav ul').fadeOut(500);
        });
 
});  // fin de la demande de chargement du DOM





