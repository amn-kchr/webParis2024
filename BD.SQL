CREATE TABLE Participant(
   identifiant_participant VARCHAR(10),
   nom_participant VARCHAR(30),
   prenom_participant VARCHAR(30),
   date_naissance_participant DATE,
   nationalite_participant VARCHAR(30),
   PRIMARY KEY(identifiant_participant)
);

CREATE TABLE Membre_CIO(
   id_membreCio VARCHAR(10),
   mot_de_passe_membreCio VARCHAR(32),
   identifiant_participant VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_membreCio),
   UNIQUE(mot_de_passe_membreCio),
   FOREIGN KEY(identifiant_participant) REFERENCES Participant(identifiant_participant) ON DELETE CASCADE
);

CREATE TABLE Personnel(
   id_personnel VARCHAR(10),
   role_personnel VARCHAR(30),
   identifiant_participant VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_personnel),
   FOREIGN KEY(identifiant_participant) REFERENCES Participant(identifiant_participant) ON DELETE CASCADE
);

CREATE TABLE Ville(
   identifient_ville VARCHAR(10),
   nom_ville VARCHAR(30),
   adresse_ville VARCHAR(30),
   PRIMARY KEY(identifient_ville)
);

CREATE TABLE Categorie(
   id_categorie VARCHAR(10),
   nom_categorie VARCHAR(30),
   genre_categorie VARCHAR(30),
   PRIMARY KEY(id_categorie)
);

CREATE TABLE Discipline(
   id_Discipline VARCHAR(10),
   nom_Discipline VARCHAR(30),
   record_Discipline INT,
   id_categorie VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_Discipline),
   FOREIGN KEY(id_categorie) REFERENCES Categorie(id_categorie) ON DELETE CASCADE
);

CREATE TABLE Entraineur(
   id_entraineur VARCHAR(10),
   diplome_entraineur VARCHAR(30),
   identifiant_participant VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_entraineur),
   FOREIGN KEY(identifiant_participant) REFERENCES Participant(identifiant_participant) ON DELETE CASCADE
);


CREATE TABLE Equipe(
   id_equipe VARCHAR(10),
   id_entraineur VARCHAR(10) NOT NULL,
   nom_equipe VARCHAR(30),
   PRIMARY KEY(id_equipe),
   FOREIGN KEY(id_entraineur) REFERENCES Entraineur(id_entraineur) ON DELETE CASCADE
);

CREATE TABLE Chambre(
   id_chambre VARCHAR(10),
   nom_chambre VARCHAR(30),
   nombre_lits INT,
   identifient_ville VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_chambre),
   FOREIGN KEY(identifient_ville) REFERENCES Ville(identifient_ville) ON DELETE CASCADE
);


CREATE TABLE Competition(
   id_competition VARCHAR(10),
   nom_competition VARCHAR(40),
   avancement_competition VARCHAR(20),
   id_Discipline VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_competition),
   FOREIGN KEY(id_Discipline) REFERENCES Discipline(id_Discipline) ON DELETE CASCADE
);

CREATE TABLE Athlete(
   id_athlete VARCHAR(10),
   poid_athlete FLOAT,
   taille_athlete INT,
   id_entraineur VARCHAR(10) NOT NULL,
   identifiant_participant VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_athlete),
   FOREIGN KEY(id_entraineur) REFERENCES Entraineur(id_entraineur) ON DELETE CASCADE,
   FOREIGN KEY(identifiant_participant) REFERENCES Participant(identifiant_participant) ON DELETE CASCADE
);

CREATE TABLE resultat(
   id_resultat VARCHAR(10),
   classement INT,
   score VARCHAR(30),
   id_athlete VARCHAR(10) NOT NULL,
   id_Discipline VARCHAR(10) NOT NULL,
   id_equipe VARCHAR(10) NOT NULL,
   PRIMARY KEY(id_resultat),
   FOREIGN KEY(id_athlete) REFERENCES Athlete(id_athlete) ON DELETE CASCADE,
   FOREIGN KEY(id_Discipline) REFERENCES Discipline(id_Discipline) ON DELETE CASCADE,
   FOREIGN KEY(id_equipe) REFERENCES Equipe(id_equipe) ON DELETE CASCADE
);

CREATE TABLE se_joue(
   id_competition VARCHAR(10),
   identifient_ville VARCHAR(10),
   date_heure DATE,
   PRIMARY KEY(id_competition, identifient_ville),
   FOREIGN KEY(id_competition) REFERENCES Competition(id_competition) ON DELETE CASCADE,
   FOREIGN KEY(identifient_ville) REFERENCES Ville(identifient_ville) ON DELETE CASCADE
);

