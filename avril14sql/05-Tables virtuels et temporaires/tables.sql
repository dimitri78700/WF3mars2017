--**************************
-- Tables Virtuelles : vues
--**************************

    -- les vues (ou tables virtuelles) sont des objets de la base de données, constitué d'un nom, et d'une requetes de selection.

    -- une fois une vue défénie, on peut l'utiliser comme on le ferait avec une table, laquelle serait constituée des données sélectionnées par la resquetes défissant la vue

    USE entreprise;


    -- Création d'une vue :

    CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm';
    -- crée une table virtuelle (ou vue) remplie avec les données du SELECT 