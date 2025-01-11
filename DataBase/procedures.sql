-- drop procedure
DROP TRIGGER IF EXISTS addReponseQuestion;


-- Vérification qu'une question n'a pas de réponse en double
delimiter |
CREATE OR REPLACE TRIGGER addReponseQuestion BEFORE INSERT OR UPDATE ON ASSOCIER FOR EACH ROW
BEGIN
    DECLARE nbReponseQ int DEFAULT 0;
    DECLARE mes VARCHAR(200) DEFAULT "";
    SELECT COUNT(NUMR) INTO nbReponseQ FROM ASSOCIER WHERE NUMR=new.NUMR;
    IF nbReponseQ = 1 THEN
        SET mes = CONCAT("Impossible d'ajouter la réponse n°", new.NUMR, " dans le questionnaire n°"
        , new.NUMQ, " car cette réponse est déjà associée à celui-ci");
        signal SQLSTATE '45000' set MESSAGE_TEXT = mes;
    END IF;
END |
DELIMITER ;