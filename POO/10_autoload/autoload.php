<?php 

// 10 - autoload


    function inclusion_automatique($nom){
    //require('A.class.php');
	require($nom . '.class.php');
	
	//---------

	echo 'On passe dans l\'autoload<br/>';
	echo 'On fait un require('. $nom .'.class.php)<br>';
    }




// -------------------
    spl_autoload_register('inclusion_automatique');
// -------------------
/*
    Commentaire : 
        spl_autoload_register :
            - c'est une fonction superpratique ! Elle va s'exécuter à chaque fois que l'interpreteur voit le mot "new"
            - Elle va exécuter une fonction, dont on lui fournit le nom en argument 
            - Elle va apporter à cette fonction le mot qui vient après le mot clé 'new' c'est à dire le nom de la classe à instancier. 


*/