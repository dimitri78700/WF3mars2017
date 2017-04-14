
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

SELECT prenom, nom FROM employes WHERE service = 'informatique';  -- Affiche le prénom et le nom des employers du serv informatique. Notez que le nom des champs ou des tables ne prennet pas de quotes, alors que les valeurs telle que 'informatique' prennent des quotes ou des guillemts. Cependant, si'il s'agit d'un chiffre, on ne lui met pas de quote'.


-- BETWEEN

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31';  -- Affiche les employes dont la date d'embauche est entre 2006 et 2010.


-- LIKE

SELECT prenom FROM employes WHERE prenom LIKE 's%';  -- Affiche les prénoms des employés commencant par s. le signe % est un joker qui remplace les autres caractères.
SELECT prenom FROM employes WHERE prenom LIKE '%-%';  -- AFFICHE les prénoms qui contiennent un tiret. LIKE est utilisé en autre pour les formulaires de recherches sur les sites.


-- Opérateur de comparaisons :

SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; -- Affiche le prenom et le nom des employes n'etant du service informatique.

--      =
--      <
--      >
--      <=
--      >=
--      != ou encore <> pour different de 


-- ORDER BY pour faire des tris :

SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire;  -- Affiche les employes par salaire en ordre croissant par défaut.

SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC;   -- ASC pour un tri ascendant, DESC pour un tri descendant. ICI on trie les salaires par ordre croissant puis à salaire indentique, les prénoms par ordre decroissant.


-- LIMIT

SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;  -- Affiche l'employe ayant le salaire le plus haut : on trie d'abord les salaires par ordre decroissant (pour avoir le plus élevé en 1er), puis on limite le résultat au 1er enregistrement avec LIMIT 0.1. le 0 signifie le point de départ de LIMIT et le 1 signifie prendre 1 enregistrement. On utilise LIMIT dans la pagination sur les sites.


-- l'alias avec AS :

SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes;  -- Affiche le salaire sur 12 mois des employés. salaire_annuel est un alias quui " stocke" la valeur de se qui précéde .


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

-- NOT IN 

SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique');  -- Affiche les employes n'appartenant pas à la compta ou l'informatique.

-- AND et OR 

SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000;  -- Affiche le prénom des commerciaux dont le salaire est inférieur à 2000.
SELECT prenom, service, salaire FROM employes WHERE (service= 'production' AND salaire = 1900) OR salaire = 2300; -- Affiche les employes du service prod est de 1900 ou dans les autres services ceux qui gagnent 2300.


-- GROUP BY 

SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service;  -- Affiche le nombre d'employes PAR service. GROUP BY distribue les résultats du comptage par les services correspondants.

-- GROUP BY ... HAVING

SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;  -- Affiche les services où il y a plus d'un employés HAVING remplace WHERE dans un GROUP BY .


-- ***********************
-- Requêtes d'insertion
-- ***********************


SELECT * FROM employes;

INSERT INTO employes(id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800);  -- insertion d'un employé. Notez que l'ordre des champs énéoncés entre les 2 paires de parenthèses doit être le même que les valeurs correspondent.

-- Requête sans préciser les champs concernés :

INSERT INTO employes VALUES (8060,'test', 'test', 'm', 'test', '2012-12-28', 1800, 'valeur en trop');  -- Insertion d'un employer sans préciser la liste des champs si et seulement si le nombre et l'ordre des valeurs attendues sont respectés => ici erreur car il y a une valeur en trop.


-- ***********************
-- Requêtes de Modification
-- ***********************

-- UPDATE

UPDATE employes SET salaire = 1870 WHERE nom ='cottet';   -- Modifier le salaire de l'employer du nom Cottet.

UPDATE employes SET salaire = 1871 WHERE id_employes = 699;  -- Il est recommandé de faire des modif de données par les id car ils sont uniques. Cela évite d'UPDATER plusieurs enregistrement à la fois.

UPDATE employes SET salaire = 1872, service = "autres" WHERE id_employes = 699;  -- On modifie 2 valeurs dans la même requetes.

-- A ne pas faire (sauf contraire) : un UPDATE sans clause WHERE : 
UPDATE employes SET salaire = 1870; -- ici les salaires de tous les employés passent à 1870.


-- REPLACE 

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600); -- L'id_employes 2000 n'existant pas, REPLACE se comporte comme un INSERT'


REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test2', 'test2', 'm', 'marketing', '2010-07-05', 2601);  -- Comme l'id employes existe REPLACE se comporte comme un UPDATE


-- ***********************
-- Requêtes de Suppression
-- ***********************

-- DELETE

DELETE FROM employes WHERE id_employes = 900;   -- Suppression de l'employer dont l'id est 900.

DELETE FROM employes WHERE service = 'informatique' AND id_employes  != 802;  -- Supprime tous les informaticiens sauf 1 dont l'id est 802.

DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990;  -- Supprime deux employés qui n'ont pas de point commun. Il s'agit d'un OR et non pas d'un AND car un employe ne peut pas avoir 2 id_employes differents.

-- A ne pas faire : une DELETE sans clause WHERE 
DELETE FROM employes;  -- Revient à faire un TRUNCATE de table qui est irréversible



-- ***********************
-- Exercices
-- ***********************



-- 1. Afficher le service de l'employer  547.

SELECT service FROM employes WHERE id_employes = 547 ; 

-- 2.  Afficher la date d'embauche d'amandine

SELECT date_embauche  FROM employes WHERE prenom = 'Amandine';

-- 3.  Afficher le nombre de commerciaux 

SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

-- 4.  Afficher le cout des commerciaux sur 1 annuel.

SELECT SUM(salaire * 12) FROM employes WHERE service = 'commercial';

-- 5.  Afficher le salaire moyen par service.

SELECT service, AVG(salaire) FROM employes GROUP BY service;

-- 6. Afficher le nombre de recrutement sur l'année 2010  (3syntaxes possibles)'

SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

SELECT COUNT(date_embauche) FROM employes WHERE date_embauche LIKE '2010%';

-- 7. Augmenter le salaire de chaque employé de 100

UPDATE employes SET salaire =  salaire + 100;

-- 8. Afficher le nombre de services différents

SELECT COUNT(DISTINCT service) FROM employes;

-- 9. Afficher le nombre d'employer par service

SELECT service, COUNT(id_employes) FROM employes GROUP BY service;

-- 10. Afficher les infos de l'employé du service commercial ayant le salaire le plus élevé

SELECT nom, prenom, service, id_employes FROM employes WHERE service = 'commercial' ORDER BY salaire DESC LIMIT 0,1;

-- 11. Afficher l'employer ayant été embauché en dernier'

SELECT nom, prenom FROM employes ORDER BY date_embauche DESC LIMIT 0,1;




