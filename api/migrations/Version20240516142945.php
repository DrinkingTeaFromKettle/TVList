<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516142945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genre_production (genre_id INT NOT NULL, production_id INT NOT NULL, PRIMARY KEY(genre_id, production_id))');
        $this->addSql('CREATE INDEX IDX_AF843DC54296D31F ON genre_production (genre_id)');
        $this->addSql('CREATE INDEX IDX_AF843DC5ECC6147F ON genre_production (production_id)');
        $this->addSql('CREATE TABLE productions_genre (production_id INT NOT NULL, genre_id INT NOT NULL, PRIMARY KEY(production_id, genre_id))');
        $this->addSql('CREATE INDEX IDX_CED518D1ECC6147F ON productions_genre (production_id)');
        $this->addSql('CREATE INDEX IDX_CED518D14296D31F ON productions_genre (genre_id)');
        $this->addSql('ALTER TABLE genre_production ADD CONSTRAINT FK_AF843DC54296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE genre_production ADD CONSTRAINT FK_AF843DC5ECC6147F FOREIGN KEY (production_id) REFERENCES production (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE productions_genre ADD CONSTRAINT FK_CED518D1ECC6147F FOREIGN KEY (production_id) REFERENCES production (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE productions_genre ADD CONSTRAINT FK_CED518D14296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE genre_production DROP CONSTRAINT FK_AF843DC54296D31F');
        $this->addSql('ALTER TABLE genre_production DROP CONSTRAINT FK_AF843DC5ECC6147F');
        $this->addSql('ALTER TABLE productions_genre DROP CONSTRAINT FK_CED518D1ECC6147F');
        $this->addSql('ALTER TABLE productions_genre DROP CONSTRAINT FK_CED518D14296D31F');
        $this->addSql('DROP TABLE genre_production');
        $this->addSql('DROP TABLE productions_genre');
    }
}
