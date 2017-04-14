-- ***********************************************
-- Création de la BDD
-- ***********************************************

CREATE DATABASE bibliotheque;

USE bibliotheque;

-- copie colle le contenu de bibliotheque.sql dans la console


--***************
-- EXERCICES
-- **************


-- 1. Quel l'id abonné de laura ? 

SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

-- 2. L'abonné d'id abonné 2 est venu emprunter un livre à quelles dates ?

SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

-- 3.  CCombien d'emprunts ont été effectués en tout ? 

SELECT COUNT(date_sortie) FROM emprunt WHERE id_abonne;

-- 4.  Combien de livres sont sorties le 2011-12-19 ?

SELECT COUNT(id_livre) FROM emprunt WHERE date_sortie LIKE '2011-12-19%';

-- 5. Une vie est de quel auteur ? 

SELECT 

-- 6. Combien de livre A.Dumas dispote-t-on ? 



-- 7. Quel id livre est le plus emprunté ? 



-- 8. Quel id abonne emprunte le plus de livre ? 
