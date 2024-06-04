<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523095022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genre (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE production (id INT NOT NULL, studio_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, episodes INT NOT NULL, current_episodes INT NOT NULL, trailer_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D3EDB1E0446F285F ON production (studio_id)');
        $this->addSql('CREATE TABLE productions_genre (production_id INT NOT NULL, genre_id INT NOT NULL, PRIMARY KEY(production_id, genre_id))');
        $this->addSql('CREATE INDEX IDX_CED518D1ECC6147F ON productions_genre (production_id)');
        $this->addSql('CREATE INDEX IDX_CED518D14296D31F ON productions_genre (genre_id)');
        $this->addSql('CREATE TABLE studio (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, created_at VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E0446F285F FOREIGN KEY (studio_id) REFERENCES studio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE productions_genre ADD CONSTRAINT FK_CED518D1ECC6147F FOREIGN KEY (production_id) REFERENCES production (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE productions_genre ADD CONSTRAINT FK_CED518D14296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE production DROP CONSTRAINT FK_D3EDB1E0446F285F');
        $this->addSql('ALTER TABLE productions_genre DROP CONSTRAINT FK_CED518D1ECC6147F');
        $this->addSql('ALTER TABLE productions_genre DROP CONSTRAINT FK_CED518D14296D31F');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE production');
        $this->addSql('DROP TABLE productions_genre');
        $this->addSql('DROP TABLE studio');
        $this->addSql('DROP TABLE "user"');
    }
}
