$(document).ready(function(){

        // Créer une fonction pourla gestion du formulaire

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

        
            // Capter la soumission du formulaire
            $('form').submit(function(evt){

                // bloquer le comportement naturel du formulaire
                evt.preventDefault();

                //  Définiir les variables globlales du formulaire

                var userName = $('#userName');
                var userEmail = $('#userEmail');
                var userSubject = $('#userSubject');
                var userMessage = $('#userMessage');
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

                // validation final du formulaire
                if(formScore == 5){

                    console.log('formulaire validé');

                    // Envoie  des données dans le fichier de traitement PHP
                    // PHP répondu true = > continuer le traitement du formulaire

                            //  ajouter la valeur de userName dans la balise h2 span de la modal
                            $('#modal span').text(userName.val() );

                            // Vider les champs du formulaire
                            $('form')[0].reset();

                            // Supprimer les messages d'erreur
                            $('form b').text('');

                            // replacer les labels 
                            $('label').removeClass();
                };

            });





}); // Fin de la fonction d'attente du chargement du DOM