<?php

// ********************
// La superglobale $_POST
// ********************

    //   $_POST est une superglobale, et donc un array disponible dans tous les contextes du script.
    // c'est une méthode qui permet de récupérer des informations issues d'un formulaire.$_COOKIE
    // un formulaire est obligatoire dans des balises <form></form>, avec la designation des attributs method (pour get ou post) et action (qui indique le fichier de destination des données du form).il contient un bouton de type submit qui déclenche l'envoie des données vers le serveur. 
    // les attributs name du formulaire constituent les indices de l'array $_POST de réception. les données saisies dans les champs constituent les valeurs correspondante '

    print_r($_POST);

    if(!empty($_POST)) {  // not empty signifie que l'array $_POST n'est pas vide, autrement dit que le formulaire a été posté. il peut cependant avoir été posté avec des champs vides : les valeurs de l'array $_POST sont vides MAIS il y a bien les indices 'prenom' et 'description' à l'interieur. 
        echo 'prenom : ' . $_POST['prenom']. '<br>';
        echo 'Description : ' . $_POST['description']. '<br>';
     }

    

?>
    <h1>Formulaire</h1>
    <form action="" method="post">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom"><br>

            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea><br>

            <input type="submit" name="validation" value="envoyer">
    </form>