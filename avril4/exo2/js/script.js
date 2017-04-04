// Attendre le chargement du DOM
$(document).ready(function(){


        // function fadeout()
        $('section').eq(0).children('button').click(function(){

                $('section').eq(0).children('article').fadeOut('500');
        });

        $('section').eq(1).children('button').click(function(){

                $('section').eq(1).children('article').fadeIn(500);
        });

        $('section').eq(2).children('button').click(function(){

                $('section').eq(2).children('article').fadeToggle(500);
        });



        // function slideUp()
        $('section').eq(3).children('button').click(function(){

                $('section').eq(3).children('article').slideUp(1000);
        });

         $('section').eq(4).children('button').click(function(){

                $('section').eq(4).children('article').slideDown(1000);
        });


        // function slideToggle()
        $('section').eq(5).children('button').click(function(){

                $('section').eq(5).children('article').slideToggle(1000);
        });


            
});  // fin de la demande de chargement du DOM





