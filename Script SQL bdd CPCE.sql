#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: PHOTO
#------------------------------------------------------------

CREATE TABLE PHOTO(
        ID_photo          int (11) Auto_increment  NOT NULL ,
        url_photo         Varchar (255) ,
        description_photo Varchar (255) ,
        ID_utilisateur    Int NOT NULL ,
        PRIMARY KEY (ID_photo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TEXTE
#------------------------------------------------------------

CREATE TABLE TEXTE(
        ID_texte       int (11) Auto_increment  NOT NULL ,
        titre_texte    Varchar (50) ,
        contenu_texte  Varchar (255) ,
        ID_utilisateur Int NOT NULL ,
        PRIMARY KEY (ID_texte )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UTILISATEUR
#------------------------------------------------------------

CREATE TABLE UTILISATEUR(
        ID_utilisateur       int (11) Auto_increment  NOT NULL ,
        login_utilisateur    Varchar (50) ,
        password_utilisateur Varchar (50) ,
        PRIMARY KEY (ID_utilisateur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VIDEO
#------------------------------------------------------------

CREATE TABLE VIDEO(
        ID_video          int (11) Auto_increment  NOT NULL ,
        url_video         Varchar (255) ,
        description_video Varchar (255) ,
        ID_utilisateur    Int NOT NULL ,
        PRIMARY KEY (ID_video )
)ENGINE=InnoDB;

ALTER TABLE PHOTO ADD CONSTRAINT FK_PHOTO_ID_utilisateur FOREIGN KEY (ID_utilisateur) REFERENCES UTILISATEUR(ID_utilisateur);
ALTER TABLE TEXTE ADD CONSTRAINT FK_TEXTE_ID_utilisateur FOREIGN KEY (ID_utilisateur) REFERENCES UTILISATEUR(ID_utilisateur);
ALTER TABLE VIDEO ADD CONSTRAINT FK_VIDEO_ID_utilisateur FOREIGN KEY (ID_utilisateur) REFERENCES UTILISATEUR(ID_utilisateur);
