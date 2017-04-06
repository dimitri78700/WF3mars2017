
$(document).ready(function(){

        function mySkills( paramEq, paramWidth){

                $('h3 + ul').children('li').eq(paramEq).find('p').animate({
                    width: paramWidth
                });
        };

        // Créer une fonction pour ouvrir la modal
        function openModal(){

            // Ouvrir la modal au click
             $('button').click(function(){

                // afficher le titre du projet

                var modalTitle = $(this).prev().text()
                $('#modal span').text( modalTitle );

                // afficher l'image du projet
                 var modalImage = $(this).parent().prev().attr('src');
                  $('#modal img').attr( 'src', modalImage ).attr('alt', modalTitle );

                  $('#modal').fadeIn();
             });

            // Fermer la modal au click sur le fa-times
                $('.fa-times').click(function(){
                    $('#modal').fadeOut();
                })
        };

        // Charger le contenu de home.html dans le main
        $('main').load( 'views/home.html' );


/*Home Page */

        // Burger Menu : ouverture 
        $('h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();

            // Appliquer la fonction slideToggle sur la nav
            $('nav').slideToggle();
        });

        // Burger Menu : navigation
        $('nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();

            // Masquer le main 
            $('main').fadeOut();

            // Créer une variable pour récupérer la valeur de l'attribut href
            var viewToLoad = $(this).attr('href');

            // Fermer le burger Menu
            $('nav').slideUp(function(){


        // Charger la bonne vue puis afficher le main (callBack)
        $('main').load( 'views/' + viewToLoad, function(){

               $('main').fadeIn(function(){


                    // Vérifier si l'utilisateur veux vor la page about.html
                    if( viewToLoad == 'about.html' ){

                        //Apeller la fonction mySkills
                        mySkills( 0, '84%' );
                        mySkills( 1, '54%');
                        mySkills( 2, '40%');

                     };

                    //  Vérifier si l'utilisateur est sur la page portfolio.html
                    if( viewToLoad == 'portfolio.html' ){

                        // Apeller la fonction pour ouvrir la modal
                        
                        openModal();
                        
                      };

                   });

                });

            });

        });

}); // Fin de la fonction d'attente du chargement du DOM