CREATE TABLE rattache(
    id_personnel VARCHAR(10),
   identifient_ville VARCHAR(10),
   PRIMARY KEY(id_personnel, identifient_ville),
   FOREIGN KEY(id_personnel) REFERENCES Personnel(id_personnel) ON DELETE CASCADE,
   FOREIGN KEY(identifient_ville) REFERENCES Ville(identifient_ville) ON DELETE CASCADE
);

CREATE TABLE joue(
   id_athlete VARCHAR(10),
   id_equipe VARCHAR(10),
   remplace VARCHAR(50),
   PRIMARY KEY(id_athlete, id_equipe),
   FOREIGN KEY(id_athlete) REFERENCES Athlete(id_athlete) ON DELETE CASCADE,
   FOREIGN KEY(id_equipe) REFERENCES Equipe(id_equipe) ON DELETE CASCADE
);

CREATE TABLE inscrit(
   id_personnel VARCHAR(10),
   id_competition VARCHAR(10),
   id_equipe VARCHAR(10),
   PRIMARY KEY(id_personnel, id_competition, id_equipe),
   FOREIGN KEY(id_personnel) REFERENCES Personnel(id_personnel) ON DELETE CASCADE,
   FOREIGN KEY(id_competition) REFERENCES Competition(id_competition) ON DELETE CASCADE,
   FOREIGN KEY(id_equipe) REFERENCES Equipe(id_equipe) ON DELETE CASCADE
);

CREATE TABLE loger(
   identifiant_participant VARCHAR(10),
   id_chambre VARCHAR(10),
   date_debut DATE,
   date_fin DATE,
   PRIMARY KEY(identifiant_participant, id_chambre),
   FOREIGN KEY(identifiant_participant) REFERENCES Participant(identifiant_participant) ON DELETE CASCADE,
   FOREIGN KEY(id_chambre) REFERENCES Chambre(id_chambre) ON DELETE CASCADE
);

CREATE TABLE possede(
   id_Discipline VARCHAR(10),
   id_equipe VARCHAR(10),
   PRIMARY KEY(id_Discipline, id_equipe),
   FOREIGN KEY(id_Discipline) REFERENCES Discipline(id_Discipline) ON DELETE CASCADE,
   FOREIGN KEY(id_equipe) REFERENCES Equipe(id_equipe) ON DELETE CASCADE
);

CREATE TABLE palmares(
   id_athlete VARCHAR(10),
   id_Discipline VARCHAR(10),
   id_palmares VARCHAR(10),
   type_medaille VARCHAR(10),
   Lieu VARCHAR(30),
   performance FLOAT,
   date_palmares DATE,
   PRIMARY KEY(id_athlete, id_Discipline, id_palmares),
   FOREIGN KEY(id_athlete) REFERENCES Athlete(id_athlete) ON DELETE CASCADE,
   FOREIGN KEY(id_Discipline) REFERENCES Discipline(id_Discipline) ON DELETE CASCADE
);
CREATE TABLE arbitre(
   id_personnel VARCHAR(10),
   id_categorie VARCHAR(10),
   PRIMARY KEY(id_personnel, id_categorie),
   FOREIGN KEY(id_personnel) REFERENCES Personnel(id_personnel),
   FOREIGN KEY(id_categorie) REFERENCES Categorie(id_categorie)
);

CREATE TABLE pratique(
   id_athlete VARCHAR(10),
   id_Discipline VARCHAR(10),
   PRIMARY KEY(id_athlete, id_Discipline),
   FOREIGN KEY(id_athlete) REFERENCES Athlete(id_athlete),
   FOREIGN KEY(id_Discipline) REFERENCES Discipline(id_Discipline)
);

-- 1/INSERTION VILLE
INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V001', 'TIZIOUZOU', '213 5th HMEND');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V002', 'BEJAIA', '213 14th SEDOUK');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V003', 'New York', '789 5th Avenue');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V004', 'London', '10 Downing Street');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V005', 'Beijing', '888 Tiananmen Square');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V006', 'Moscow', '101 Red Square');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V007', 'Sydney', '222 Opera House Road');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V008', 'Rio de Janeiro', '333 Copacabana Beach');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V009', 'Cairo', '444 Pyramids Street');

INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
VALUES ('V010', 'Berlin', '555 Brandenburg Gate');

