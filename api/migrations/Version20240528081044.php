<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528081044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production DROP CONSTRAINT fk_d3edb1e0a76ed395');
        $this->addSql('DROP INDEX idx_d3edb1e0a76ed395');
        $this->addSql('ALTER TABLE production RENAME COLUMN user_id TO created_by_id');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E0B03A8386 FOREIGN KEY (created_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D3EDB1E0B03A8386 ON production (created_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE production DROP CONSTRAINT FK_D3EDB1E0B03A8386');
        $this->addSql('DROP INDEX IDX_D3EDB1E0B03A8386');
        $this->addSql('ALTER TABLE production RENAME COLUMN created_by_id TO user_id');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT fk_d3edb1e0a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d3edb1e0a76ed395 ON production (user_id)');
    }
}
