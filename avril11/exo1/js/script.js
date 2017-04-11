$('document').ready(function(){

    // definir une variable
    var boxChecked;
    

    // UI checkbox
    $('[type="checkbox"]').click(function(){

        //  definir la valeur de box boxChecked
        boxChecked = $(this).val()

       // console.log( $(this)[0].checked )

       var checkboxArray = $('[type="checkbox"]').not( $(this) )

       for ( var i = 0; i < checkboxArray.length; i++){
        //   décocher les checkbox
            checkboxArray[i].checked = false;
       };

    //   Modifier l'image
        if( $(this).val() == 'first' ){

            $('img').attr('src', 'img/1.jpg');
            
        } 
        else if( $(this).val() == 'second'){

            $('img').attr('src', 'img/2.jpg');
            
       }  
       else if ( $(this).val() == 'third'){

           $('img').attr('src', 'img/3.jpg');
        
        } 
        else{
            $('img').attr('src', 'img/4.jpg');
            
        }

    });


    // capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement par defaut du formulaire
        evt.preventDefault();

        // vérif quelle box eet est cochée , afficher la modal avec l'image select, reset le formulaire.

        if(boxChecked == undefined){

            console.log('vous devez choisir une image')
        } else {

            // afficher la modal
             $('#modal').fadeIn();
        }

       
        //  reset du formulaire
        $('form')[0].reset();

    });

}); // Fin du chargement du DOM