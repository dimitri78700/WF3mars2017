<?php

	class Autoload
	{
		public static function className($nom_de_la_class){
			// require 'Controller/ProduitControleler.php'

			$tab = explode('\\', $nom_de_la_class );

			if($tab[0] == 'Controller'){
				$path = __DIR__ . '/../src/' . implode('/', $tab) . '.php';
			} else {
				$path = __DIR__ . '/' . implode('/', $tab) . '.php';
			}
			
			require $path;

			echo '<pre> Autoload : ' . $nom_de_la_class . '<br>';
			echo '=> ' . $path . '</pre><hr>';	
		}
		
	}
	//-----------
	spl_autoload_register(array('Autoload', 'className'));
	//-----------
	//spl_autoload_register(), utilisé en POO attends 1 argument qui est un array avec les valeurs suivantes : 
		//1 : le nom de la classe 
		//2 : La méthode à exécuter (OBLIGATOIREMENT) static
		// Il va faire ceci : Autoload::className($nom_de_la_classe)
	

