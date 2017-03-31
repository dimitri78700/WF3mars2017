// Attendre le chargement du DOM
$(document).ready( function(){


            // Créer une variable pour le titre du site 
            var siteTitle = 'Dimitri Supertramp <i>Webforce 3</i>';


            // Créer un tableau pour la nav 
            var myNav = [ 'Accueil', 'Portfolio', 'Contacts'  ];



            // Créer un objet pour les titres des pages
            var myTitles = {
                    Accueil: 'Welcome here',
                    Portfolio: 'Découvrez mes travaux',
                    Contacts: 'Contacter moi pour plus d\'information'
            };

            // Afficher dans la console le header
            var myHeader = $( 'header' );
            
            //Générer une balise H1 dans le header avec le contenu de la variable siteTitle
            myHeader.append( '<h1>' + siteTitle + '</h1>' );

            // Générer une balise nav + ul dans le header
            myHeader.append('<nav> <ul> </ul> </nav>');

            // Faire une boucle for(){...} sur myNav pour Générer les liens de la nav
            for(var i = 0; i < myNav.length; i++){

                    // Générer les balises html
                    $('ul').append('<li><a href="' + myNav[i] + '"> ' + myNav[i] + '</a></li>');
            };

            // Afficher dans le main le titre issu de l'objet myTitles
            var myMain = $('main');
            myMain.append( '<h2>' + myTitles.Accueil + '</h2>' );

            // Capter l'événement click sur les balises a en bloquant le comportement naturel des balises a
            $('a').click( function(evt){

                // Bloquer le comportement naturel de la balise
                evt.preventDefault();

                // Connaitre l'occurence de la balise a sur laquelle l'utilisateur à cliqué
                console.log( $(this) );

                // Récupérer la valeur de l'attribut href
                console.log( $(this).attr('href') );

                // Vérifier la valeur de l'attribut href pour afficher le bon titre

                if( $(this).attr('href') == 'Accueil'){
                        
                        // Selectionner la balise h2 pour changer son contenu
                        $('h2').text( myTitles.Accueil );

                } else if ( $(this).attr('href') == 'Portfolio'){
                        // Selectionner la balise h2 pour changer son contenu
                        $('h2').text( myTitles.Portfolio );

                } else {
                        // Selectionner la balise h2 pour changer son contenu
                        $('h2').text( myTitles.Contacts );

                };

            });


});  // Fin de la fonction de chargement du DOM