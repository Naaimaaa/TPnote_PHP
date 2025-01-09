-- drop procedure


-- Vériication qu'au moins une réponse est correcte
delimiter |
CREATE OR REPLACE TRIGGER 




-- Vérification qu'une question n'a pas de réponse en double
delimiter |
CREATE OR REPLACE TRIGGER addReponseQuestion BEFORE INSERT ON ASSOCIER FOR EACH ROW
BEGIN
    DECLARE nbReponseQ int DEFAULT 0;
    DECLARE mes VARCHAR(100) DEFAULT "";
    SELECT COUNT(NUMR) INTO nbReponseQ FROM ASSOCIER WHERE NUMR=new.NUMR;
    IF nbReponseQ = 1 THEN
        SET mes = CONCAT("Impossible d'ajouter la réponse numéro", new.NUMR, "dans le questionnaire n°"
        , new.NUMQ, "car cette réponse est déjà associée à celui-ci");
        signal SQLSTATE '45000' set MESSAGE_TEXT = mes;
    END IF;
END |
DELIMITER ;