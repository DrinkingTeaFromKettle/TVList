<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528092925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production DROP CONSTRAINT fk_d3edb1e0b03a8386');
        $this->addSql('DROP INDEX idx_d3edb1e0b03a8386');
        $this->addSql('ALTER TABLE production RENAME COLUMN created_by_id TO created_by');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E0DE12AB56 FOREIGN KEY (created_by) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D3EDB1E0DE12AB56 ON production (created_by)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE production DROP CONSTRAINT FK_D3EDB1E0DE12AB56');
        $this->addSql('DROP INDEX IDX_D3EDB1E0DE12AB56');
        $this->addSql('ALTER TABLE production RENAME COLUMN created_by TO created_by_id');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT fk_d3edb1e0b03a8386 FOREIGN KEY (created_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d3edb1e0b03a8386 ON production (created_by_id)');
    }
}
