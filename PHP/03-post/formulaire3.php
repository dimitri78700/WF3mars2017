<h1>Formulaire</h1>

     <!-- // Exercice : créer le forumulaire "pseudo" et "email" dans formulaire3.php, en recupérent et affichant les informations dans formulaire4.php. 

    //  de plus, une fois le formulaire soumis,vous véréfiez que les pseudo n'est pas vide. Si tel est le cas, affichez un message d'erreur à l'internaute ( dans formulaire4.php).'-->


    <form action="formulaire4.php" method="post">

            <label for="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" name="pseudo"><br>

            <label for="email">email : </label>
            <input type="text" id="email" name="email"><br>

            <input type="submit" name="validation" value="envoyer">
    </form>