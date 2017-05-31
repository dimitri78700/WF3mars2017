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
        Contient l'inclusion des params de connexion à la BDD, et les retourne dans une méthode 

vendor/

	autoload.php : 
	Permet d'inclure les bons fichiers lors d'un 'new' (instanciation).
	Attention : Certaines classes sont dans SRC/ mais d'autres comme le controller général sont dans VENDOR/. On doit donc faire un if/else dans l'autoload pour l'aiguiller. 
	De la même manière si l'on avait un dossier BACKOFFICE/, il faudrait un elseif pour préciser le chemin...
    Autre subtilité : le controller général (Controller\Controller) est également dans vendor. 

    Entity/
		Produit.php / Membre.php / Commande.php : 
		Classes qui contiennent toutes les propriétés (private) de nos entitées et les getters et les setters... POPO (Plain Old PHP Object)