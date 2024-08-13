<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240813033707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact_form (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, telephone VARCHAR(10) NOT NULL, subject VARCHAR(255) DEFAULT NULL, message LONGTEXT NOT NULL, rgpd LONGTEXT NOT NULL, request VARCHAR(255) NOT NULL, attached_file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_infos (id INT AUTO_INCREMENT NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, opening_hours VARCHAR(255) NOT NULL, facebook_page VARCHAR(100) NOT NULL, logo_image VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE homepage (id INT AUTO_INCREMENT NOT NULL, hero1 VARCHAR(255) NOT NULL, hero1_part2 VARCHAR(255) NOT NULL, hero2 VARCHAR(255) NOT NULL, main_image VARCHAR(255) NOT NULL, title_section2_small VARCHAR(100) NOT NULL, title_section2_big VARCHAR(100) NOT NULL, promise1 VARCHAR(100) NOT NULL, promise2 VARCHAR(100) NOT NULL, promise3 VARCHAR(100) NOT NULL, promise4 VARCHAR(100) NOT NULL, promise1_image VARCHAR(150) NOT NULL, promise2_image VARCHAR(150) NOT NULL, promise3_image VARCHAR(150) NOT NULL, promise4_image VARCHAR(150) NOT NULL, title_section3 VARCHAR(100) NOT NULL, about_text1 LONGTEXT NOT NULL, about_text2 LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_file (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kitchen (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, main_image VARCHAR(200) NOT NULL, description LONGTEXT NOT NULL, message1 VARCHAR(100) DEFAULT NULL, message2 VARCHAR(100) DEFAULT NULL, message3 VARCHAR(100) DEFAULT NULL, image1 VARCHAR(200) NOT NULL, image2 VARCHAR(200) DEFAULT NULL, image3 VARCHAR(200) DEFAULT NULL, image4 VARCHAR(200) DEFAULT NULL, image5 VARCHAR(200) DEFAULT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_offer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, message1 VARCHAR(100) DEFAULT NULL, message2 VARCHAR(100) DEFAULT NULL, message3 VARCHAR(100) DEFAULT NULL, description LONGTEXT NOT NULL, image1 VARCHAR(150) DEFAULT NULL, image2 VARCHAR(150) DEFAULT NULL, image3 VARCHAR(150) DEFAULT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact_form');
        $this->addSql('DROP TABLE contact_infos');
        $this->addSql('DROP TABLE homepage');
        $this->addSql('DROP TABLE image_file');
        $this->addSql('DROP TABLE kitchen');
        $this->addSql('DROP TABLE product_offer');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
