CREATE DATABASE db_construction;
Use db_construction;


CREATE TABLE imports(
    id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    dateNaissance date,
    matiere VARCHAR(30),
    coefficient INT(30),
    note Double precision
);
alter table imports modify column note Double precision
CREATE TABLE etudiants(
    id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    dateNaissance date

);

CREATE TABLE matieres(
    id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(30),
    coefficient INT(30)
);
CREATE TABLE notes(
    id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    notes Double precision,
    matieres INT(10),
    etu INT(10),
    FOREIGN KEY (etu) REFERENCES etudiants(id),
    FOREIGN KEY (matieres) REFERENCES matieres(id)
);

INSERT INTO etudiants (nom,prenom,dateNaissance)
select DISTINCT nom,prenom,dateNaissance from imports 

INSERT INTO matieres (nom,coefficient)
select DISTINCT matiere,coefficient from imports

INSERT INTO notes (notes,matieres,etu)
SELECT ip.note as notes,m.id as matieres,e.id as etu
    FROM imports ip
    JOIN etudiants e ON e.nom = ip.nom
    JOIN etudiants et ON et.prenom = ip.prenom
    JOIN matieres m ON m.nom = ip.matiere

CREATE  or Replace VIEW v_note_etus AS (
select e.id as id,e.nom as Nom,e.prenom as prenom, m.id as Id_matieres,m.nom as Matieres ,n.notes as notes, m.coefficient as coeff
from notes n
 JOIN matieres m ON m.id = n.matieres
JOIN etudiants e ON e.id = n.etu
);

select * from v_note_etus
select * from v_note_etus

CREATE  or Replace VIEW v_moyenne AS (
select sum(notes*coeff)/sum(coeff)as NotesCoeff
from v_note_etus group by id
);

where id='64' 

group by notes
select * from v_routes
WHERE LOWER(deb_ville) LIKE LOWER('%B%') 
or LOWER(fin_ville) LIKE LOWER('%B%');

select * from `v_routes` where LOWER(deb_ville)like LOWER('%to%') or LOWER(fin_ville)like LOWER('%to%') and `distance` >= 1 and `distance` <= 20000