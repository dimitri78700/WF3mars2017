Arborescence :

app/ : La configuration de l'appliction
src/ : Le code PHP et HTML spécifique à notre projet
vendor/ : code générale (coeur)) de l'application et les entités.
web/ : Repertoire web racine . Le point d'entrée de notre application (index.php, img/ photo/ js/ css/ font/) (assets)


------------------------------------------------

Nature des différents fichiers :

app/
    Config/
        parameters.php :
        Contient toutes les infos de connexion à la BDD et autres paramètres.

        Config.php :
        Contient l'inclusion des params de connexion à la BDD, et les retourne dans une méthode '