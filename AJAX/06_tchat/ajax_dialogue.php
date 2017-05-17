<?php

    $tab = array();
    $tab['resultat'] = '';

    $mode = isset($_POST['mode'])  ? $_POST['mode'] : '';

    if($mode == 'liste_membre_connecte'){

        // récupérer le contenu du fichier prenom.txt (file())
        // placer dans $['resultat'] le contenu de ce fichier sous la forme '<p>pseudo1</p><p>pseudo</p>'

       
        $prenom = file("prenom.txt");
        foreach($prenom as $valeur){
            $tab['resultat'] .= '<p>' . $valeur . '</p>';
        }
    }
    echo json_encode($tab);