<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108143339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE paragraphe ADD photos_id INT DEFAULT NULL, ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paragraphe ADD CONSTRAINT FK_4C1BA9B6301EC62 FOREIGN KEY (photos_id) REFERENCES photo_paragraphe (id)');
        $this->addSql('ALTER TABLE paragraphe ADD CONSTRAINT FK_4C1BA9B67E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo_paragraphe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4C1BA9B6301EC62 ON paragraphe (photos_id)');
        $this->addSql('CREATE INDEX IDX_4C1BA9B67E9E4C8C ON paragraphe (photo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE paragraphe DROP FOREIGN KEY FK_4C1BA9B6301EC62');
        $this->addSql('ALTER TABLE paragraphe DROP FOREIGN KEY FK_4C1BA9B67E9E4C8C');
        $this->addSql('DROP INDEX UNIQ_4C1BA9B6301EC62 ON paragraphe');
        $this->addSql('DROP INDEX IDX_4C1BA9B67E9E4C8C ON paragraphe');
        $this->addSql('ALTER TABLE paragraphe DROP photos_id, DROP photo_id');
    }
}
