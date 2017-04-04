// Attendre le chargement du DOM
$(document).ready(function(){


      // Fonction animate()
            $('section:first button').click(function(){

        // changer la couleur de fond et la taiblle de l'article 
                $('section:first article').animate({

                height: '30rem',
                width: '20rem'
           });

    });

            $('section:nth-child(2) button').click(function(){

                $('section:nth-child(2) article').animate({

                left :'+=.1rem',
                top: '-=1rem'
                   
            });
        
    });

            // Fonction animate() : toggle/show/hide
            $('section:nth-child(3) button').click(function(){
                
                $('section:nth-child(3) article ').animate({

                width: 'toggle'

            });

    });

            // Fonction animate() avec callBack
            $('section:last button').click(function(){
 
                $('section:last article').animate({
                    width: '20rem',
                    height: '20rem'
                }, 2000, function(){
                    
                    $(this).hide();
            });

    });
            
});  // fin de la demande de chargement du DOM





