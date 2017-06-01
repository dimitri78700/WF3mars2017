<?php

//vendor/Controller/Controller.php

namespace Controller; 

use Repository;

class Controller
{
	protected $repository; //Contiendra un objet de ProduitRepository, ou MembreRepository ou CommandeRepository etc... en fonction de l'entit� dans laquelle je suis (produitController, ou MembreController ou CommandeController...) 
	
	public function getRepository(){
		// exemple : je suis dans Controller\ProduitController, et je veux un Repository\ProduitRepository
	
		$class = 'Repository\\' . str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Repository';
		//Controller\ProduitController
		//Produit
		//Repository\ProduitRepository
		
		$this -> repository = new $class; 
		//$this -> repository = new Repository\ProduitRepository
		
		return $this -> repository; 
	}

	
	
	public function render($layout, $view, $params){
		$dirView = __DIR__ . '/../../src/View';
		// je sors du dossier controller et je vais dans le dossier View
		
		$dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class());
		// Si je suis dans Controller\ProdutController , je r�cup�re le mot 'Produit' qui correspond au dossier o� sont stock�es mes vues. 
		
		$path_layout = $dirView . '/' . $layout;
		$path_view = $dirView . '/' . $dirFile . '/' . $view;
	
		extract($params);
	
		ob_start(); // enclenche la temporisation de sortie. Cela signifie que la ligne de code juste en dessous ne sera pas ex�cuter, elle sera retenue. 
		require $path_view;
		
		$content = ob_get_clean(); // cela signifie que l'action retenue en temporisation, est maintenant repr�sent�e par la variable $content. 
		
		ob_start();
		require $path_layout;
		
		return ob_end_flush();
		// retourne tout ce qui a �t� retenu. Il �teint la temporisation !
	}
	
	
	
	
	
	
	
}