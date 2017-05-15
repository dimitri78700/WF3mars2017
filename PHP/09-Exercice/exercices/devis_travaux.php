<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/

    
    $message = '';    
    Function montantTTC($montant, $date){

            $taux = array(10,20);
            $textRemise = '';

        if($date == 'plus'){
            $tva = $taux [0];
        }else {
            $tva = $taux[1];
        }

        $montantTTC = $montant * (1 + $tva/100);

        return "le montant de vos travaux est de $montantTTC euros avec une TVA à $tva% incluse $textRemise";
    }


    if(!empty($_POST)) { 
        

		   if (!(is_numeric($_POST['montant']) || $_POST['montant'] <= 0 )){ $message .= '<div>Le montant est faux</div>';
				}

           if($_POST['date'] != 'plus' && $_POST['date'] != 'moins') {
                $message .= '<div>date mauvaise</div>';
           }
        
        //    if(strlen($_POST['code']) > 5 ) $message .= '<div>code incorrect</div>';

           if(empty($message)){
               $message = montantTTC($_POST['montant'], $_POST['date']);
           }
    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>formulaire devis travaux</title>
    </head> 

    <body>

        <h2>Votre devis de travaux</h2>

        <?php echo $message  ?>
        <form method="post" action="">

                    <label for="montant">Montant des travaux : </label><br>
					<input type="text" id="montant" name="montant"><br><br>

					<label for="date">Date de Construction : </label><br>
					<input type="radio" id="moins" name="date" value="moins">5 ans ou moins<br>
					<input type="radio" id="plus" name="date" value="plus">plus de 5 ans<br><br>

					<input type="submit" name="valider" value="valider" class="btn"><br><br>
    </body>
</html>












