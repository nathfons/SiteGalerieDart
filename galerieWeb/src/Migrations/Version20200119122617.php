<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200119122617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B38458D893');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B399DED506');
        $this->addSql('DROP INDEX UNIQ_1D1C63B38458D893 ON utilisateur');
        $this->addSql('DROP INDEX UNIQ_1D1C63B399DED506 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP id_artiste_id, DROP id_client_id');
        $this->addSql('ALTER TABLE artiste ADD id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C07354FC6EE5C49 ON artiste (id_utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FC6EE5C49');
        $this->addSql('DROP INDEX UNIQ_9C07354FC6EE5C49 ON artiste');
        $this->addSql('ALTER TABLE artiste DROP id_utilisateur_id');
        $this->addSql('ALTER TABLE utilisateur ADD id_artiste_id INT DEFAULT NULL, ADD id_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B38458D893 FOREIGN KEY (id_artiste_id) REFERENCES artiste (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B399DED506 FOREIGN KEY (id_client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B38458D893 ON utilisateur (id_artiste_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B399DED506 ON utilisateur (id_client_id)');
    }
}
