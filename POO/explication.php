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

    Manager/   : 

		PDOManager.php : 
		Cette classe représente la connexion à la BDD. Elle contient et nous retourne notre objet PDO grâce auquel nous pourrons effectuer des requêtes.
		Cette classe est une singlette ((c) Emeline). Cela signifie qu'il ne peut y avoir qu'un seul objet issu de cette classe. 

        EntityRepository.php : 
		Un repository centralise tout ce qui touche à la BDD et la récupération des entités. Concrètement il ne devrait pas y avoir de requêtes SQL ailleurs que dans un repository. 
		Si une entité à besoin de requete spécifique (ex : jointure ) dans ce cas les requetes seront codées directement dans le repository en question. 
		

web/
	index.php : 
	Clé d'entrée de notre application. ( SILEX : index.php / Symfony app.php) 