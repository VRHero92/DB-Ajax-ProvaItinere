create database pizzuto_luigi;
use pizzuto_luigi;

create table CLIENTE(
	CODICE varchar(20) PRIMARY KEY,
	CITTA VARCHAR(20),
	INDIRIZZO VARCHAR(30),
	TELEFONO VARCHAR(10),
	N_SITI INTEGER,
	SPESA_TOTALE INTEGER
)Engine='InnoDB';

create table SVILUPPATORE(
	PIVA VARCHAR(10) PRIMARY KEY,
    NOME VARCHAR(15),
    COGNOME VARCHAR(15),
    TELEFONO VARCHAR(15)
)Engine='InnoDB';

create table LAYOUT(
	ID INTEGER auto_increment PRIMARY KEY,
	NOME VARCHAR(50),
    COSTO_TOTALE INTEGER,
    SVILUPPATOREREF VARCHAR(10),
    INDEX new_sviluppatoreref (SVILUPPATOREREF),
    FOREIGN KEY (SVILUPPATOREREF) REFERENCES SVILUPPATORE(PIVA)
)Engine='InnoDB';


create table SITO_WEB(
	CODICE INTEGER auto_increment PRIMARY KEY,
    URL VARCHAR(50),
    DATA_PUBBLICAZIONE date,
    CLIENTE varchar(20),
    LAYOUTREF INTEGER,
    INDEX new_cliente(CLIENTE),
    INDEX new_layoutref(LAYOUTREF),
    FOREIGN KEY (CLIENTE) REFERENCES CLIENTE(CODICE),
    FOREIGN KEY (LAYOUTREF) REFERENCES LAYOUT(ID)
)Engine='InnoDB';


create table VISITATORE(
	IP VARCHAR(15),
    DATA DATE,
    PRIMARY KEY (IP,DATA)
)Engine='InnoDB';

create table VISITA(
	IP VARCHAR(15),
    DATA DATE,
    SITO INTEGER,
    INDEX new_sito1(SITO),
	INDEX new_visitatore(IP,data),
    FOREIGN KEY (SITO) REFERENCES SITO_WEB(CODICE),
    FOREIGN KEY (IP,DATA) REFERENCES VISITATORE(IP,DATA),
    PRIMARY KEY(IP,DATA,SITO)
)Engine='InnoDB';

create table MODULO(
	ID INTEGER auto_increment PRIMARY KEY,
    NOME VARCHAR(20),
    FUNZIONE VARCHAR(100),
    COSTO INTEGER
)Engine='InnoDB';


create table COMPONENTE(
	ID_LAYOUT INTEGER,
    ID_MODULO INTEGER,
    INDEX new_id_layout (ID_LAYOUT),
    INDEX new_id_modulo (ID_MODULO),
    FOREIGN KEY (ID_LAYOUT) REFERENCES LAYOUT(ID),
    FOREIGN KEY (ID_MODULO) REFERENCES MODULO(ID),
    PRIMARY KEY(ID_LAYOUT,ID_MODULO)
)Engine='InnoDB';

create table USERS(
	username varchar(30),
	password varchar(32),
	type varchar(30),
	PRIMARY KEY (username, password)
)engine='innodb';

/*Tabella di transizione creata per un accesso facilitato ai dati*/
create table commissione(
cfcliente varchar(20) NOT NULL,
pivadev varchar(10) NOT NULL,
urlsito varchar(50) NOT NULL,
INDEX new_cfcliente (cfcliente),
INDEX new_pivadev (pivadev),
FOREIGN KEY (cfcliente) REFERENCES cliente(CODICE),
FOREIGN KEY (pivadev) REFERENCES sviluppatore(PIVA),
PRIMARY KEY(cfcliente, pivadev)
)Engine='InnoDB';

/*Trigger per l'aggiornamento automatico del costo totale dei layout*/
create trigger aggiorna_costo_layout
after insert on componente
for each row
update layout set costo_totale = coalesce(costo_totale,0) + (select costo from modulo where modulo.ID =NEW.ID_MODULO) where layout.ID = NEW.ID_LAYOUT;

/*Trigger per l'aggiornamento automatico del numero dei siti e della spesa totale di ogni cliente*/
delimiter //
create trigger numerositiecosti
AFTER INSERT ON sito_web FOR EACH ROW
BEGIN
update cliente set n_siti = coalesce(n_siti,0) + 1 where (new.CLIENTE = cliente.CODICE);
update cliente set spesa_totale = coalesce(spesa_totale,0) + (select COSTO_TOTALE from layout where (new.LAYOUTREF = layout.ID)) where (new.CLIENTE = cliente.CODICE);
END; //
delimiter ;
