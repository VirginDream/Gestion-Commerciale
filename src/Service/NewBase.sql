create database dwwm_2401;

create table mouvement(id int primary key auto_increment,
numMouvement varchar(20) unique not null,
dateMouvement datetime,
typeMouvement_id  int,
foreign key(typeMouvement_id) references typeMouvement(id),
tiers_id  int not null,
foreign key(tiers_id) references tiers(id));



create table tiers (id int primary key auto_increment,
numTiers varchar(20) not null unique,
nomTiers varchar(250) ,
adresseTiers varchar(250),
typeTiers_id  int,
foreign key(typeTiers_id) references typeTiers(id));


create table ligneMouvement(id int auto_increment primary key,
mouvement_id int not null,
foreign key(mouvement_id) references mouvement(id),
produit_id int not null,
foreign key(produit_id) references produit(id),
quantite decimal(10,2) default 1,
prixUnitaire decimal(10,2));


create table produit(id int primary key auto_increment,
numProduit varchar(20) unique not null,
designation varchar(250),
prixUnitaire decimal(10,2),
prixRevient decimal(10,2),
categorie_id int ,
foreign key(categorie_id) references categorie(id));


create table typeTiers(id int auto_increment primary key,
prefixe varchar(20),
libelle varchar(250),
format varchar(20),
numeroInitial integer default 1);

create table typeMouvement(id int auto_increment primary key,
prefixe varchar(20),
libelle varchar(250),
format varchar(20),
numeroInitial integer default 1);


create table categorie (id integer auto_increment primary key,
prefixe varchar(10),
libelle varchar(250),
format varchar(20),
numeroInitial integer default 1);



----insertion donnnées categ----

insert into categorie (prefixe,libelle) values
("BA" ,"Boisson alcoolique"),
("BB","Boisson biere"),
("BJ", "Boisson Jus"),
("BC","Boisson champagne"),
("BV","Boisson vin"),
("XA","Alimentation"),
("EG","Electromenager"),
("EL","Electricite");

-------insérer la colonne categorie_id à la table produit

alter table produit add categorie_id integer;
alter table produit add foreign key(categorie_id) references categorie(id);
update produit set categorie_id=(select id from categorie 
where left(produit.numProduit,2)=trim(categorie.prefixe));


-----insert libelle-------------

alter table categorie add column libelle varchar(250);
alter table typeTiers add column libelle varchar(250);
alter table typeMouvement add column libelle varchar(250);

alter table categorie add column format varchar(20);
alter table typeTiers add column format varchar(20);
alter table typeMouvement add column format varchar(20);


insert into typeTiers (prefixe,libelle) values
("CLT" ,"Client"),
("FRN","Fournisseur");


insert into file format 
