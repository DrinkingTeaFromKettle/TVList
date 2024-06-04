<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523095103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE studio_id_seq CASCADE');
        $this->addSql('ALTER TABLE studio ADD uuid UUID NOT NULL');
        $this->addSql('COMMENT ON COLUMN studio.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B6D17F50A6 ON studio (uuid)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE studio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX UNIQ_4A2B07B6D17F50A6');
        $this->addSql('ALTER TABLE studio DROP uuid');
    }
}