-- 2/INSERTION PARTICIPANT
-- Participant 1
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P001', 'Yefsah', 'Rayane', TO_DATE('2011/11/11', 'yyyy/mm/dd'), 'DZ');

-- Participant 2
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P002', 'Kechir', 'Amine', TO_DATE('2011/11/11', 'yyyy/mm/dd'), 'DZ');

-- Participant 3
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P003', 'Garcia', 'Maria', TO_DATE('2004/01/20', 'yyyy/mm/dd'), 'Spain');

-- Participant 4
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P004', 'Müller', 'Hans', TO_DATE('2000/11/03', 'yyyy/mm/dd'), 'Germany');

-- Participant 5
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P005', 'Kim', 'Ji-Hyun', TO_DATE('2001/09/25', 'yyyy/mm/dd'), 'South Korea');

-- Participant 6
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P006', 'Li', 'Wei', TO_DATE('1999/03/12', 'yyyy/mm/dd'), 'China');

-- Participant 7
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P007', 'Martinez', 'Juan', TO_DATE('2005/08/18', 'yyyy/mm/dd'), 'Argentina');

-- Participant 8
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P008', 'Dubois', 'Élise', TO_DATE('1998/12/30', 'yyyy/mm/dd'), 'France');

-- Participant 9
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P009', 'Yamamoto', 'Taro', TO_DATE('2002/04/05', 'yyyy/mm/dd'), 'Japan');

-- Participant 10
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P010', 'Kowalski', 'Anna', TO_DATE('2003/10/10', 'yyyy/mm/dd'), 'Poland');

-- Participant 11
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P011', 'Alves', 'Rafael', TO_DATE('2000/06/21', 'yyyy/mm/dd'), 'Brazil');

-- Participant 12
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P012', 'Santos', 'Isabella', TO_DATE('2001/12/17', 'yyyy/mm/dd'), 'Portugal');

-- Participant 13
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P013', 'Ivanov', 'Dmitri', TO_DATE('1999/02/28', 'yyyy/mm/dd'), 'Russia');

-- Participant 14
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P014', 'Gupta', 'Aarav', TO_DATE('2004/07/07', 'yyyy/mm/dd'), 'India');

-- Participant 15
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P015', 'Hernandez', 'Luis', TO_DATE('2003/05/14', 'yyyy/mm/dd'), 'Mexico');

-- Participant 16
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P016', 'Nguyen', 'Thi', TO_DATE('2000/11/30', 'yyyy/mm/dd'), 'Vietnam');

-- Participant 17
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P017', 'Lopez', 'Diego', TO_DATE('2002/09/03', 'yyyy/mm/dd'), 'Colombia');

-- Participant 18
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P018', 'Saito', 'Haruka', TO_DATE('2001/03/09', 'yyyy/mm/dd'), 'Japan');

-- Participant 19
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P019', 'Ferreira', 'Mariana', TO_DATE('2004/10/22', 'yyyy/mm/dd'), 'Brazil');

-- Participant 20
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P020', 'Smith', 'Michael', TO_DATE('1998/08/02', 'yyyy/mm/dd'), 'USA');

-- Participant 21
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P021', 'Chen', 'Yan', TO_DATE('2000/01/19', 'yyyy/mm/dd'), 'China');

-- Participant 22
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P022', 'Gomez', 'Carlos', TO_DATE('2003/04/27', 'yyyy/mm/dd'), 'Spain');

-- Participant 23
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P023', 'Sasaki', 'Ryota', TO_DATE('2001/06/08', 'yyyy/mm/dd'), 'Japan');

-- Participant 24
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P024', 'Bianchi', 'Giulia', TO_DATE('2004/09/12', 'yyyy/mm/dd'), 'Italy');

-- Participant 25
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P025', 'Popov', 'Alexei', TO_DATE('2003/02/23', 'yyyy/mm/dd'), 'Russia');

-- Participant 26
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P026', 'Park', 'Min-Ji', TO_DATE('2000/12/06', 'yyyy/mm/dd'), 'South Korea');

-- Participant 27
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P027', 'Martinez', 'Isabel', TO_DATE('2002/10/01', 'yyyy/mm/dd'), 'Mexico');

-- Participant 28
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P028', 'Silva', 'Lucas', TO_DATE('2001/04/14', 'yyyy/mm/dd'), 'Portugal');

-- Participant 29
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P029', 'Wang', 'Wei', TO_DATE('1999/11/17', 'yyyy/mm/dd'), 'China');

