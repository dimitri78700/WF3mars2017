// Attendre le chargement du DOM
$(document).ready(function(){

        //  Créer un tableau pour enregistrer les avatar
            var myTown = [];

        // Verifier le genre de l'avatar

            var avatarWoman = $(' #avatarWoman ');
            var avatarMan = $(' #avatarMan ');
            var avatarGender;

        
        // => avatarWoman capter le click

            avatarWoman.click(function(){   
            
            
        //  Désactiver avatarWoman

            avatarMan.prop('checked', false);

        // Modifier la valeur de avatarGender

            avatarGender = avatarWoman.val();

        // Vider le message d'erreur 

            $('.labelGender b').text('');

        // Modifier l'attribut src de l'avatar BODY

            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png');

         });


         // => avatarMan capter le click

             avatarMan.click(function(){
             
             
        //  Désactiver avatarman

            avatarWoman.prop('checked', false);

        // Modifier la valeur de avatarGender

            avatarGender = avatarMan.val();

        // Vider le message d'erreur 

            $('.labelGender b').text('');


        // Modifier l'attribut src de l'avatar BODY

            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png');

         });

        //  Supprimer les messages d'erreur

            $('input, select').focus(function(){

                // Selectionner la balise précédent le input

                $(this).prev().children('b').text('');

        });

        //  Capter l'événement change() sur les selects

            $('select').change(function(){

                
                // Condition if pour Modifier la valeur src de avatarTop ou avatarBottom

                    if( $(this).attr('id') == 'avatarStyleTop' ){
                    
                // Modifier la valeur de l'attribut src de #avatarTop

                    $('#avatarTop').attr('src', 'img/top/' + $(this).val() + '.png');

                } else{
                    $('#avatarBottom').attr('src', 'img/bottom/' + $(this).val() + '.png');
                }
        });


        // Capter la soumission du formulaire

            $('form').submit( function(evt){

        // Bloquer le comportement par default du formulaire

            evt.preventDefault();

        // Définir une var pour la validation finale du formulaire

            var formScore =0;

         // Récupérér la valeur de #avatarName

                var avatarName = $(' #avatarName ').val();
                var avatarAge = $(' #avatarAge ').val();

                var avatarStyleTop = $('#avatarStyleTop').val();
                var avatarStyleBottom = $('#avatarStyleBottom').val();

        //  Verifier les champs du formulaire

        // => avatarMan minimum 5 caractères
            
            if(avatarName.length < 5){
                

        // Ajouter un message d'erreur dans le label du dessus

            $('[for="avatarName"] b').text('min 5 caract');

            } else {
                
                 // Incrémenter la variable formScore
            formScore++;

            };
               
        // => avatarAge entre 1 et 100

            if( avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0 ){
                

        // Ajouter un message d'erreur dans le label du dessus

            $('[for="avatarAge"] b').text(' entre 1 et 100 ans ');

            } else{
                
        // Incrémenter la variable formScore
            formScore++;

            };
      
        // => avatarStyleTop obligatoire

            if(avatarStyleTop == 'null' ){
                
                // Ajouter un message d'erreur dans le label du dessus

            $('[for="avatarStyleTop"] b').text('chosir votre BODY !');

            } else{
                
        // Incrémenter la variable formScore
            formScore++;

            };
           
        // => avatarStyleBottom obligatoire

            if( avatarStyleBottom == 'null'){
                
        // Ajouter un message d'erreur dans le label du dessus

            $('[for="avatarStyleBottom"] b').text('Chosir votre BODY !');

            } else{
                
        // Incrémenter la variable formScore
            formScore++;

            };
      

        // => avatarGender vérifier la valeur 
            if( avatarGender == undefined ){

       // Ajouter un message d'erreur dans le label du dessus
            $('.labelGender b').text('Choix obligatoire');

            } else{
                
                 // Incrémenter la variable formScore
            formScore++;

        };
            
            
            if(formScore == 5){
               
        // => Envoyer les données du formulaire et attendre la réponse du serveur AJAX
        // => le serveur répond true

        // ajouter une ligne dans le tableau HTML

        $('table').append('' + 
            '<tr>'+
                 '<td><b>' + avatarName + '</b></td>'+
                 '<td>' + avatarAge + ' ans</td>'+
                 '<td>' + avatarGender + '</td>'+
                 '<td>' + avatarStyleTop + ',' + avatarStyleBottom + '</td>'+
            '</tr>'
        );


        // Ajouter l'avatar dans le tableau JS
        
         myTown.push({
             name: avatarName,
             gender: avatarGender,
             age: parseInt(avatarAge),
             top: avatarStyleTop,
             bottom: avatarStyleBottom
         });

        // vider les champs du formulaire

            $('form')[0].reset();

        // Revenir aux valeurs 'null' pour l'avatr

             $('#avatarBody').attr('src','img/null.png');
             $('#avatarBottom').attr('src','img/bottom/null.png');
             $('#avatarTop').attr('src','img/top/null.png');

       //    Afficher la taille de la ville dans #totalSims
             $('#totalSims').text( myTown.length );
            
        //   Définir les variables globlales pour les stastiques
             var totalGirls = 0;
             var totalBoys = 0;
             var totalAge = 0;

        //   Faire une boucle sur myTown pour connaitre les stastiques
             for(var i = 0; i < myTown.length; i++){
                    console.log( myTown[i].gender );

                    // Condition pour le Gender
                    if (myTown[i].gender == 'girl'){

                        totalGirls++;

                    } else{

                        totalBoys++;
                    }

                    // Additionner les ages
                    totalAge += myTown[i].age;


              };
        // Afficher dans le tableau HTML le nombre de girls et le nombre de boys
              $('#simsWoman').html(totalGirls + '<b>/' + myTown.length + '</b>');
              $('#simsMan').html(totalBoys + '<b>/' + myTown.length + '</b>');

        //  Afficher l'age dans la console
             var ageAmountRounded = Math.round( totalAge / myTown.length );
             $('#simsAgeAmount').html( ageAmountRounded + '<b>/ans</b>');

        };
    
        });

}); // Fin de l'attente du chargement du DOM