// Attendre le chargement du DOM
$(document).ready( function(){


            // Créer une variable pour le titre du site 
            var siteTitle = 'Welcome to Paradise <i>Webforce 3</i>';


            // Créer un tableau pour la nav 
            var myNav = [ 'Accueil', 'Portfolio', 'Contacts'  ];


            // Créer un objet pour les titres des pages
            var myTitles = {
                    Accueil: 'Welcome here',
                    Portfolio: 'Découvrez mes travaux',
                    Contacts: 'Contacter moi pour plus d\'information'
            };

            var myContent = {
                    Accueil: '<h3>Contenu de la page Accueil</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque eligendi, velit voluptate deleniti sequi. Dolor reiciendis unde dicta soluta culpa, nihil blanditiis quaerat vero vitae illo minus minima doloremque atque!</p>',
                    Portfolio: '<h3Contenu de la page Portfolio</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque eligendi, velit voluptate deleniti sequi. Dolor reiciendis unde dicta soluta culpa, nihil blanditiis quaerat vero vitae illo minus minima doloremque atque!</p>',
                    Contacts: '<h3Contenu de la page Contacts</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque eligendi, velit voluptate deleniti sequi. Dolor reiciendis unde dicta soluta culpa, nihil blanditiis quaerat vero vitae illo minus minima doloremque atque!</p>'

            }

            // Afficher dans la console le header
            var myHeader = $( 'header' );
            
            //Générer une balise H1 dans le header avec le contenu de la variable siteTitle
            myHeader.append( '<h1>' + siteTitle + '</h1>' );

            // Générer une balise nav + ul dans le header
            myHeader.append('<nav><i class="fa fa-bars" aria-hidden="true"></i> <ul> </ul> </nav>');


            // Activer le BurgerMenu au click sur la balise .fa-bars
            $('.fa-bars').click( function(){

                    $('nav ul').toggleClass('toggleBurger');

            } );


            // Faire une boucle for(){...} sur myNav pour Générer les liens de la nav
            for(var i = 0; i < myNav.length; i++){

                    // Générer les balises html
                    $('ul').append('<li><a href="' + myNav[i] + '"> ' + myNav[i] + '</a></li>');
            };


            // Afficher dans le main le titre issu de l'objet myTitles
            var myMain = $('main');
            myMain.append( '<h2>' + myTitles.Accueil + '</h2>' );
            myMain.append( '<section>' + myContent.Accueil + '</section>' );

            // Ajouter la class active sur la 1ere li de la nav
            $('nav li:first').addClass('active');



            // Capter l'événement click sur les balises a en bloquant le comportement naturel des balises a
            $('a').click( function(evt){

                // Supprimer la class des balises li de la nav
                $('nav li').removeClass('active');

                // Bloquer le comportement naturel de la balise
                evt.preventDefault();

                // Connaitre l'occurence de la balise a sur laquelle l'utilisateur à cliqué
                //console.log( $(this) )

                // Récupérer la valeur de l'attribut href
                //console.log( $(this).attr('href') )

                // Vérifier la valeur de l'attribut href pour afficher le bon titre

                if( $(this).attr('href') == 'Accueil'){
                        
                        // Selectionner la balise h2 pour changer son contenu
                        $('h2').text( myTitles.Accueil );

                        // Selectionner la section pour changer le Contenu
                        $('section').html(myContent.Accueil);

                        // Ajouter la class active sur la balise li de la balise a Selectionner
                        $(this).parent().addClass('active');

                } else if ( $(this).attr('href') == 'Portfolio'){
                        // Selectionner la balise h2 pour changer son contenu
                        $('h2').text( myTitles.Portfolio );

                        // Selectionner la section pour changer le Contenu
                        $('section').html(myContent.Portfolio);

                        // Ajouter la class active sur la balise li de la balise a Selectionner
                        $(this).parent().addClass('active');

                } else {
                        // Selectionner la balise h2 pour changer son contenu
                        $('h2').text( myTitles.Contacts );

                        // Selectionner la section pour changer le Contenu
                        $('section').html(myContent.Contacts);

                        // Ajouter la class active sur la balise li de la balise a Selectionner
                        $(this).parent().addClass('active');

                };
                        // Fermer le BurgerMenu
                        $('nav ul').removeClass('toggleBurger')
            });

});  // Fin de la fonction de chargement du DOM