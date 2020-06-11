<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200330154853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE slide (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slide_slidelayer (slide_id INT NOT NULL, slidelayer_id INT NOT NULL, INDEX IDX_C71C8541DD5AFB87 (slide_id), INDEX IDX_C71C85414F3F9DB9 (slidelayer_id), PRIMARY KEY(slide_id, slidelayer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slidelayer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, class VARCHAR(255) DEFAULT NULL, data_x VARCHAR(255) DEFAULT NULL, data_hoffset INT DEFAULT NULL, data_y INT DEFAULT NULL, data_voffset VARCHAR(255) DEFAULT NULL, data_responsive_offset VARCHAR(255) DEFAULT NULL, data_whitespace VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE slide_slidelayer ADD CONSTRAINT FK_C71C8541DD5AFB87 FOREIGN KEY (slide_id) REFERENCES slide (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE slide_slidelayer ADD CONSTRAINT FK_C71C85414F3F9DB9 FOREIGN KEY (slidelayer_id) REFERENCES slidelayer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE slide_slidelayer DROP FOREIGN KEY FK_C71C8541DD5AFB87');
        $this->addSql('ALTER TABLE slide_slidelayer DROP FOREIGN KEY FK_C71C85414F3F9DB9');
        $this->addSql('DROP TABLE slide');
        $this->addSql('DROP TABLE slide_slidelayer');
        $this->addSql('DROP TABLE slidelayer');
    }
}
