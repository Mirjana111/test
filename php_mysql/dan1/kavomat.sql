DROP DATABASE IF EXISTS kavomat;
 
CREATE DATABASE IF NOT EXISTS kavomat DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 
USE kavomat;
 
CREATE TABLE IF NOT EXISTS kavomati (
    id int unsigned NOT NULL AUTO_INCREMENT,
    naziv varchar(50) NOT NULL,
    lokacija_id int unsigned NOT NULL,
    kreiran TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    azuriran TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    INDEX (id_lokacija)
) ENGINE=InnoDB;
 
CREATE TABLE IF NOT EXISTS lokacije (
    id int unsigned NOT NULL AUTO_INCREMENT,
    ulica varchar(100) NOT NULL,
    kc_broj varchar(10) NOT NULL,
    mjesto varchar(100) NOT NULL,
    kreiran TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    azuriran TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
)ENGINE=InnoDB;
 
CREATE TABLE IF NOT EXISTS kave (
    id int unsigned NOT NULL AUTO_INCREMENT,
    naziv varchar(100) NOT NULL,
    cijena float(4,2) NOT NULL,
    kreiran TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    azuriran TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
)ENGINE=InnoDB;
 
CREATE TABLE IF NOT EXISTS kave_u_kavomatima (
    kavomat_id int unsigned NOT NULL,
    kava_id int unsigned NOT NULL,
    INDEX (id_kavomat),
    INDEX (id_kava)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS korisnici (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  ime varchar(255) NOT NULL,
  prezime varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  lozinka varchar(60) NOT NULL,
  token varchar(100) DEFAULT NULL,
  kreiran TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  azuriran TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE (email)
) ENGINE=InnoDB;

-- Ubacivanje podataka u tablicu lokacija
INSERT INTO lokacije (ulica,kc_broj,mjesto) VALUES
('Maksimirska','78','Zagreb'),
('Ilica','156a','Zagreb'),
('Vukovarska','96','Rijeka'),
('Domobranska','24','Split');

-- Ubacivanje podataka u tablicu kavomat
INSERT INTO kavomati (naziv,lokacija_id) VALUES
('Astra',1),
('Canto',2),
('Kikko',3),
('Opera',4);

-- Ubacivanje podataka u tablicu kava
INSERT INTO kave (naziv,cijena) VALUES
('espresso',2.50),
('cappuccino',4),
('macchiato',3.50),
('mocaccino',4),
('nescafe',5);

-- Ubacivanje podataka u tablicu kave_u_kavomatima
INSERT INTO kave_u_kavomatima (kavomat_id,kava_id) VALUES
(1,1),
(1,2),
(1,3),
(1,5),
(2,2),
(2,3),
(2,4),
(3,1),
(3,3),
(3,5),
(4,1),
(4,2),
(4,3),
(4,4),
(4,5);

-- Ubacivanje podataka u tablicu korisnici
INSERT INTO korisnici (ime, prezime, email, lozinka, token) VALUES
('Pero', 'Perić', 'pero@info.com', '$2y$10$AgennQGk/AtoDtqQkNL8dOXz7xhHYXBbEJuy/JRRTJ3fuLFh1NFbi', NULL);

ALTER TABLE kavomati ADD CONSTRAINT fk_lokacija FOREIGN KEY (lokacija_id) REFERENCES lokacije (id) ON UPDATE CASCADE;
 
ALTER TABLE kave_u_kavomatima   
    ADD CONSTRAINT fk_kavomat FOREIGN KEY (kavomat_id) REFERENCES kavomati (id) ON UPDATE CASCADE,
    ADD CONSTRAINT fk_kava FOREIGN KEY (kava_id) REFERENCES kave (id) ON UPDATE CASCADE;





