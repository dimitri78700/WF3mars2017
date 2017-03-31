// attendre le chargement du DOM
$(document).ready(function(){

    
    // Capter la soumission du formulaire
    $('form').submit( function(evt){

        // Définir une variable pour le score du formulaire
        var formScore = 0;
      
        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();


        // Connaitre la valeur saisie par l'utilisateur 

        var userName = $('input').val();
        console.log( $('input').val() );

        // Connaitre le nombre de caractères dans la valeur
        console.log( userName.length );

        // Connaitre la valeur saisie dans le textarea par l'utilisateur
        var userMessage = $('textarea').val();
        // Connaitre le nombre de caractères dans la valeur
        console.log(userMessage.length);


        // Vérifier la taille de userName ( min. 1 caractères)
        if( userName.length == 0 ){
            console.log('Indiquez votre nom !')

            // Afficher un message dans le Label
            $('[for="userName"] b').text(' WARNING !!!!!!!! ')

        } else{
            console.log( 'userName OK' );
            formScore++;
        };

        // Vérifier la taille de userMessage ( min 5 caractères )
        if( userMessage.length < 4 ){
                console.log('min 5 caractères');
                $('[for="userMessage"] b').text(' WARNING MESSAGE !!!!!!!! ')

        } else{
            console.log( 'userMessage OK' );
            formScore++;
        };

        if(formScore == 2){
            console.log('le formulaire est validé')

            // => Envoyer les données dans le fichier PHP et attendre la réponse du PHP (true/false)

            // le PHP répond true !


            // AJouter le message dans la liste 
            $('section:last').append('<article><h4>'  + userName + '</h4><p>' + userMessage + '</p></article>');

            // Vider les champs du formulaire
            $('input:not([type="submit"])').val('');
            $('textarea').val('');
        };

        // Supprimer les messages d'erreur
        $('input, textarea').focus(function(){

                $(this).prev().children('b').text('');

        });

      });

}); // Fin de la fonction d'attente de chargement du DOM