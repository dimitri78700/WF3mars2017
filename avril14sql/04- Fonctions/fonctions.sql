-- **************************************
-- FONCTION prédéfinies
-- **************************************

  -- Fonction prédéfinies : prévu par le language SQL et exécutée par le développeur 

  -- Dernier ID  inséré 
  INSERT INTO abonne (prenom) VALUES('test');
  SELECT LAST_INSERT_ID(); -- permet d'afficher le dernier identifiant inséré
  
  
  -- Fonction de dates :
  SELECT*, DATE_FORMAT(date_rendu, '%d-%m-%y') AS date_rendu_fr FROM emprunt;  -- met les dates du champs de date rendu au format francais 

  SELECT NOW();  -- Affiche la date et l'heure en cours'

  SELECT CURDATE(); -- Retourne la date du jour au format YYYY-MM-DD
  SELECT CURTIME(); -- Retourne l'heure courante au format hh:mm:ss
  
  -- Crypter un MDP avec l'algorithme AES :

  SELECT PASSWORD('mypass');  -- Affiche mypass crypté par l'algorithme AES

  INSERT INTO abonne (prenom) VALUES(PASSWORD('mypass'));  -- Insere le mdp crypté en base

  -- Concaténation : 

  SELECT CONCAT('a', 'b', 'c');   -- Concatène les 3 chaines de caractères

  SELECT CONCAT_WS('-', 'a','b','c');  -- Concatène with seperator : concaténation avec un séparateur

  -- Fonctions sur les chaines de caractères : 

  SELECT SUBSTRING('boujour', 1, 3); -- Affiche 'bon' : compte 3 à partir de la position  1

  SELECT TRIM('   bonjour   ');  -- Supprime les espaces avant et après la chaine de caracteres


  -- SQL.ch pour les sources pour les fonctions.