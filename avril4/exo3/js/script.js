// Attendre le chargement du DOM
$(document).ready(function(){

        $('h3').click(function(){

                // Fermer les balises suivant .open
                $('.open').not(this)
                .next().slideUp()
                .prev().removeClass('open')
                .children('.fa').toggleClass('fa-hand-o-right').toggleClass('fa-bookmark');

                // faire un toggle de la classe open sur la balise h3
                $(this).toggleClass('open');

                // Selection la balise suivante
                $(this).next().slideToggle();

                // Selection la balise .fa pour supprimer la class .fa-hand-o-right
                $(this).children('.fa').toggleClass('fa-hand-o-right').toggleClass('fa-bookmark')
        });

            
});  // fin de la demande de chargement du DOM





