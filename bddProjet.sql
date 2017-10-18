#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: texte_accueil
#------------------------------------------------------------

CREATE TABLE texte_accueil(
        id_texte_accueil      int (11) Auto_increment  NOT NULL ,
        contenu_texte_accueil Varchar (255) ,
        id_utilisateur        Int NOT NULL ,
        PRIMARY KEY (id_texte_accueil )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id_utilisateur       int (11) Auto_increment  NOT NULL ,
        login_utilisateur    Varchar (50) NOT NULL ,
        password_utilisateur Varchar (50) NOT NULL ,
        mail_utilisateur     Varchar (50) NOT NULL ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: image_programme
#------------------------------------------------------------

CREATE TABLE image_programme(
        id_image_programme  int (11) Auto_increment  NOT NULL ,
        url_image_programme Varchar (50) ,
        id_utilisateur      Int NOT NULL ,
        PRIMARY KEY (id_image_programme )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: texte_programme
#------------------------------------------------------------

CREATE TABLE texte_programme(
        id_texte_programme      int (11) Auto_increment  NOT NULL ,
        titre_texte_programme   Varchar (50) ,
        contenu_texte_programme Varchar (255) ,
        id_utilisateur          Int NOT NULL ,
        PRIMARY KEY (id_texte_programme )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: video_live
#------------------------------------------------------------

CREATE TABLE video_live(
        id_video_live          int (11) Auto_increment  NOT NULL ,
        url_video_live         Varchar (50) ,
        description_video_live Varchar (255) ,
        id_utilisateur         Int NOT NULL ,
        PRIMARY KEY (id_video_live )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: photo_temoignage
#------------------------------------------------------------

CREATE TABLE photo_temoignage(
        id_photo_temoignage          int (11) Auto_increment  NOT NULL ,
        url_photo_temoignage         Varchar (50) ,
        description_photo_temoignage Varchar (50) ,
        id_utilisateur               Int NOT NULL ,
        PRIMARY KEY (id_photo_temoignage )
)ENGINE=InnoDB;

ALTER TABLE texte_accueil ADD CONSTRAINT FK_texte_accueil_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE image_programme ADD CONSTRAINT FK_image_programme_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE texte_programme ADD CONSTRAINT FK_texte_programme_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE video_live ADD CONSTRAINT FK_video_live_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE photo_temoignage ADD CONSTRAINT FK_photo_temoignage_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
