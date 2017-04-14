
-- Ouvrir la console SQL sous XAMPP:
 cd c:\xampp\mysql\bin
 mysql.exe -u root --password

-- ligne de commentaire en SQL début par -- 
-- les requetes ne sont pas sensibles à la casse, mais une convention indique qu'il faut mettre les mots clés des requetes en MAJUSCULES.



-- *********************
-- Requetes générales
-- *********************



CREATE DATABASE entreprise; -- crée une nouvelle base de données appelée "entreprise"

SHOW DATABASES;  -- permet d'afficher les BDD disponibles

-- NE PAS SAISIR DANS LA CONSOLE :
DROP DATABASE entreprise; -- suppression de la BBD entreprise

DROP table employers;  -- suppression de la table employes

TRUNCATE employes;   -- vider la table employes de son contenu 


-- On peut coller dans la console :

USE entreprise; -- se connecter à la BDD entreprise

SHOW TABLES;  -- Permet de lister les tables de la BBD  en cours d'utilisation

DESC employes;  -- Observer la structure de la table ainsi que les champs  (DESC pour describe)




-- *********************
-- Requetes de selections
-- *********************



SELECT nom, prenom FROM employes;  -- Affiche les nom et prenom de la table employes : SELECT sélectionne les champs indiqués, FROM la ou les tables utilisées.

SELECT service FROM employes;  -- Affiche les services de l'entreprise'


-- DISTINCT
-- On a vu dans la requete précédente que les services sont affichés plusieurs fois, pour éliminer les doublons, on utilise DISTINCT :

SELECT DISTINCT service FROM employes;  


-- ALL ou *
-- on peut afficher toutes les informations issues d'une table avec une * pour dire (ALL)'

SELECT * FROM employes;  -- Affiche toutes la tables employes


-- clause WHERE

SELECT prenom, nom FROM employes WHERE service = 'informatique';  -- Affiche le prénom et le nom des employers du serv informatique. Notez que le nom des champs ou des tables ne prennet pas de quotes, alors que les valeurs telle que 'informatique' prennent des quotes ou des guillemts. Cependant, si'il s'agit d'un chiffre, on ne lui met pas de quote'


-- BETWEEN

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31';  -- Affiche les employes dont la date d'embauche est entre 2006 et 2010


-- LIKE

SELECT prenom FROM employes WHERE prenom LIKE 's%';  -- Affiche les prénoms des employés commencant par s. le signe % est un joker qui remplace les autres caractères.
SELECT prenom FROM employes WHERE prenom LIKE '%-%';  -- AFFICHE les prénoms qui contiennent un tiret. LIKE est utilisé en autre pour les formulaires de recherches sur les sites


-- Opérateur de comparaisons :

SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; -- Affiche le prenom et le nom des employes n'etant du service informatique

--      =
--      <
--      >
--      <=
--      >=
--      != ou encore <> pour different de 


-- ORDER BY pour faire des tris :

SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire;  -- Affiche les employes par salaire en ordre croissant par défaut.

SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC;   -- ASC pour un tri ascendant, DESC pour un tri descendant. ICI on trie les salaires par ordre croissant puis à salaire indentique, les prénoms par ordre decroissant


-- LIMIT

SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;  -- Affiche l'employe ayant le salaire le plus haut : on trie d'abord les salaires par ordre decroissant (pour avoir le plus élevé en 1er), puis on limite le résultat au 1er enregistrement avec LIMIT 0.1. le 0 signifie le point de départ de LIMIT et le 1 signifie prendre 1 enregistrement. On utilise LIMIT dans la pagination sur les sites.


-- l'alias avec AS :

SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes;  -- Affiche le salaire sur 12 mois des employés. salaire_annuel est un alias quui " stocke" la valeur de se qui précéde 


-- SUM

SELECT SUM(salaire * 12) FROM employes;  -- Affiche le salaire total annuel de tous les employes. SUM permet d'additionner des valeurs de champs différents.


-- MIN et MAX :  affiche le salaire le plus haut et le plus bas.

SELECT MIN(salaire) FROM employes;
SELECT MAX(salaire) FROM employes;

SELECT prenom, MIN(salaire) FROM employes;
-- ne donne pas le resultat attendu, car affiche le 1er prénom rencontré dans la table ( Jean-Pierre). il faut pour répondre à cette question utiliser ORDER BY et LIMIT comme au dessus :

SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;


-- AVG ( arevage)

SELECT AVG(salaire) FROM employes; -- Affiche le salaire moyen de l'entreprise.

-- ROUND 

SELECT ROUND(AVG(salaire), 1) FROM employes;  -- Affiche le salaire moyen arrondi à 1 chiffre après la virgule.

-- COUNT 

SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f';  -- Affiche le nombre d'employées féminins.

-- IN 

SELECT prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique');  -- Affiche les employes appartenant à la compta ou l'informatique.