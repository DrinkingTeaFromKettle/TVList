<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528080739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE production DROP created_by');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E0A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D3EDB1E0A76ED395 ON production (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE production DROP CONSTRAINT FK_D3EDB1E0A76ED395');
        $this->addSql('DROP INDEX IDX_D3EDB1E0A76ED395');
        $this->addSql('ALTER TABLE production ADD created_by VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE production DROP user_id');
    }
}
