<?php

    // Creation de la fonction convertiseur 

    $message = '';

    function conversion($money, $format){  // création de la fonction conversion 

        $taux = array(1.085965, 0.919920);  // Création d'un array pour la création de la variable $taux '

        if($format == 'FR'){
        
            $devise = $taux[0]; 
                $conversion = $money * $devise;
                     return "$conversion $.";	// retourne le resultat du $taux * $devise en dollar
            
            }
        else{
            $devise = $taux[1]; 
                $conversion = $money * $devise;
                     return "$conversion €.";	// retourne le resultat du $taux * $devise 	en euro 
                    
        }
    }

    echo conversion(3, 'US').'<br><br>';
    echo conversion(2, 'FR');
?>



