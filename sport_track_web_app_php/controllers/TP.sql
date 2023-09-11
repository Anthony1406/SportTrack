--Auto incrementation de numAgence de la table Agence
DROP SEQUENCE seq_Agence ;
CREATE SEQUENCE seq_Agence ;
CREATE OR REPLACE TRIGGER trig_seq_Agence
BEFORE INSERT ON Agence
FOR EACH ROW
WHEN (NEW.numAgence IS NULL)
BEGIN
SELECT seq_Agence.NEXTVAL INTO :NEW.numAgence
FROM DUAL;
END;
/
--Auto incrementation de numAgent de la table Agence
DROP SEQUENCE seq_Agent ;
CREATE SEQUENCE seq_Agent ;
CREATE OR REPLACE TRIGGER trig_seq_Agent
BEFORE INSERT ON Agent
FOR EACH ROW
WHEN (NEW.numAgent IS NULL)
BEGIN
SELECT seq_Agent.NEXTVAL INTO :NEW.numAgent
FROM DUAL;
END;
/
--Auto incrementation de numClient de la table Client
DROP SEQUENCE seq_Client ;
CREATE SEQUENCE seq_Client ;
CREATE OR REPLACE TRIGGER trig_seq_Client
BEFORE INSERT ON Client
FOR EACH ROW
WHEN (NEW. numClient IS NULL)
BEGIN
SELECT seq_Client .NEXTVAL INTO :NEW. numClient
FROM DUAL;
END;
/
--Auto incrementation de numCompte de la table Compte
DROP SEQUENCE seq_Compte ;
CREATE SEQUENCE seq_Compte ;
CREATE OR REPLACE TRIGGER trig_seq_Compte
BEFORE INSERT ON Compte
FOR EACH ROW
WHEN (NEW. numCompte IS NULL)
BEGIN
SELECT seq_Compte .NEXTVAL INTO :NEW. numCompte
FROM DUAL;
END;
/
--Auto incrementation de numOperation de la table Operation
DROP SEQUENCE seq_Operation ;
CREATE SEQUENCE seq_Operation ;
CREATE OR REPLACE TRIGGER trig_seq_Operation
BEFORE INSERT ON Operation
FOR EACH ROW
WHEN (NEW. numOperation IS NULL)
BEGIN
SELECT seq_Operation .NEXTVAL INTO :NEW. numOperation
FROM DUAL;
END;
/

--Sans toucher au script de création de tables, modifier la structure des tables Agent et Agence en conséquence.
ALTER TABLE Agent
DROP estDirecteur;

ALTER TABLE Agence
ADD directeur NUMBER(0,4)
    CONSTRAINT fk_directeur REFERENCES Agent(numAgent);
