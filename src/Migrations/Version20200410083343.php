<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410083343 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, subtitle LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, filename VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_4FBF094FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, phone VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, start_at DATETIME NOT NULL, filename VARCHAR(255) NOT NULL, subtitle LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_tariff (event_id INT NOT NULL, tariff_id INT NOT NULL, INDEX IDX_A6FC572F71F7E88B (event_id), INDEX IDX_A6FC572F92348FD2 (tariff_id), PRIMARY KEY(event_id, tariff_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE global_setting (id INT AUTO_INCREMENT NOT NULL, site_logo_id INT NOT NULL, site_title VARCHAR(255) NOT NULL, site_description LONGTEXT NOT NULL, site_email VARCHAR(255) NOT NULL, phone1 VARCHAR(255) NOT NULL, phone2 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_F4F0787922BF681 (site_logo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, legend VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_C53D045F54177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price INT NOT NULL, subtitle LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, filename VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, main_image_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, summary VARCHAR(255) NOT NULL, week_price INT NOT NULL, weekend_price INT NOT NULL, published TINYINT(1) NOT NULL, guest_place_count INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_729F519BE4873418 (main_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_room_category (room_id INT NOT NULL, room_category_id INT NOT NULL, INDEX IDX_CF1A69E354177093 (room_id), INDEX IDX_CF1A69E367333DD (room_category_id), PRIMARY KEY(room_id, room_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_booking (id INT AUTO_INCREMENT NOT NULL, room_id INT NOT NULL, booker_id INT NOT NULL, started_at DATETIME NOT NULL, ended_at DATETIME NOT NULL, amount INT NOT NULL, INDEX IDX_C2E513E54177093 (room_id), INDEX IDX_C2E513E8B7E4006 (booker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_equipment_room (room_equipment_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_11B7760E70DF16D (room_equipment_id), INDEX IDX_11B776054177093 (room_id), PRIMARY KEY(room_equipment_id, room_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, filename VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_tariff (service_id INT NOT NULL, tariff_id INT NOT NULL, INDEX IDX_AAA2254BED5CA9E6 (service_id), INDEX IDX_AAA2254B92348FD2 (tariff_id), PRIMARY KEY(service_id, tariff_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slide (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slide_slidelayer (slide_id INT NOT NULL, slidelayer_id INT NOT NULL, INDEX IDX_C71C8541DD5AFB87 (slide_id), INDEX IDX_C71C85414F3F9DB9 (slidelayer_id), PRIMARY KEY(slide_id, slidelayer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slidelayer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, class VARCHAR(255) DEFAULT NULL, data_x VARCHAR(255) DEFAULT NULL, data_hoffset INT DEFAULT NULL, data_y INT DEFAULT NULL, data_voffset VARCHAR(255) DEFAULT NULL, data_responsive_offset VARCHAR(255) DEFAULT NULL, data_whitespace VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tariff (id INT AUTO_INCREMENT NOT NULL, type_of_tariff_id INT NOT NULL, title VARCHAR(255) NOT NULL, price INT NOT NULL, detail LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_9465207D221395D1 (type_of_tariff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_of_tariff (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, reset_token VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_2DE8C6A3A76ED395 (user_id), INDEX IDX_2DE8C6A3D60322AC (role_id), PRIMARY KEY(user_id, role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE event_tariff ADD CONSTRAINT FK_A6FC572F71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_tariff ADD CONSTRAINT FK_A6FC572F92348FD2 FOREIGN KEY (tariff_id) REFERENCES tariff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE global_setting ADD CONSTRAINT FK_F4F0787922BF681 FOREIGN KEY (site_logo_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F54177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BE4873418 FOREIGN KEY (main_image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE room_room_category ADD CONSTRAINT FK_CF1A69E354177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_room_category ADD CONSTRAINT FK_CF1A69E367333DD FOREIGN KEY (room_category_id) REFERENCES room_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_booking ADD CONSTRAINT FK_C2E513E54177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE room_booking ADD CONSTRAINT FK_C2E513E8B7E4006 FOREIGN KEY (booker_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room_equipment_room ADD CONSTRAINT FK_11B7760E70DF16D FOREIGN KEY (room_equipment_id) REFERENCES room_equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_equipment_room ADD CONSTRAINT FK_11B776054177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_tariff ADD CONSTRAINT FK_AAA2254BED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_tariff ADD CONSTRAINT FK_AAA2254B92348FD2 FOREIGN KEY (tariff_id) REFERENCES tariff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE slide_slidelayer ADD CONSTRAINT FK_C71C8541DD5AFB87 FOREIGN KEY (slide_id) REFERENCES slide (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE slide_slidelayer ADD CONSTRAINT FK_C71C85414F3F9DB9 FOREIGN KEY (slidelayer_id) REFERENCES slidelayer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tariff ADD CONSTRAINT FK_9465207D221395D1 FOREIGN KEY (type_of_tariff_id) REFERENCES type_of_tariff (id)');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_tariff DROP FOREIGN KEY FK_A6FC572F71F7E88B');
        $this->addSql('ALTER TABLE global_setting DROP FOREIGN KEY FK_F4F0787922BF681');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BE4873418');
        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3D60322AC');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F54177093');
        $this->addSql('ALTER TABLE room_room_category DROP FOREIGN KEY FK_CF1A69E354177093');
        $this->addSql('ALTER TABLE room_booking DROP FOREIGN KEY FK_C2E513E54177093');
        $this->addSql('ALTER TABLE room_equipment_room DROP FOREIGN KEY FK_11B776054177093');
        $this->addSql('ALTER TABLE room_room_category DROP FOREIGN KEY FK_CF1A69E367333DD');
        $this->addSql('ALTER TABLE room_equipment_room DROP FOREIGN KEY FK_11B7760E70DF16D');
        $this->addSql('ALTER TABLE service_tariff DROP FOREIGN KEY FK_AAA2254BED5CA9E6');
        $this->addSql('ALTER TABLE slide_slidelayer DROP FOREIGN KEY FK_C71C8541DD5AFB87');
        $this->addSql('ALTER TABLE slide_slidelayer DROP FOREIGN KEY FK_C71C85414F3F9DB9');
        $this->addSql('ALTER TABLE event_tariff DROP FOREIGN KEY FK_A6FC572F92348FD2');
        $this->addSql('ALTER TABLE service_tariff DROP FOREIGN KEY FK_AAA2254B92348FD2');
        $this->addSql('ALTER TABLE tariff DROP FOREIGN KEY FK_9465207D221395D1');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FA76ED395');
        $this->addSql('ALTER TABLE room_booking DROP FOREIGN KEY FK_C2E513E8B7E4006');
        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3A76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_tariff');
        $this->addSql('DROP TABLE global_setting');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_room_category');
        $this->addSql('DROP TABLE room_booking');
        $this->addSql('DROP TABLE room_category');
        $this->addSql('DROP TABLE room_equipment');
        $this->addSql('DROP TABLE room_equipment_room');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_tariff');
        $this->addSql('DROP TABLE slide');
        $this->addSql('DROP TABLE slide_slidelayer');
        $this->addSql('DROP TABLE slidelayer');
        $this->addSql('DROP TABLE tariff');
        $this->addSql('DROP TABLE type_of_tariff');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_role');
    }
}