-- Participant 30
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P030', 'Ali', 'Mohammad', TO_DATE('2000/03/20', 'yyyy/mm/dd'), 'Pakistan');

-- Participant 31
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P031', 'Fujita', 'Yuki', TO_DATE('2002/08/15', 'yyyy/mm/dd'), 'Japan');

-- Participant 32
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P032', 'Gomez', 'Ana', TO_DATE('2003/01/25', 'yyyy/mm/dd'), 'Spain');

-- Participant 33
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P033', 'Kim', 'Seung-Ho', TO_DATE('2001/07/12', 'yyyy/mm/dd'), 'South Korea');

-- Participant 34
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P034', 'Silva', 'João', TO_DATE('2004/02/09', 'yyyy/mm/dd'), 'Portugal');

-- Participant 35
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P035', 'Wu', 'Yun', TO_DATE('1999/10/03', 'yyyy/mm/dd'), 'China');

--- Participant 36
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P036', 'Singh', 'Rajesh', TO_DATE('2000/05/18', 'yyyy/mm/dd'), 'India');

-- Participant 37
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P037', 'Gonzalez', 'Carlos', TO_DATE('2003/11/23', 'yyyy/mm/dd'), 'Jamaica');

-- Participant 38
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P038', 'Wong', 'Li', TO_DATE('2001/09/06', 'yyyy/mm/dd'), 'Jamaica');

-- Participant 39
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P039', 'Martinez', 'Sofia', TO_DATE('2004/04/01', 'yyyy/mm/dd'), 'Jamaica');

-- Participant 40
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P040', 'Müller', 'Anna', TO_DATE('2000/12/14', 'yyyy/mm/dd'), 'Germany');

-- Participant 41
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P041', 'Nguyen', 'Minh', TO_DATE('2003/08/27', 'yyyy/mm/dd'), 'Vietnam');

-- Participant 42
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P042', 'Santos', 'Luiz', TO_DATE('2001/02/10', 'yyyy/mm/dd'), 'Brazil');

-- Participant 43
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P043', 'Lee', 'Hye-Jin', TO_DATE('2004/03/05', 'yyyy/mm/dd'), 'South Korea');

-- Participant 44
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P044', 'Garcia', 'Diego', TO_DATE('1999/11/08', 'yyyy/mm/dd'), 'Spain');

-- Participant 45
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P045', 'Wang', 'Xin', TO_DATE('2002/07/20', 'yyyy/mm/dd'), 'China');

-- Participant 46
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P046', 'Kumar', 'Amit', TO_DATE('2000/09/13', 'yyyy/mm/dd'), 'India');

-- Participant 47
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P047', 'Gonzalez', 'Isabella', TO_DATE('2001/01/28', 'yyyy/mm/dd'), 'Spain');

-- Participant 48
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P048', 'Chen', 'Cheng', TO_DATE('2003/06/30', 'yyyy/mm/dd'), 'China');

-- Participant 49
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P049', 'Rodriguez', 'Lucia', TO_DATE('2004/04/09', 'yyyy/mm/dd'), 'Argentina');

-- Participant 50
INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant)
VALUES ('P050', 'Schmidt', 'Julia', TO_DATE('1999/12/22', 'yyyy/mm/dd'), 'Germany');

-- 3/INSERTION ENTRAINEUR
--'1'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur, identifiant_participant)
VALUES ('Ent001', 'Diploma_A','P020');

--'2'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur, identifiant_participant)
VALUES ('Ent002', 'Diploma_B','P021');

--'3'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur, identifiant_participant)
VALUES ('Ent003', 'Diploma_C','P022');

--'4'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur, identifiant_participant)
VALUES ('Ent004', 'Diploma_D','P023');

--'5'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent005', 'Diploma_E','P024');

--'6'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent006', 'Diploma_F','P025');

--'7'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent007', 'Diploma_G','P026');

--'8'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent008', 'Diploma_H','P027');

--'9'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent009', 'Diploma_I','P028');

--'10'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent010', 'Diploma_J','P029');

--'11'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent011', 'Diploma_K','P030');

--'12'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent012', 'Diploma_L','P031');

--'13'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent013', 'Diploma_M','P032');

--'14'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent014', 'Diploma_N','P033');

--'15'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent015', 'Diploma_O','P034');

--'16'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent016', 'Diploma_P','P035');

--'17'
INSERT INTO Entraineur (id_entraineur, diplome_entraineur,  identifiant_participant)
VALUES ('Ent017', 'Diploma_Q','P036');

