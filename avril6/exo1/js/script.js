
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

        // Créer une fonction pourla gestion du formulaire
        function contactForm(){
            
            // Capter le focus sur les inputs
            $('input:not([type="submit"]), textarea').focus(function(){

                // Selection la balise précédente pour y ajouter la class openedLabel
                $(this).prev().addClass(' openedLabel hideError');
            });

            // Capter le blur sur les inputs et le textarea
            $('input, textarea').blur(function(){

                // Verifier si il n'y a pas de caractéres dans le inputs
                if($(this).val().length == 0){

                    // selectionner la balise précédente pour supprimer la class openedLabel
                $(this).prev().removeClass();

                };

            });


            // supprimer le message d'erreur du selectionner
            $('select').focus(function(){

                    $(this).prev().addClass('hideError');
            });

            // Supprimer le message d'erreur de la checkbox
            $('[type="checkbox"]').focus(function(){

                if($(this).checked == false) {

                    $('form p').addClass('hideError');
                };
            
            });

            // Fermer la modal
            $('.fa-times').click(function(){
                $('#modal').fadeOut();
            });

            // Capter la soumission du formulaire
            $('form').submit(function(evt){

                // bloquer le comportement naturel du formulaire
                evt.preventDefault();

                //  Définiir les variables globlales du formulaire

                var userName = $('#userName');
                var userEmail = $('#userEmail');
                var userSubject = $('#userSubject');
                var userMessage = $('#userMessage');
                var checkbox = $('[type="checkbox"]');
                var formScore = 0; 

                // Verifier que userName à au mini 2 caractéres

                if( userName.val().length < 2 ){

                        $('[for="userName"] b').text(' min 2 caractéres !');


                } else{
                   // Incrémenter la valeur de formScore 
                   formScore++;
                };

                //  Verifier que userMail à 5 caractéres

                if( userEmail.val().length < 5 ){
                         $('[for="userEmail"] b').text(' min 5 caractéres !');

                } else{
                    // Incrémenter la valeur de formScore
                    formScore++;
                };

                // Verifier le userSubject à bien était choisis 

                if( userSubject.val() == 'null' ){
                         $('[for="userSubject"] b').text(' Selection obligatoire !');

                } else{
                    // Incrémenter la valeur de formScore
                    formScore++;
                };

                // Verifier qu'il y a min 5 caractéres dans le userMessage

                if( userMessage.val().length < 5 ){
                         $('[for="userMessage"] b').text(' min 5 caractéres !');

                } else{
                    // Incrémenter la valeur de formScore
                    formScore++;
                };

                // Verifier sur la checkbox est cochée

                if (checkbox[0].checked == false ){
                     $('form p b').text(' Accepter les conditions générales ! ');'('

                } else{
                    // Incrémenter la valeur de formScore
                    formScore++;
                };

                // validation final du formulaire
                if(formScore == 5){

                    console.log('formulaire validé');

                    // Envoie  des données dans le fichier de traitement PHP
                    // PHP répondu true = > continuer le traitement du formulaire

                            //  ajouter la valeur de userName dans la balise h2 span de la modal
                            $('#modal span').text(userName.val() );

                            // afficher la modal
                            $('#modal').fadeIn();

                            // Vider les champs du formulaire
                            $('form')[0].reset('');

                            // Supprimer les messages d'erreur
                            $('form b').text('');

                            // replacer les labels 
                            $('label').removeClass();
                };

            });

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

                    // Vérifier si l'utilisateur est sur la, page contacts.html
                    if(viewToLoad == 'contacts.html'){
                        contactForm();
                    }

                });

            });

        });

}); // Fin de la fonction d'attente du chargement du DOM