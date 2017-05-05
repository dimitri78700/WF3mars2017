
<?php
    // 1- créer une fonction qui retourne la conversion d'une date FR en date US ou inversement. Cette fonction prend 2 paramètres : une date (valide) et le format de conversion "us" ou "FR". 

    // 2- Vous validez que le paramètre de format est bien en US ou FR. la fonction retourne un message si ce n'est pas le cas. 

// echo datefrus('17-03-1990', "FR");
// echo datefrus('1990-03-17', "US");

  function datefrus($date, $langue){
    if($langue == 'FR' ){
        return $date = strftime('%d-%m-%Y', strtotime($date));
    } elseif($langue == 'US') {
        return  $date = strftime('%Y-%m-%d', strtotime($date)) . '<br>';
    } else {
        return 'mauvaise langue' . '<br>';
    }
}
    echo datefrus('17-03-1990', 'US');
    echo datefrus('1990-03-17', 'FR');   

    //   function afficheDate($date, $format){
    //     //   Version avec objet 
    //     $objetDate = new DateTime($date);

    //     if($format == 'FR'){
    //         return $objetDate->format('d-m-Y') . '<br>';
    //     } elseif ($format == 'US'){
    //         return $objetDate->format('Y-m-d') . '<br>';
    //     } else {
    //         return 'le format demande is not good';
    //     }
    //   }

    //     echo afficheDate('05-05-2017', 'US');
    //     echo afficheDate('2017-05-05', 'FR');
?>