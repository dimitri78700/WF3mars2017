<?php 

   $message = array('prenom' => 'dimitri', 'nom' => 'raievsky' , 'adresse' => '53 d rue des ff', 'code_postal' => '75000', 'ville' => 'Paris', 'email' => 'memfm@ggg', 'telephone' => '06555555', 'date' => '1985-02-17');  

   echo '<pre>'; print_r($message);  echo '</pre>'; // pour afficher le tableau. 

   echo '<h2> On se présente </h2>';

   $date = new DateTime($message['date']); //  création de la classe avec DateTime. 

   foreach ($message as $i => $value) {
                echo '<li>' . $i . ' : ' . $value . '</li>' . '<br>';  // on affiche les clés + valeurs. 

                if($message == $i) {
                echo '<li> date de naissance : ' . $date->format('d-m-Y') . '</li>' . '<br>';  
             } 
        }

?>


