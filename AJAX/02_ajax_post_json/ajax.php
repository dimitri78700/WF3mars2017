<?php

//  nous avons besoin d'un language interprété coté serveur pour pouvoir communiquer. 

$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : ''; 

$tab = array(); // on prépare le tableau array qui contiendra la reponse. 

$fichier = file_get_contents("fichier.json");  // on récup le contenu du fichier.json 
$json = json_decode($fichier, true); // on transforme en tableau array reprénsente par la variable $json 

foreach($json as $valeur){
    if($valeur['prenom'] == strtolower($prenom)){
        $tab['resultat'] = '<table border="1"><tr>';
        foreach($valeur as $information){
            $tab['resultat'] .= '<td>' . $information . '</td>';
        }
       $tab['resultat'] .= '</tr></table>';
    }
}
echo json_encode($tab);
