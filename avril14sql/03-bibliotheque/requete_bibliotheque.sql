-- **************************************
-- Création de la BDD
-- **************************************

CREATE DATABASE bibliotheque;

USE bibliotheque;

-- Copier le contenue de dossier bibliotheque


-- **************************************
-- Exercices
-- **************************************

    -- 1. Quel est l'id_abonne de Laura ?

    SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

    -- 2. L'abonné d'id_abonne 2 est venu emprunter un livre à quelle dates ?

    SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

    -- 3. Combien d'emprunts ont été effectués en tout ?

    SELECT COUNT(id_emprunt) FROM emprunt;

    -- 4.Combien de livres sont sortis le 2011-12-19 ?

    SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie = '2011-12-19';

    -- 5. Une Vie est de quel auteur ?

    SELECT auteur FROM livre WHERE titre = 'Une vie';

    -- 6. De combien de livre d'Alexnadre Dumas dispose-t-on ?

    SELECT COUNT(id_livre) FROM livre WHERE auteur = 'Alexandre Dumas';

    -- 7. Quel id_livre est le plus emprunté ?

    SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

    -- 8. Quel id_abonne emprunte le plus de livre ?

    SELECT id_abonne, COUNT(id_emprunt) FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1;


-- **************************************
-- Requêtes imbriquées
-- **************************************
    -- Syntaxe "aide mémoire" de larequête imbriquée :
    -- SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

    -- Afin de réaliser une requête imbriquée il faut obligatoirement un champ en COMMUN entre les deux tables.

    -- Un champ NULL se teste avec IS NULL : 

    SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;  -- Affiche les id_livre non rendus

    -- Afficher les titres de ces livres non rendus :
    SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

    -- Afficher le n° de slivres que Chloé a emprunté :
    SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'); -- Quand il n'y a qu'un seul résultat dans la requête imbriquée, on met un signe "="

    -- Exercices : Afficher le prénom des abonnés ayant emprunté un livre le 19-12-2011

    SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');

    -- Exercices : Afficher le prénom des abonnés ayant emprunté un livre  d'alphonse Daudet

    SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre in(SELECT id_livre FROM livre WHERE auteur = 'Alphonse Daudet');

    -- Exercices : Afficher le ou les titres de livres que Chloé a emprunté(s) :

    SELECT titre  FROM livre WHERE id_livre IN ( SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloé'));

    -- Exercices : Afficher le ou les titres de livre que Chloé n'a pas encore rendu ?

    SELECT titre FROM livre WHERE id_livre IN ( SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloé'));

    -- Exercices : Combien de livres Benoit a empruntés ? 

    SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN ( SELECT id_abonne FROM abonne WHERE prenom ='Benoit' );

    -- Exercices : Qui (prénom) a emprunté le plus de livres ? 

    SELECT prenom FROM abonne WHERE id_abonne = ( SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 0,1);   --  remarque : on ne peut pas utiliser LIMIT dans IN mais obligatoirement un '='





-- **************************************
-- Jointures internes
-- **************************************

    -- Différence entre jointure et une requête imbiriquée : un requête imbriquée est possible seulement dans le cas où les champs affichés ( ceux qui sont dans le SELECT ) sont issus de la même table.


    -- Avec une requête de jointure, les champs sélectionnés peuvent être issus de table différentes. Une jointure est une reqûete permettant de faire des relations entre les différentes tables afain d'avoir des colonnes associées quui ne forme qu'un seul resultat 

    -- Afficher les dates de sortie et de rendu pour l'abonnée Guillaume :

    SELECT a.prenom, e.date_sortie, e.date_rendu 
    FROM abonne a 
    INNER JOIN emprunt e 
    ON a.id_abonne = e.id_abonne
    WHERE a.prenom = 'guillaume';

    -- 1e ligne : ce que je souhaite afficher 
    -- 2e ligne : la 1ere table d'ou provinnenent les informations
    -- 3e ligne : la seconde table d'où provinnent les infos
    -- 4e ligne : la jointure qui lie les 2 tables avec le champs COMMUN
    -- 5e ligne : la ou les conditions supplémentaire 

    -- Nous aimerions connaitre les mouvements des livres ( titre, date de sortie et date de rendu ) ecrit par Alphonse Daudet :

    SELECT l.titre, e.date_sortie, e.date_rendu
    FROM livre l
    INNER JOIN emprunt e 
    ON l.id_livre = e.id_livre
    WHERE l.auteur = 'Alphonse Daudet';

    -- Qui a emprunté "une vie" sur l'année 2011 ?

    SELECT a.prenom
    FROM abonne a 
    INNER JOIN emprunt e 
    ON a.id_abonne = e.id_abonne
    INNER JOIN livre l 
    ON l.id_livre = e.id_livre
    WHERE l.titre = 'une vie' AND date_sortie LIKE '2011%';


    -- Afficher le nombre de livres emprunté chaque abonnée

    SELECT a.prenom, COUNT(e.id_emprunt) AS nombre
    FROM abonne a 
    INNER JOIN emprunt e
    ON a.id_abonne = e.id_abonne
    GROUP BY a.prenom;


