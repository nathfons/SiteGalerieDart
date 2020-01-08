<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108125640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE abonne (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, rue_et_numero VARCHAR(255) NOT NULL, INDEX IDX_C35F081699DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, publie TINYINT(1) NOT NULL, date_publication DATETIME DEFAULT NULL, date_fin_publication DATETIME DEFAULT NULL, photo_titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, biography LONGTEXT NOT NULL, approuve TINYINT(1) NOT NULL, photographie VARCHAR(255) DEFAULT NULL, miniature VARCHAR(255) DEFAULT NULL, commission DOUBLE PRECISION NOT NULL, alaune TINYINT(1) NOT NULL, text_alaune LONGTEXT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, date_creation_compte DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cadre (id INT AUTO_INCREMENT NOT NULL, couleur_id INT DEFAULT NULL, matiere_id INT DEFAULT NULL, imagecadre VARCHAR(255) NOT NULL, prix_cadre_unite_ht DOUBLE PRECISION NOT NULL, INDEX IDX_F42587B9C31BA576 (couleur_id), INDEX IDX_F42587B9F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nomcategorie VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, date_creation_compte DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_adresse_id INT NOT NULL, id_typelivraison_id INT NOT NULL, id_typepaiement_id INT NOT NULL, id_client_id INT NOT NULL, referencecommande VARCHAR(50) NOT NULL, etatcommande VARCHAR(50) NOT NULL, datecommande DATETIME NOT NULL, datelivraison DATETIME DEFAULT NULL, INDEX IDX_6EEAA67DE86D5C8B (id_adresse_id), INDEX IDX_6EEAA67D787ACB9B (id_typelivraison_id), INDEX IDX_6EEAA67DBD5AA1AD (id_typepaiement_id), INDEX IDX_6EEAA67D99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, nomcouleur VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, id_adresse_id INT NOT NULL, id_commande_id INT NOT NULL, nom_facture VARCHAR(50) NOT NULL, reference_facture VARCHAR(10) NOT NULL, date_facture DATETIME NOT NULL, tva DOUBLE PRECISION NOT NULL, INDEX IDX_FE866410E86D5C8B (id_adresse_id), INDEX IDX_FE8664109AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT NOT NULL, id_commande_id INT NOT NULL, quantite_produit INT NOT NULL, prix_unite DOUBLE PRECISION NOT NULL, INDEX IDX_3170B74BAABEFE2C (id_produit_id), INDEX IDX_3170B74B9AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, nommatiere VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paragraphe (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, INDEX IDX_4C1BA9B67294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photographie_artiste (id INT AUTO_INCREMENT NOT NULL, artiste_id INT DEFAULT NULL, photographie VARCHAR(255) DEFAULT NULL, miniature VARCHAR(255) NOT NULL, INDEX IDX_6AF4007C21D25844 (artiste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_paragraphe (id INT AUTO_INCREMENT NOT NULL, paragraphe_id INT DEFAULT NULL, photographie VARCHAR(255) DEFAULT NULL, miniature VARCHAR(255) NOT NULL, INDEX IDX_7F47BE52328992 (paragraphe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, artiste_id INT DEFAULT NULL, id_produit_id INT DEFAULT NULL, id_cadre_id INT DEFAULT NULL, id_categorie_id INT NOT NULL, type_produit VARCHAR(50) NOT NULL, nom_produit VARCHAR(100) NOT NULL, date_creation DATETIME NOT NULL, descriptif LONGTEXT NOT NULL, dimension VARCHAR(255) NOT NULL, cadre TINYINT(1) NOT NULL, prix_ht DOUBLE PRECISION DEFAULT NULL, approuve TINYINT(1) NOT NULL, remise DOUBLE PRECISION NOT NULL, poids DOUBLE PRECISION NOT NULL, en_vente TINYINT(1) DEFAULT NULL, en_stock TINYINT(1) DEFAULT NULL, quantite_stocks DOUBLE PRECISION DEFAULT NULL, quantite_vendue DOUBLE PRECISION DEFAULT NULL, photographie VARCHAR(255) NOT NULL, miniature VARCHAR(255) NOT NULL, dimension_cadre VARCHAR(255) NOT NULL, INDEX IDX_29A5EC2721D25844 (artiste_id), INDEX IDX_29A5EC27AABEFE2C (id_produit_id), INDEX IDX_29A5EC27C3D33605 (id_cadre_id), INDEX IDX_29A5EC279F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retour (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT NOT NULL, id_commande_id INT NOT NULL, date_retour DATETIME NOT NULL, date_remboursement DATETIME DEFAULT NULL, quantite_retour INT NOT NULL, reference_retour VARCHAR(50) NOT NULL, INDEX IDX_ED6FD321AABEFE2C (id_produit_id), INDEX IDX_ED6FD3219AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva_actuel (id INT AUTO_INCREMENT NOT NULL, tva_type VARCHAR(255) NOT NULL, tva DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typelivraison (id INT AUTO_INCREMENT NOT NULL, nomtypelivraison VARCHAR(20) NOT NULL, prixlivraison DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typepaiement (id INT AUTO_INCREMENT NOT NULL, nomtypepaiement VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_artiste_id INT DEFAULT NULL, id_client_id INT DEFAULT NULL, type_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), UNIQUE INDEX UNIQ_1D1C63B38458D893 (id_artiste_id), UNIQUE INDEX UNIQ_1D1C63B399DED506 (id_client_id), INDEX IDX_1D1C63B3C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F081699DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE cadre ADD CONSTRAINT FK_F42587B9C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE cadre ADD CONSTRAINT FK_F42587B9F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DE86D5C8B FOREIGN KEY (id_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D787ACB9B FOREIGN KEY (id_typelivraison_id) REFERENCES typelivraison (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DBD5AA1AD FOREIGN KEY (id_typepaiement_id) REFERENCES typepaiement (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410E86D5C8B FOREIGN KEY (id_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664109AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE paragraphe ADD CONSTRAINT FK_4C1BA9B67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE photographie_artiste ADD CONSTRAINT FK_6AF4007C21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE photo_paragraphe ADD CONSTRAINT FK_7F47BE52328992 FOREIGN KEY (paragraphe_id) REFERENCES paragraphe (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2721D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27C3D33605 FOREIGN KEY (id_cadre_id) REFERENCES cadre (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC279F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE retour ADD CONSTRAINT FK_ED6FD321AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE retour ADD CONSTRAINT FK_ED6FD3219AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B38458D893 FOREIGN KEY (id_artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B399DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3C54C8C93 FOREIGN KEY (type_id) REFERENCES type_utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DE86D5C8B');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410E86D5C8B');
        $this->addSql('ALTER TABLE paragraphe DROP FOREIGN KEY FK_4C1BA9B67294869C');
        $this->addSql('ALTER TABLE photographie_artiste DROP FOREIGN KEY FK_6AF4007C21D25844');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2721D25844');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B38458D893');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27C3D33605');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC279F34925F');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F081699DED506');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D99DED506');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B399DED506');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664109AF8E3A3');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B9AF8E3A3');
        $this->addSql('ALTER TABLE retour DROP FOREIGN KEY FK_ED6FD3219AF8E3A3');
        $this->addSql('ALTER TABLE cadre DROP FOREIGN KEY FK_F42587B9C31BA576');
        $this->addSql('ALTER TABLE cadre DROP FOREIGN KEY FK_F42587B9F46CD258');
        $this->addSql('ALTER TABLE photo_paragraphe DROP FOREIGN KEY FK_7F47BE52328992');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BAABEFE2C');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27AABEFE2C');
        $this->addSql('ALTER TABLE retour DROP FOREIGN KEY FK_ED6FD321AABEFE2C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D787ACB9B');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DBD5AA1AD');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3C54C8C93');
        $this->addSql('DROP TABLE abonne');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE cadre');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE paragraphe');
        $this->addSql('DROP TABLE photographie_artiste');
        $this->addSql('DROP TABLE photo_paragraphe');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE retour');
        $this->addSql('DROP TABLE tva_actuel');
        $this->addSql('DROP TABLE typelivraison');
        $this->addSql('DROP TABLE typepaiement');
        $this->addSql('DROP TABLE type_utilisateur');
        $this->addSql('DROP TABLE utilisateur');
    }
}
