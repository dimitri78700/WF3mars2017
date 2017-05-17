<?php 

    require_once("inc/init.inc.php");

    $tab = array();
    $tab['resultat'] = "";

    // extract($_POST);

    $mode = isset($_POST['mode']) ? $_POST['mode'] : '';

    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';

    $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';

    $ville = isset($_POST['ville']) ? $_POST['ville'] : '';

    $date_de_naissance = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : '';
    