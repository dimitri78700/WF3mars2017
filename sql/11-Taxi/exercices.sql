--******************
-- EXERCICES
--******************

    -- 1. Qui conduit la voiture d'id_vehicule 503 ?

            SELECT prenom FROM conducteur WHERE id_conducteur IN ( SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule = 503);

            -- ou


            SELECT c.prenom, c.nom
            FROM conducteur c
            INNER JOIN association_vehicule_conducteur a
            ON c.id_conducteur = a.id_conducteur
            WHERE a.id_vehicule = 503;

    -- 2. Qui (prenom) conduit quel modele ? 

            SELECT c.prenom, v.modele
            FROM conducteur c
            INNER JOIN association_vehicule_conducteur a
            ON c.id_conducteur = a.id_conducteur
            INNER JOIN vehicule v
            ON a.id_vehicule = v.id_vehicule;

    -- 3. Inserer vous dans la table conducteur , puis afficher tout les conducteurs  (même ceux qui n'ont pas de véhicule affecté), ainsi que les modéles de véhicules.
            INSERT INTO conducteur ( prenom, nom ) VALUES('DIMITRI', 'RAIEVSKY');


            SELECT c.prenom, c.nom, v.modele
            FROM conducteur c
            RIGHT JOIN association_vehicule_conducteur a
            ON c.id_conducteur = a.id_conducteur
            RIGHT JOIN vehicule v 
            ON a.id_vehicule = v.id_vehicule;


    -- 4. Ajouter l'enregistrement suivant :
            INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES ('renault', 'Espace', 'noir', 'ZE-123-RT');
            -- puis afficher tous les modèles de véhicule, y compris ceux qui n'ont pas de chauffeur affecté, et les prénom des conducteurs.

            SELECT c.prenom, v.modele
            FROM conducteur c 
            LEFT JOIN association_vehicule_conducteur a
            ON c.id_conducteur = a.id_conducteur
            LEFT JOIN vehicule v
            ON a.id_vehicule = v.id_vehicule;
            

    -- 5. Afficher les prénom des conducteurs  (y compris ceux qui n'ont pas de voiture) et tous les modèles ( y compris  ceux qui n'ont pas de chauffeur')

    
            (SELECT c.prenom, v.modele
            FROM conducteur c 
            LEFT JOIN association_vehicule_conducteur a
            ON c.id_conducteur = a.id_conducteur
            LEFT JOIN vehicule v
            ON a.id_vehicule = v.id_vehicule)

            UNION 
            
            (SELECT c.prenom, v.modele
            FROM conducteur c 
            RIGHT JOIN association_vehicule_conducteur a
            ON c.id_conducteur = a.id_conducteur
            RIGHT JOIN vehicule v
            ON a.id_vehicule = v.id_vehicule);

