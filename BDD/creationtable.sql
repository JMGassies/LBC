CREATE TABLE utilisateur (
    ID_User INT AUTO_INCREMENT PRIMARY KEY,
    Nom_User VARCHAR(100) NOT NULL,
    Pseudo_User VARCHAR(50) NOT NULL UNIQUE,
    Mail VARCHAR(100) NOT NULL UNIQUE,
    Mdp_User VARCHAR(255) NOT NULL,
    Date_User DATE NOT NULL,
    Role ENUM('user','admin') DEFAULT 'user'
);

CREATE TABLE annonce (
    ID_Annonce INT AUTO_INCREMENT PRIMARY KEY,
    Titre VARCHAR(150) NOT NULL,
    Description TEXT NOT NULL,
    Prix DECIMAL(10,2) NOT NULL,
    Genre ENUM('Voiture','Immobilier','Divers') NOT NULL,
    Photo VARCHAR(255),
    Date_Annonce DATE NOT NULL,
    ID_User INT NOT NULL,
    CONSTRAINT fk_user
        FOREIGN KEY (ID_User)
        REFERENCES utilisateur(ID_User)
        ON DELETE CASCADE
);
