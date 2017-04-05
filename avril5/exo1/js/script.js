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

            // Bloquer le comportement par default du formulaire
            evt.preventDefault();

            console.log('submit du form')
    });


    }


});