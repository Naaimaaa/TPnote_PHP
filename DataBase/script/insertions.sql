-- script d'insertions pour les tests
-- génération data : https://generatedata.com/

INSERT INTO UTILISATEUR (EMAILU, PASSWRD, NOMU, PRENOMU)
VALUES
    ("vo@gmail.com", "oooo", "Valin", "Ophélie"),
    ("s.georgia2866@outlook.couk", "1","Simon","Georgia"),
    ("gannon_gould@hotmail.edu","1","Gould","Gannon"),
    ("m_macey7223@protonmail.net","1","Moss","Macey"),
    ("george_frye7231@aol.edu","1","Frye","George"),
    ("chambers_russell1853@protonmail.couk","1","Chambers","Russell"),
    ("r-lavinia@icloud.org","1","Ramsey","Lavinia"),
    ("ulysses-browning@yahoo.com","1","Browning","Ulysses"),
    ("d-angelica3194@outlook.com","1","Davenport","Angelica"),
    ("hardy.otto4636@yahoo.ca","1","Hardy","Otto"),
    ("naomilamb@hotmail.edu","1","Lamb","Naomi");


INSERT INTO QUIZ (IDQUIZ, NOMQUIZ)
VALUES 
    (1,"QUIZ PHP"),
    (2,"VIVE LES VACANCES");
    

INSERT INTO PARTICIPER (EMAILU, IDQUIZ, POINTS, DATEPART)
VALUES
    ("s.georgia2866@outlook.couk",1,24,"2024-08-26 16:44"),
    ("gannon_gould@hotmail.edu",1,13,"2025-07-17 03:22"),
    ("m_macey7223@protonmail.net",2,17,"2024-01-06 15:35"),
    ("george_frye7231@aol.edu",2,47,"2024-08-28 15:20"),
    ("chambers_russell1853@protonmail.couk",2,28,"2025-06-07 15:33"),
    ("hardy.otto4636@yahoo.ca",2,12,"2024-03-04 15:53"),
    ("naomilamb@hotmail.edu",1,44,"2024-10-30 16:08"),
    ("naomilamb@hotmail.edu",1,46,"2025-05-18 17:15");


INSERT INTO QUESTION (NUMQ, INTITULE)
VALUES
    (1, "Que signifie PHP ?"),
    (2, "Quelle fonction retourne la longueur d'une chaine de texte ?"),
    (3, "Comment vérifier l'égalité de deux variables ?"),
    (4, "Quel est le meilleur endroit pour partir en vacances ?"),
    (5, "Est-ce que je préfère la mer ou la montagne ?");
   

INSERT INTO COMPOSER (NUMQ, IDQUIZ)
VALUES
    (1,1),
    (2,1),
    (3,1),
    (4,2),
    (5,2);


INSERT INTO REPONSE (NUMR, LIBELLE)
VALUES
    (1, "Page Helper Process"),
    (2, "Programming Home Pages"),
    (3, "Hypertext Preprocessor"),
    
    (4, "strlen"),
    (5, "strlength"),
    (6, "length"),
    (7, "substr"),

    (8, "$a = $b"),
    (9, "$a == $b"),
    (10, "$a != $b"),
    (11, "if($a,$b)"),

    (12, "La forêt"),
    (13, "La campagne"),
    (14, "Mars"),

    (15, "La mer"),
    (16, "La montagne");


INSERT INTO ASSOCIER (NUMR, NUMQ, CORRECTE)
VALUES
    (1, 1, FALSE),
    (2, 1,FALSE),
    (3, 1, TRUE),

    (4, 2, TRUE),
    (5, 2, FALSE),
    (6, 2, FALSE),
    (7, 2, FALSE),

    (8, 3, FALSE),
    (9, 3, TRUE),
    (10,3, FALSE),
    (11,3, FALSE),
    
    (12,4,TRUE), 
    (13,4,TRUE),
    (14,4,TRUE),
    
    (15,5,TRUE),
    (16,5, FALSE);



    

    