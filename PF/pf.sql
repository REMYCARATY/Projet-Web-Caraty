CREATE DATABASE pf; 
USE pf; 
CREATE TABLE utilisateur (
	id_utilisateur serial PRIMARY KEY, 
	prenom varchar(50) UNIQUE, 
	mdp varchar(200) UNIQUE
);

CREATE TABLE competence (
	id_competence serial PRIMARY KEY, 
	libelle varchar(50) UNIQUE, 
	logo varchar(250)
);

CREATE TABLE competence_utilisateur(
	id_utilisateur int, 
	id_competence int, 
	niveau int,
	PRIMARY KEY (id_utilisateur, id_competence)
);

INSERT INTO utilisateur(prenom,mdp) VALUES('Rémy19','mdp hash'); 


INSERT INTO competence(libelle, logo) VALUES('PHP', 'logo/php.png'); 
INSERT INTO competence(libelle, logo) VALUES('JavaScript', 'logo/js.png'); 
INSERT INTO competence(libelle, logo) VALUES('HTML5 - CSS3', 'logo/html-css.png'); 
INSERT INTO competence(libelle, logo) VALUES('python', 'logo/python.png'); 


INSERT INTO competence_utilisateur VALUES(0, 0, 0); 


