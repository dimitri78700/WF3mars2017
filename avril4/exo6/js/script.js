
$(document).ready(function(){



/*Home Page */

        // Burger Menu : ouverture 
        $('.homePage h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();

            // Appliquer la fonction slideToggle sur la nav
            $(' .homePage nav').slideToggle();
        });

        // Burger Menu : navigation
        $(' .homePage nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();

            var linkToOpen = $(this).attr('href');

            // Fermer le burger Menu
            $('nav').slideUp(function(){

                

                // Changer de page 
                window.location = linkToOpen;
            });

        });



/*About page*/

            // Capter le click sur le burger menu 
            $('.aboutPage h1 + a').click(function(evt){

                // Bloquer le comportement naturel de la balise A
                evt.preventDefault();

           // Selectionner la nav pour y Appliquer une fonction animate
           $('.aboutPage nav').animate({
                left: '0'

                });
            });

             // Burger Menu : navigation
        $(' .aboutPage nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();

            var linkToOpen = $(this).attr('href');

            // Fermer le burger Menu
            $('.aboutPage nav').animate({
                    left : '-100%'

            
            }, function() {
                    window.location = linkToOpen;
            });

        });

}); // Fin de la fonction d'attente du chargement du DOM