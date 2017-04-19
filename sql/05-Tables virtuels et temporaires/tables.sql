--**************************
-- Tables Virtuelles : vues
--**************************

    -- les vues (ou tables virtuelles) sont des objets de la base de données, constitué d'un nom, et d'une requetes de selection.

    -- une fois une vue défénie, on peut l'utiliser comme on le ferait avec une table, laquelle serait constituée des données sélectionnées par la resquetes défissant la vue

    USE entreprise;


    -- Création d'une vue :

    CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm';
    -- crée une table virtuelle (ou vue) remplie avec les données du SELECT 

    -- une seconde requête effectuée sur la vue : 
    SELECT prenom FROM vue_homme;  -- On peut effectuer toutes les opé habituelles sur cette table virtuelle vue_homme 

    -- Si il y a un changement dans la table d'origine, la vue est corrigé dynamiquement car elle est enregistré la requete SELECT qui pointe vers la table d'origine. Inversement , si il y a un changement dans la table virtuelle, il s'impacte dans la table d'origine
    -- il y a interet à faire des vues en termes de gain de ressources, ou quand il y a des requetes complexes à exécuter.

    SHOW TABLES;  -- cette vue est visible dans la liste des tables avec cette instruction 

    -- Supprimer une vue

    DROP VIEW vue_homme;


--**************
-- Tables temporaires
--**************

    -- Créer une table temporaires: 
    CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe ='f';



    -- Utilisation une table temporaire :

    SELECT prenom FROM temps  -- affiche les prénoms de la table temporaire temp