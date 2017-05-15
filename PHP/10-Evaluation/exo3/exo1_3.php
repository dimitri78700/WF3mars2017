<style>
    div{
        color:red;
        font-size:1rem;
    }
</style>


<?php

            $message = '';

            // Connexion à la BDD exercice_3

			$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

			if(!empty($_POST)) { // Si le formulaire est posté, il y a des indices dans $_post, il n'y a pas vide. 
           
            //  Controle du formulaire : 

		   if(strlen($_POST['title']) < 5 || strlen($_POST['title']) > 20) $message .= '<div>le titre doit comporter au moins 5 cararactères</div>';

           if(strlen($_POST['actors']) < 5 || strlen($_POST['actors']) > 20) $message .= '<div> actors doit comporter au moins 5 cararactères</div>';

           if(strlen($_POST['director']) < 5 || strlen($_POST['director']) > 20) $message .= '<div> director doit comporter au moins 5 cararactères</div>';

           if(strlen($_POST['producer']) < 5 || strlen($_POST['producer']) > 20) $message .= '<div> producer doit comporter au moins 5 cararactères</div>';

		   if (!(is_numeric($_POST['year_of_prod']) && checkdate('01', '01', $_POST['year_of_prod']))) $message .= '<div>L\'année de production n\'est pas valide</div>';
				
           if(strlen($_POST['language']) < 5 || strlen($_POST['language']) > 30) $message .= '<div>La langue doit comporter au moins 5 caractères</div>';
			
           if($_POST['category'] != 'aventure' && $_POST['category'] != 'drame' && $_POST['category'] != 'guerre') $message .= '<div>Le id de contacter n\'est pas correcte</div>';
				
           if(strlen($_POST['storyline']) < 5 || strlen($_POST['storyline']) > 255) $message .= '<div>Le synopsis doit comporter au moins 5 caractères</div>';
				
           if (filter_var($_POST['video'], FILTER_VALIDATE_URL )) {
                    echo 'Cette URL a un format non adapté.';
                } 


		   if(empty($message)) {  
               foreach($_POST as $indice => $valeur){
						$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); 
					}

			$resultat = $pdo->prepare("INSERT INTO movies(title, actors, director, producer, year_of_prod, language, category, storyline, video)VALUES( :title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)");

                    $resultat->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                    $resultat->bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
                    $resultat->bindParam(':director', $_POST['director'], PDO::PARAM_STR);
                    $resultat->bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
                    $resultat->bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_INT);
                    $resultat->bindParam(':language', $_POST['language'], PDO::PARAM_STR);
                    $resultat->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
                    $resultat->bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
                    $resultat->bindParam(':video', $_POST['video'], PDO::PARAM_STR);

                    $req = $resultat->execute();

          //   Afficher le message d'ajout sinon message d'erreur
          
          if($req){
                        echo '<br><br>L\'ajout a bien été fais';
                    }
                    else{
                        echo 'Une erreur est survenue lors de l\'enregistrement l\'ajout n\'a pas pu etre effectué';
                    }
       }
    }



?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>

    <body>

        <h3>Movie</h3>

        <?php echo $message; ?>

        <form method="post" action="">

                <input type="hidden" name="id_movie" value=""><br><br>

                <label for="title"> Title :</label><br>
                <input type="text" id="title" name="title" value=""><br><br>

                <label for="actors"> Actors : </label><br>
                <input type="text" id="actors" name="actors" value=""><br><br>

                <label for="director"> Director :</label><br>
                <input type="text" id="director" name="director" value=""><br><br>

                <label for="producer"> producer ​:</label><br>
                <input type="text" id="producer" name="producer" value=""><br><br>

                <label for="year_of_prod"> Year_of_prod ​:</label><br>
                <select id="select" id="year_of_prod" name="year_of_prod">
                            <?php
                                $a = 2017; 
                            
                                while ($a >= 1800) { 
                                    echo "<option>$a</option>";
                                    $a--;
                                }
                            ?>
                        </select><br><br>

                
                <label for="language"> Language :</label><br>
                <select name="language" id="language"><br>
                        <option value="francais">Français</option>
                        <option value="anglais">Englais</option>
                        <option value="espagnol">Espagnol</option>
                        <option value="portugais">Portugais</option>
                    </select><br><br>

                <label for="category"> Category :</label><br>
                <select id="select" name="category">
                            <option value="NULL">--Selectionner--</option>

                            <option value="drame">Drame</option>

                            <option value="aventure">Aventure</option>
                            
                            <option value="guerre">Guerre</option> 
                        </select><br><br>


                <label for="storyline">Storyline :</label><br>
                <textarea type="text" id="storyline" name="storyline" value=""></textarea><br><br>

                <label for="video">Video :</label><br>
                <input type="url" id="video" name="video" value="http://"></input><br><br>

                <input type="submit" name="inscription" value="s'inscrire" class="btn"><br><br>
        </form>
	</body>
</html>