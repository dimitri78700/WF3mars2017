// Attendre le chargement du DOM
$(document).ready(function(){

        // Ouvrir la modal

        $('button').click(function(){

                $('section').fadeIn();
        });

        // Fermer la modal .fadeOut

        $('.fa').click(function(){

                $('section').fadeOut();
        });

        // Capter les touches du clavier 
        $(document).keyup(function(evt){

                if( evt.keyCode == 27  ){
                     $('section').fadeOut(); 
                };
        });
            
});  // fin de la demande de chargement du DOM