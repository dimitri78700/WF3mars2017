// Demande du chargement du DOM
$(document).ready(function(){

     // Supprimer les class error
    $('select, textarea').focus(function(){
        $(this).removeClass('error')
    });


    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();

        // Définir les variable globales
        var userSubject = $('select');
        var userMessage = $('textarea');
        var formScore = 0;

        // Vérifier que l'utilisateur a bien saisi un sujet
        if(userSubject.val() == 'chat0'){

            // Ajouter la class error sur l'input
            userSubject.addClass('error');
            
        }
        else{
            formScore++
        };

        // Vérifier que l'utilisateur a bien saisi un msg avec au min 10 caracteres
        if(userMessage.val().length < 15){

            // Ajouter la class error sur l'input
            userMessage.addClass('error');
        }
        else{
            formScore++
        };

        // Validation final du formulaire
        if(formScore == 2){
            console.log('Formulaire Validé')

            // Envoi des données dans le fichier de traitement PHP
            // PHP répond true => continuer le traitement du formualire

            // Vider les champs du formulaire
            $('form')[0].reset('');
        };
    });

});