-- 4/INSERTION EQUIPE
-- Insertion de 6 équipes
INSERT INTO Equipe (id_equipe,id_entraineur, nom_equipe) VALUES ('E001','Ent001', 'Team Alpha');
INSERT INTO Equipe (id_equipe,id_entraineur, nom_equipe) VALUES ('E002','Ent002', 'Team Bravo');
INSERT INTO Equipe (id_equipe,id_entraineur, nom_equipe) VALUES ('E003','Ent003', 'Team Charlie');
INSERT INTO Equipe (id_equipe,id_entraineur, nom_equipe) VALUES ('E004','Ent004', 'Team Delta');
INSERT INTO Equipe (id_equipe,id_entraineur, nom_equipe) VALUES ('E005','Ent005', 'Team Echo');
INSERT INTO Equipe (id_equipe,id_entraineur, nom_equipe) VALUES ('E006','Ent006', 'Team Foxtrot');

-- 5/INSERTION CHAMBRE
-- 20 Insertions pour Chambre
INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C001', 'Suite Deluxe', 1, 'V001');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits,identifient_ville)
VALUES ('C002', 'Standard Twin', 2, 'V002');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C003', 'Ocean View', 1, 'V003');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C004', 'King Suite', 1, 'V004');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C005', 'Executive Room', 2, 'V005');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits,identifient_ville)
VALUES ('C006', 'Penthouse', 1, 'V006');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C007', 'Family Suite', 3, 'V007');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C008', 'Luxury Villa', 2, 'V008');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C009', 'Economy Room', 1,'V009');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits,identifient_ville)
VALUES ('C010', 'Budget Twin', 2, 'V010');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits,identifient_ville)
VALUES ('C011', 'Suite Deluxe', 1,'V001');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits,identifient_ville)
VALUES ('C012', 'Standard Twin', 2, 'V002');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C013', 'Ocean View', 1, 'V003');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C014', 'King Suite', 1, 'V004');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C015', 'Executive Room', 2, 'V005');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C016', 'Penthouse', 1, 'V006');

INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
VALUES ('C017', 'Family Suite', 3, 'V007');

-- /6INSERTION CATEGORIE
-- Inserts pour Categorie
INSERT INTO Categorie (id_categorie, nom_categorie, genre_categorie)
VALUES ('CAT001', 'Sprint', 'Hommes');

INSERT INTO Categorie (id_categorie, nom_categorie, genre_categorie)
VALUES ('CAT002', 'Natation', 'Femmes');

-- 7/INSERTION DISIPLINE
-- Inserts for Discipline
INSERT INTO Discipline (id_Discipline, nom_Discipline, record_Discipline, id_categorie)
VALUES ('DIS001', '100m freestyle', 47, 'CAT002');

INSERT INTO Discipline (id_Discipline, nom_Discipline, record_Discipline, id_categorie)
VALUES ('DIS002', '200m butterfly', 119, 'CAT002');

INSERT INTO Discipline (id_Discipline, nom_Discipline, record_Discipline, id_categorie)
VALUES ('DIS003', '100m sprint', 9, 'CAT001');

INSERT INTO Discipline (id_Discipline, nom_Discipline, record_Discipline, id_categorie)
VALUES ('DIS004', '200m sprint', 19, 'CAT001');

-- 8/INSERTION ATHLETE
-- 1
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath001', 70.5, 180, 'Ent007', 'P037');

-- 2
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath002', 65.2, 175, 'Ent008', 'P038');

-- 3
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath003', 55.8, 160, 'Ent009', 'P039');

-- 4
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath004', 68.9, 178, 'Ent010', 'P040');

-- 5
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath005', 63.4, 172, 'Ent011', 'P041');

-- 6
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath006', 72.1, 182, 'Ent012', 'P042');

-- 7
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath007', 59.6, 165, 'Ent013', 'P043');

-- 8
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath008', 78.3, 185, 'Ent014', 'P044');

-- 9
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath009', 61.8, 170, 'Ent015', 'P045');

-- 10
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath010', 75.5, 180, 'Ent016', 'P046');

-- 11
INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
VALUES ('Ath011', 58.2, 168, 'Ent017', 'P047');

