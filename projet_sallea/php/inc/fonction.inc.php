<?php

function debug($d, $mode = 1)
{
	echo '<div style="background: orange; padding: 5px; z-index: 1000;">';
	$trace = debug_backtrace();
	echo 'debug demandé dans le fichier ' . $trace[0]['file'] . ' à la ligne ' . $trace[0]['line'];
	// echo '<pre>'; print_r($trace); echo '</pre>';
		if($mode == 1) 
		{
			echo '<pre>'; print_r($d); echo '</pre>';
		}
		else
		{
			var_dump($d);
		}
	echo '</div>';
}

function dd($d, $mode = 1)
{
	echo '<div style="background: orange; padding: 5px; z-index: 1000;">';
	$trace = debug_backtrace();
	echo 'debug demandé dans le fichier ' . $trace[0]['file'] . ' à la ligne ' . $trace[0]['line'];
	// echo '<pre>'; print_r($trace); echo '</pre>';
		if($mode == 1) 
		{
			echo '<pre>'; print_r($d); echo '</pre>';
		}
		else
		{
			var_dump($d);
		}
	echo '</div>';
    die();
}

// ********************************** Fonctions membres **********************************
function internauteEstConnecte(){
    // Cette fonction indique si l'internaute est connecté:
    if(isset($_SESSION['membre'])){
        return true;
    } else {
        return false;
    }
    // on pourrait écrire:
    // return ($_SESSION['membre']); car isset retourne deja true ou false
}
// -------
function internauteEstConnecteEtEstAdmin() {
    // Cette fonction indique si le membre connecté est admin
    if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
        return true;
    } else{
        return false;
    }
}
// --------------
function executeRequete($req, $param = array()){ // $param est un array vide par defaut. Il est donc optionnel.
    // htmlspecialchars:
    if(!empty($param)){
        // Si on a bien recu un array, on le traite
        foreach ($param as $indice => $valeur){
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }
    }
    // La requette préparée

    global $pdo; // $pdo est déclaré dans l'espace global (fichier init.inc.php). Il faut donc faire global $pdo pour l'utiliser dans un espace local de cette fonction'
    
    $r = $pdo->prepare($req);

    $succes = $r->execute($param); // On execute la requette en lui passant l'array $param qui permet d'associer cchaque marquer a sa valeur

    // Traitement erreurs SQL eventuelle:
    if(!$succes){ // Si $succes vaut false, il y a une erreur sur la requette
        die('erreur sur la requette SQL:' . $r->errorInfo()[2] ); // die arrete le script et affiche  un message. Ici on affiche un message d'erreur SQL donné par errorInfo(). Cette methode retourne un array dans lequel le message se situe a l'indice [2]
    }
    return $r; // Retourne un objet PDOStatement qui contient le resultat de la requete
}