CREATE DATABASE db_composer_route;
\c db_composer_route ;

CREATE TABLE ville(
    id INT(10),
    nom VARCHAR(30)
);

CREATE TABLE etats(
    id INT(10),
    descri VARCHAR(30)
);

INSERT INTO ville(id,Nom) VALUES (1,"Antananarivo");