-- 9/INSERTION PALMARES
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath004', 'DIS001', 'Palm004', 'Gold', 'Location4', 48.3, TO_DATE('2024-03-04','yyyy/mm/dd'));
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath005', 'DIS002', 'Palm005', 'Silver', 'Location5', 121.2, TO_DATE('2024-03-05','yyyy/mm/dd'));
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath006', 'DIS003', 'Palm006', 'Bronze', 'Location6', 9.8, TO_DATE('2024-03-06','yyyy/mm/dd'));
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath007', 'DIS001', 'Palm007', 'Gold', 'Location7', 47.9, TO_DATE('2024-03-07','yyyy/mm/dd'));
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath008', 'DIS002', 'Palm008', 'Silver', 'Location8', 120.9, TO_DATE('2024-03-08','yyyy/mm/dd'));
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath009', 'DIS003', 'Palm009', 'Bronze', 'Location9', 9.4, TO_DATE('2024-03-09','yyyy/mm/dd'));
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath010', 'DIS001', 'Palm010', 'Gold', 'Location10', 47.5, TO_DATE('2024-03-10','yyyy/mm/dd'));
INSERT INTO palmares (id_athlete, id_discipline, id_palmares, type_medaille, Lieu, performance, date_palmares) VALUES ('Ath011', 'DIS002', 'Palm011', 'Silver', 'Location11', 119.8, TO_DATE('2024-03-11','yyyy/mm/dd'));

-- 10/INSERTION MEMBRE_CIO
INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M001', 'password1', 'P002');

INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M002', 'password2', 'P003');

INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M003', 'password3', 'P004');

INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M004', 'password4', 'P005');

INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M005', 'password5', 'P006');

INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M006', 'password6', 'P007');

INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M007', 'password7', 'P008');

INSERT INTO Membre_CIO (id_membreCio, mot_de_passe_membreCio, identifiant_participant)
VALUES ('M008', 'password8', 'P009');

-- 11/INSERTION PERSONNEL
INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per001', 'arbitre', 'P010');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per002', 'arbitre', 'P011');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per003', 'Role_C', 'P012');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per004', 'Role_D', 'P013');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per005', 'Role_E', 'P014');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per006', 'Role_F', 'P015');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per007', 'Role_G', 'P016');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per008', 'Role_H', 'P017');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per009', 'Role_I', 'P018');

INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
VALUES ('Per010', 'Role_J', 'P019');

-- 12/INSERTION ARBITRE
INSERT INTO arbitre (id_personnel, id_categorie) VALUES ('Per001', 'CAT001');
INSERT INTO arbitre (id_personnel, id_categorie) VALUES ('Per001', 'CAT002');
INSERT INTO arbitre (id_personnel, id_categorie) VALUES ('Per002', 'CAT001');
INSERT INTO arbitre (id_personnel, id_categorie) VALUES ('Per002', 'CAT002');

-- 13/INSERTION COMPETITION
-- Insertions pour la compétition de Sprint (Hommes)
INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_discipline)
VALUES ('COMP001', 'Coupe du Monde de Sprint', 'Quart', 'DIS004');

INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_discipline)
VALUES ('COMP002', 'Coupe du Monde de Sprint', 'Finale', 'DIS003');

INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_discipline)
VALUES ('COMP003', 'Coupe du Monde de Sprint', 'Demie', 'DIS003');

-- Insertions pour la compétition de Natation (Femmes)
INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_discipline)
VALUES ('COMP004', 'Coupe du Monde de Natation', 'Quart', 'DIS002');

INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_discipline)
VALUES ('COMP005', 'Coupe du Monde de Natation', 'Finale', 'DIS001');

INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_discipline)
VALUES ('COMP006', 'Coupe du Monde de Natation', 'Groupe', 'DIS002');

INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_discipline)
VALUES ('COMP007', 'Coupe du Monde de Natation', 'Demie', 'DIS001');

-- 14/INSERTION SE_JOUE
--Insertions for se_joue table
INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
VALUES ('COMP001', 'V008', TO_DATE('2024/07/10', 'yyyy/mm/dd'));

INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
VALUES ('COMP002', 'V009', TO_DATE('2024/07/25', 'yyyy/mm/dd'));

INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
VALUES ('COMP003', 'V003', TO_DATE('2024/07/20', 'yyyy/mm/dd'));

INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
VALUES ('COMP004', 'V004',TO_DATE('2024/07/25', 'yyyy/mm/dd'));

INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
VALUES ('COMP005', 'V005', TO_DATE('2024/08/05', 'yyyy/mm/dd'));

INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
VALUES ('COMP006', 'V006', TO_DATE('2024/08/10', 'yyyy/mm/dd'));

INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
VALUES ('COMP007', 'V007', TO_DATE('2024/08/22', 'yyyy/mm/dd'));

-- 15/INSERTION RATTACHE
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per001', 'V001');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per002', 'V002');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per003', 'V003');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per004', 'V004');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per005', 'V005');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per006', 'V006');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per007', 'V007');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per008', 'V008');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per009', 'V009');
INSERT INTO rattache (id_personnel, identifient_ville) VALUES ('Per010', 'V010');

-- 16/INSERTION JOUE
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath001', 'E001', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath002', 'E001', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath003', 'E002', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath004', 'E002', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath005', 'E003', 'Yes');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath006', 'E003', 'Yes');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath007', 'E004', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath008', 'E004', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath009', 'E005', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath010', 'E005', 'None');
INSERT INTO joue (id_athlete, id_equipe, remplace) VALUES ('Ath011', 'E006', 'None');

-- 17/INSERTION INSCRIT
INSERT INTO inscrit (id_personnel, id_competition, id_equipe) VALUES ('Per001', 'COMP001', 'E001');
INSERT INTO inscrit (id_personnel, id_competition, id_equipe) VALUES ('Per002', 'COMP002', 'E002');
INSERT INTO inscrit (id_personnel, id_competition, id_equipe) VALUES ('Per003', 'COMP003', 'E003');
INSERT INTO inscrit (id_personnel, id_competition, id_equipe) VALUES ('Per004', 'COMP004', 'E004');
INSERT INTO inscrit (id_personnel, id_competition, id_equipe) VALUES ('Per005', 'COMP005', 'E005');
INSERT INTO inscrit (id_personnel, id_competition, id_equipe) VALUES ('Per006', 'COMP006', 'E006');
INSERT INTO inscrit (id_personnel, id_competition, id_equipe) VALUES ('Per007', 'COMP007', 'E006');

