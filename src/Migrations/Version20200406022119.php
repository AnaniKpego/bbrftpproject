<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406022119 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE global_setting (id INT AUTO_INCREMENT NOT NULL, site_logo_id INT NOT NULL, site_title VARCHAR(255) NOT NULL, site_description LONGTEXT NOT NULL, site_email VARCHAR(255) NOT NULL, phone1 VARCHAR(255) NOT NULL, phone2 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_F4F0787922BF681 (site_logo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE global_setting ADD CONSTRAINT FK_F4F0787922BF681 FOREIGN KEY (site_logo_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE room ADD guest_place_count INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE global_setting');
        $this->addSql('ALTER TABLE room DROP guest_place_count');
    }
}
