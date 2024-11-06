
mysqldump -u root dwwm_2401 > C:\Users\kevan\Documents\Dev\Sauvegarde\dwwm_2401.sql 

alter vgn_table  categorie       rename to categorie;       
alter vgn_table  lignemouvement  rename to lignemouvement;  
alter vgn_table  menu            rename to menu;           
alter vgn_table  message         rename to message;         
alter vgn_table  mouvement       rename to mouvement;       
alter vgn_table  produit         rename to produit;         
alter vgn_table  role            rename to role ;           
alter vgn_table  tiers           rename to tiers;          
alter vgn_table  typemouvement   rename to typemouvement;   
alter vgn_table  typetiers       rename to typetiers;       
alter vgn_table  user            rename to user; 


mysqldump -u root dwwm_2401 --tables vgn_categorie vgn_lignemouvement vgn_menu  vgn_message vgn_mouvement vgn_produit vgn_role  vgn_tiers  vgn_typemouvement vgn_typetiers vgn_user  >C:\Users\kevan\Documents\Dev\Sauvegarde\tables_dwwm_2024.sql 




create or replace view listeCommande as select c.id, numCommande, dateCommande, numClient, nomClient, adresseClient, sum(quantité*prixUnitaire) as montant 
from article a, commande c, client clt, ligneCommande l  where clt.id=c.client_id and c.id=l.commande_id and a.id=l.article_id
group by c.id, numCommande, dateCommande, numClient, nomClient, adresseClient
order by c.id desc;


create or replace view listeMouvement as select m.id, numMouvement, dateMouvement, numTiers, nomTiers, adresseTiers, sum(quantité*prixUnitaire) as montant 
from produit a, mouvement m, tiers t, ligneMouvement l  where t.id=m.tiers_id and m.id=l.mouvement_id and p.id=l.produit_id
group by m.id, numMouvement, dateMouvement, numTiers, nomTiers, adresseTiers
order by m.id desc;


 create table message (id int auto_increment primary key, auteur varchar (250),
  message text, reception timestamp default current_timestamp, lu boolean default false);

alter table message  add file varchar (250) default '';



create table role (id int auto_increment primary key,
code varchar(20), libelle varchar(250));

insert into role (code,libelle) values 
("ROLE ADMIN",'Administrateur de base de données'),
("ROLE_INFORMATIQUE",'Service Informatique'),
("ROLE_ASSISTANT",'Assistant de direction'),
("ROLE_APPRO",'Service Approvisionnement'),
("ROLE_VENTE",'Service Vente'),
("ROLE_USER",'Visiteur');

----------------create table user------------

create table user(id int auto_increment primary key,
  username varchar(100) unique not null, password varchar(250), 
 roles json);


 ------insertion des donnees dansla table user

insert into user (username,password,roles) VALUES
('marie', sha1('1234'),'["ROLE_VENTE","ROLE_USER"]'),
('paul', sha1('1234'),'["ROLE_APPRO","ROLE_USER"]'),
('roger', sha1('1234'),'["ROLE_ASSISTANT","ROLE_USER"]');


insert into categorie(prefixe,libelle) values
('BN','Bombe Nucleaire');


INSERT INTO typeTiers (numeroInitial,prefixe, libelle, format, )
VALUES ('1', 'Client standard', '%05d', );

---update
UPDATE categorie
SET format = '%05d'
WHERE prefixe = 'BN';


UPDATE typemouvement
SET format = '%05d';
WHERE prefixe = 'CLT';


create table menu (id int auto_increment primary key,
parent_id int,
libelle varchar(220),
url varchar(100),
role varchar(100),
icone varchar(100),
Foreign Key (parent_id) REFERENCES menu (id));



INSERT INTO vgn_menu (libelle, url, role, icone) VALUES
 ('Accueil', 'index.php', 'ROLE_USER', 'fa fa-home'),
 ('Produit', 'index.php?url=produit', 'ROLE_APPRO', 'fas fa-basket-shopping'),
 ('Tiers', 'index.php?url=tiers', 'ROLE_APPRO', ' fas fa-arrows-down-to-people'),
 ('Vente', 'index.php?url=vente', 'ROLE_VENTE', 'fab fa-shopify'),
 ('Appro', 'index.php?url=appro', 'ROLE_APPRO', ' fas fa-cart-arrow-down'),
 ('Mouvement', '	index.php?url=typemouvement', 'ROLE_INFORMATIQUE', 'fas fa-code-compare'),
 
 ('PortFolio', '', 'ROLE_ADMIN', 'fab fa-readme'),
 ('CV', '', 'ROLE_ADMIN', 'ffab fa-readme'),
 ('Parametre', '', 'ROLE_ADMIN', 'fab fa-whmcs');

 insert into vgn_menu (parent_id,libelle,url,role,icone) values 
