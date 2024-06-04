<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528071312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production ADD uuid UUID NOT NULL');
        $this->addSql('COMMENT ON COLUMN production.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D3EDB1E0D17F50A6 ON production (uuid)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_D3EDB1E0D17F50A6');
        $this->addSql('ALTER TABLE production DROP uuid');
    }
}
