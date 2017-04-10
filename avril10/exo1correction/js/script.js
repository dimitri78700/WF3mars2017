$(document).ready(function(){


    // fermer la modal
    $('.fa-times').click(function(){
        $('div').fadeOut();
    });


    //  Supprimer les class error
    $('input, select, textarea').focus(function(){
        $(this).removeClass('error')
    });




    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();

        // Définir les variables globales
        var userName = $('[placeholder="Your name*"]');
        var userEmail = $('[placeholder="Your email*"]');
        var userSubject = $('select');
        var userMessage = $('textarea');
        var formScore = 0;


    // Vérifier que l'utilisateur a bien mis son nom
        if( userName.val().length == 0 ){

                //  ajouter la classe error sur l'input
                userName.addClass('error')

        } else{

            formScore++;
        };

     // Verifier que l'utilisateur a bien saisi au 4 caractères
        if( userEmail.val().length < 4){

            //  ajouter la classe error sur l'input
                userEmail.addClass('error')

        } else{
            formScore++;
        };

     // Verifier que l'utilisateur a bien choisi un sujet
        if( userSubject.val() == 'null' ){

            //  ajouter la classe error sur l'input
                userSubject.addClass('error')

        } else{
            formScore++;
        };

    // Verifierque l'utilisateur a bien saisi au moins 5 caractères dans le userMessage
        if( userMessage.val().length < 5 ){

            //  ajouter la classe error sur l'input
                userMessage.addClass('error')

        } else{
            formScore++;
        };

        if(formScore == 4){
           

                // Envoie des données dans le fichier de traitement php 
                // Php répond true => continuer le traitement du formulaire

                // => Afficher les données du formulaire dans une modal

                $('div span').text(userName.val() );
                $('div b').text( userSubject.val() );
                $('div p:last').text( userMessage.val() );

                // Afficher la modal
                $('div').fadeIn();

                // Vider les champs du formulaire
                $('form')[0].reset('');

        };

    });

}); // Fin de la fonction d'attente du chargement du DOM