(6,'Vente','index.php?url=vente','ROLE_INFORMATIQUE',' fab fa-shopify'),
(6,'Appro','index.php?url=appro','ROLE_INFORMATIQUE',' fas fa-cart-arrow-down'),
(6,'Interne','index.php?url=interne','ROLE_INFORMATIQUE','fas fa-cloud-arrow-down'),
(6,'Demarque','index.php?url=demarque','ROLE_INFORMATIQUE',' fas fa-hand-holding-dollar');

 insert into vgn_menu (parent_id,libelle,url,role,icone) values
(7,'Role','index.php?url=role','ROLE_ADMIN',' fas fa-children'),
(7,'User','index.php?url=security','ROLE_ADMIN','fas fa-arrows-down-to-people'),
(7,'Categorie','index.php?url=categorie','ROLE_ADMIN','fab fa-readme'),
(7,'Type Tiers','index.php?url=typetiers','ROLE_ADMIN','fab fa-readme'),
(7,'Type Mouvement','index.php?url=typemouvement','ROLE_ADMIN','fab fa-readme');


 +----+-----------+-----------+-----------------------+-------------------+------------+
| id | parent_id | libelle   | url                   | role              | icone      |
+----+-----------+-----------+-----------------------+-------------------+------------+
|  1 |      NULL | Accueil   | index.php             | ROLE_USER         | fa fa-home |
|  2 |      NULL | Produit   | index.php?url=produit | ROLE_APPRO        |            |
|  3 |      NULL | Tiers     | index.php?url=tiers   | ROLE_APPRO        |            |
|  4 |      NULL | Vente     | index.php?url=vente   | ROLE_VENTE        |            |
|  5 |      NULL | Appro     | index.php?url=appro   | ROLE_APPRO        |            |
|  6 |      NULL | Mouvement |                       | ROLE_INFORMATIQUE |            |
|  7 |      NULL | Parametre |                       | ROLE_ADMIN        |            |
+----+-----------+-----------+-----------------------+-------------------+------------+


----les sous-menus



+----+-----------+----------------+-------------------------+-------------------+------------+
| id | parent_id | libelle        | url                     | role              | icone      |
+----+-----------+----------------+-------------------------+-------------------+------------+
|  1 |      NULL | Accueil        | index.php               | ROLE_USER         | fa fa-home |
|  2 |      NULL | Produit        | index.php?url=produit   | ROLE_APPRO        |            |
|  3 |      NULL | Tiers          | index.php?url=tiers     | ROLE_APPRO        |            |
|  4 |      NULL | Vente          | index.php?url=vente     | ROLE_VENTE        |            |
|  5 |      NULL | Appro          | index.php?url=appro     | ROLE_APPRO        |            |
|  6 |      NULL | Mouvement      |                         | ROLE_INFORMATIQUE |            |
|  7 |      NULL | Parametre      |                         | ROLE_ADMIN        |            |
|  8 |         6 | Vente          | index.php?url=vente     | ROLE_INFORMATIQUE |            |
|  9 |         6 | Appro          | index.php?url=appro     | ROLE_INFORMATIQUE |            |
| 10 |         6 | Interne        | index.php?url=interne   | ROLE_INFORMATIQUE |            |
| 11 |         6 | Demarque       | index.php?url=demarque  | ROLE_INFORMATIQUE |            |
| 12 |         7 | Role           | index.php?url=role      | ROLE_ADMIN        |            |
| 13 |         7 | User           | index.php?url=security  | ROLE_ADMIN        |            |
| 14 |         7 | Categorie      | index.php?url=demarque  | ROLE_ADMIN        |            |
| 15 |         7 | Type Tiers     | index.php?url=typetiers | ROLE_ADMIN        |            |
| 16 |         7 | Type Mouvement | index.php?url=typetiers | ROLE_ADMIN        |            |
+----+-----------+----------------+-------------------------+-------------------+------------+



UPDATE menu
SET url = 'index.php?url=typemouvement'
WHERE libelle = 'Type Mouvement';

UPDATE menu
SET url = 'index.php?url=categorie'
WHERE libelle = 'Categorie';

INSERT INTO vgn_menu (libelle, url, role, icone) VALUES
 ('Produit', 'index.php?url=produit', 'ROLE_APPRO', 'fas fa-basket-shopping'),
 ('Tiers', 'index.php?url=tiers', 'ROLE_APPRO', ' fas fa-arrows-down-to-people'),
  ('PortFolio', '', 'ROLE_ADMIN', 'fab fa-readme');



