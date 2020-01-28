<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200125180753 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE artiste_categorie_artiste (artiste_id INT NOT NULL, categorie_artiste_id INT NOT NULL, INDEX IDX_3C66806B21D25844 (artiste_id), INDEX IDX_3C66806BBF1B92E8 (categorie_artiste_id), PRIMARY KEY(artiste_id, categorie_artiste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_artiste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_categorie_artiste ADD CONSTRAINT FK_3C66806B21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_categorie_artiste ADD CONSTRAINT FK_3C66806BBF1B92E8 FOREIGN KEY (categorie_artiste_id) REFERENCES categorie_artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FC6EE5C49');
        $this->addSql('DROP INDEX UNIQ_9C07354FC6EE5C49 ON artiste');
        $this->addSql('ALTER TABLE artiste CHANGE id_utilisateur_id utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C07354FFB88E14F ON artiste (utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artiste_categorie_artiste DROP FOREIGN KEY FK_3C66806BBF1B92E8');
        $this->addSql('DROP TABLE artiste_categorie_artiste');
        $this->addSql('DROP TABLE categorie_artiste');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FFB88E14F');
        $this->addSql('DROP INDEX UNIQ_9C07354FFB88E14F ON artiste');
        $this->addSql('ALTER TABLE artiste CHANGE utilisateur_id id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C07354FC6EE5C49 ON artiste (id_utilisateur_id)');
    }
}
