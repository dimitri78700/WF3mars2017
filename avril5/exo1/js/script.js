// Attendre la chargement du dom
$(document).ready(function(){


    // Capter le click sur le 1er bouton
    $('button:first').click(function(){
        
        // charger le contenu de views/about.html dans la 1ere section du main
        $('section').eq(0).load('views/about.html', function(){

                // Fonction de call Back de la Fonction load()
                console.log('le fichier est bien charger');

                // animer la 1ere section
                $('section').eq(0).fadeIn();
        });

   });

    //  Capter le click sur 2eme bouton
    $('button').eq(1).click(function(){

        // charger dans la 2eme section de contenu de views/content.html
        $('section').eq(1).load('views/content.html #portfolio');

    });


    //  Capter le click sur 3eme bouton
        $('button').eq(2).click(function(){

        // charger dans la 3eme section de contenu de views/content.html
            $('section').eq(2).load('views/content.html #contacts', function(){

                // Apeller la fonction submitForm
                    submitForm();

        });

    });


    // Créer une Fonction pour capter la soumission du formulaire
        function submitForm(){

         // capter la soumission du formulaire
            $('form').submit(function(evt){

        // Créer une variable pour la validation finale du formulaire
            var formScore = 0;

            // Bloquer le comportement par default du formulaire
            evt.preventDefault();

            // Minimum 4 caractéres pour l'email et 5 caractéres pour le message
            
                if( $('[type="email"]').val().length < 4 
                ){

                    console.log('Email Manquant');

                } else{
                    console.log('email OK')

                    // incrémenter formScore
                    formScore++;
                };

           // Minimum 5 caractéres pour le message
            
                if( $('textarea').val().length < 5
                ){

                    console.log('Mess Manquant');

                } else{
                    console.log('message OK')

                    // incrémenter formScore
                    formScore++;
                };

           // verifier la valeur du formulaire
                if( formScore == 2){
                    console.log('le form est bon')

                    // => envoi des données vers le fichier de traitement PHP
                        // => le fichier PHP répondu true : je peux continuer mon code

                        // Ajouter le message dans la balise aside
                        $('aside').append('<h3>' + $('textarea').val() + '</h3><p>' + $('[type="email"]').val() + '</p>');


                        // reset du formulaire
                        $('form')[0].reset();

                };

      });


    };


});