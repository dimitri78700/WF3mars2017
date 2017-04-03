// Attendre le chargement du DOM
$(document).ready(function(){



        // Verifier le genre de l'avatarAge
         var avatarWoman = $(' #avatarWoman ');
         var avatarMan = $(' #avatarMan ');
         
         // => avatarWoman capter le click
            avatarWoman.click(function(){   
            console.log( 'Je suis une ' + avatarWoman.val() );
            
        //  Désactiver avatarWoman
            avatarMan.prop('checked', false);

         });

         // => avatarMan capter le click
             avatarMan.click(function(){
             console.log(' je suis un ' + avatarMan.val() );
             
        //  Désactiver avatarman
            avatarWoman.prop('checked', false);

         });




        // Capter la soumission du formulaire
        $('form').submit( function(evt){

        // Bloquer le comportement par default du formulaire
            evt.preventDefault();

         // Récupérér la valeur de #avatarName
            var avatarName = $(' #avatarName ').val();
            var avatarAge = $(' #avatarAge ').val();

            var avatarStyleTop = $('#avatarStyleTop').val();
            var avatarStyleBottom = $('#avatarStyleBottom').val();

        //  Verifier les champs du formulaire

        // => avatarMan minimum 5 caractères
            
            if(avatarName.length < 5){
                console.log('min. 5 caractères')
            } else {
                console.log('avatarName Ok')
            };

        // => avatarAge entre 1 et 100

            if( avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0 ){
                console.log('avatarAge entre et 1 et 100');

            } else{
                console.log('avatarAge ok');
            };

        // => avatarStyleTop obligatoire

            if(avatarStyleTop == 'null' ){
                console.log('vous devez choisir un avatarStyleTop');

            } else{
                console.log('avatarStyleTop OK');
            };

        // => avatarStyleBottom obligatoire

            if( avatarStyleBottom == 'null'){
                console.log('vous deveez choisir un avatarStyleBottom')

            } else{
                console.log('avatarStyleBottom OK')
            };








        });



}); // Fin de l'attente du chargement du DOM