-- 18/INSERTION LOGER
INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin) 
VALUES ('P002', 'C001', TO_DATE('2024/07/05','yyyy/mm/dd'),TO_DATE('2024/07/15','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P003', 'C002', TO_DATE('2024/07/10','yyyy/mm/dd'), TO_DATE('2024/07/20','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P004', 'C003', TO_DATE('2024/07/15','yyyy/mm/dd'), TO_DATE('2024/07/25','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P005', 'C004', TO_DATE('2024/07/20','yyyy/mm/dd'), TO_DATE('2024/07/30','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P006', 'C005', TO_DATE('2024/07/25','yyyy/mm/dd'), TO_DATE('2024/08/04','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P007', 'C006', TO_DATE('2024/07/30','yyyy/mm/dd'), TO_DATE('2024/08/09','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P008', 'C007', TO_DATE('2024/08/01','yyyy/mm/dd'), TO_DATE('2024/08/11','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P009', 'C008', TO_DATE('2024/08/05','yyyy/mm/dd'), TO_DATE('2024/08/15','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P010', 'C009', TO_DATE('2024/08/10','yyyy/mm/dd'), TO_DATE('2024/08/20','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P011', 'C010', TO_DATE('2024/08/15','yyyy/mm/dd'), TO_DATE('2024/08/25','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P012', 'C011', TO_DATE('2024/07/05','yyyy/mm/dd'), TO_DATE('2024/07/15','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P013', 'C012', TO_DATE('2024/07/10','yyyy/mm/dd'), TO_DATE('2024/07/20','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P014', 'C013', TO_DATE('2024/07/15','yyyy/mm/dd'), TO_DATE('2024/07/25','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P015', 'C014', TO_DATE('2024/07/20','yyyy/mm/dd'), TO_DATE('2024/07/30','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P016', 'C015', TO_DATE('2024/07/25','yyyy/mm/dd'), TO_DATE('2024/08/04','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P017', 'C016', TO_DATE('2024/07/30','yyyy/mm/dd'), TO_DATE('2024/08/09','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P018', 'C017', TO_DATE('2024/08/01','yyyy/mm/dd'), TO_DATE('2024/08/11','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P019', 'C012', TO_DATE('2024/08/05','yyyy/mm/dd'), TO_DATE('2024/08/15','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P020', 'C013', TO_DATE('2024/08/10','yyyy/mm/dd'), TO_DATE('2024/08/20','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P021', 'C014', TO_DATE('2024/08/15','yyyy/mm/dd'), TO_DATE('2024/08/25','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P022', 'C001', TO_DATE('2024/08/20','yyyy/mm/dd'), TO_DATE('2024/08/30','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P023', 'C002', TO_DATE('2024/07/05','yyyy/mm/dd'), TO_DATE('2024/07/15','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P024', 'C003', TO_DATE('2024/07/10','yyyy/mm/dd'), TO_DATE('2024/07/20','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P025', 'C004', TO_DATE('2024/07/15','yyyy/mm/dd'), TO_DATE('2024/07/25','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P026', 'C005', TO_DATE('2024/07/20','yyyy/mm/dd'), TO_DATE('2024/07/30','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P027', 'C006', TO_DATE('2024/07/25','yyyy/mm/dd'), TO_DATE('2024/08/04','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P028', 'C007', TO_DATE('2024/07/30','yyyy/mm/dd'), TO_DATE('2024/08/09','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P029', 'C008', TO_DATE('2024/08/01','yyyy/mm/dd'), TO_DATE('2024/08/11','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P030', 'C009', TO_DATE('2024/08/05','yyyy/mm/dd'), TO_DATE('2024/08/15','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P031', 'C015', TO_DATE('2024/08/10','yyyy/mm/dd'), TO_DATE('2024/08/20','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P032', 'C011', TO_DATE('2024/08/15','yyyy/mm/dd'), TO_DATE('2024/08/25','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P033', 'C012', TO_DATE('2024/08/20','yyyy/mm/dd'), TO_DATE('2024/08/30','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P034', 'C013', TO_DATE('2024/08/01','yyyy/mm/dd'), TO_DATE('2024/08/11','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P035', 'C014', TO_DATE('2024/08/05','yyyy/mm/dd'), TO_DATE('2024/08/15','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P036', 'C015', TO_DATE('2024/08/10','yyyy/mm/dd'), TO_DATE('2024/08/20','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P037', 'C016', TO_DATE('2024/08/15','yyyy/mm/dd'), TO_DATE('2024/08/25','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P038', 'C017', TO_DATE('2024/08/20','yyyy/mm/dd'), TO_DATE('2024/08/30','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P039', 'C008', TO_DATE('2024/08/01','yyyy/mm/dd'), TO_DATE('2024/08/11','yyyy/mm/dd'));

INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
VALUES ('P040', 'C009', TO_DATE('2024/08/05','yyyy/mm/dd'), TO_DATE('2024/08/15','yyyy/mm/dd'));

-- 19/INSERTION POSSEDE
INSERT INTO possede (id_discipline, id_equipe) VALUES ('DIS001', 'E001');
INSERT INTO possede (id_discipline, id_equipe) VALUES ('DIS002', 'E002');
INSERT INTO possede (id_discipline, id_equipe) VALUES ('DIS001', 'E003');
INSERT INTO possede (id_discipline, id_equipe) VALUES ('DIS002', 'E004');
INSERT INTO possede (id_discipline, id_equipe) VALUES ('DIS003', 'E005');
INSERT INTO possede (id_discipline, id_equipe) VALUES ('DIS004', 'E006');

-- 20/INSERTION PRATIQUE
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath001', 'DIS001');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath002', 'DIS002');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath003', 'DIS003');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath004', 'DIS001');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath005', 'DIS002');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath006', 'DIS003');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath007', 'DIS001');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath008', 'DIS002');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath009', 'DIS003');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath010', 'DIS004');
INSERT INTO pratique (id_athlete, id_discipline) VALUES ('Ath011', 'DIS004');

-- 21/INSERTION RESULTAT
INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES001', 1, '1:30.25', 'Ath001', 'DIS001', 'E001');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES002', 2, '1:32.10', 'Ath002', 'DIS001', 'E002');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES003', 3, '1:33.45', 'Ath003', 'DIS001', 'E003');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES004', 1, '2:10.75', 'Ath004', 'DIS002', 'E001');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES005', 2, '2:12.30', 'Ath005', 'DIS002', 'E002');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES006', 3, '2:13.55', 'Ath006', 'DIS002', 'E003');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES007', 1, '9.85', 'Ath001', 'DIS003', 'E001');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES008', 2, '9.95', 'Ath003', 'DIS003', 'E002');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES009', 3, '10.10', 'Ath004', 'DIS003', 'E003');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES010', 1, '20.50', 'Ath002', 'DIS004', 'E001');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES011', 2, '20.75', 'Ath005', 'DIS004', 'E002');

INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_discipline, id_equipe)
VALUES ('RES012', 3, '20.90', 'Ath006', 'DIS004', 'E003');
