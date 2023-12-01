<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201085036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bandeau_promo (id INT AUTO_INCREMENT NOT NULL, promo_text1 VARCHAR(255) DEFAULT NULL, promo_text2 VARCHAR(255) DEFAULT NULL, promo_text3 VARCHAR(255) DEFAULT NULL, promo_text4 VARCHAR(255) DEFAULT NULL, background_color VARCHAR(7) DEFAULT NULL, text_color VARCHAR(7) DEFAULT NULL, link VARCHAR(100) DEFAULT NULL, link_text VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE homepage (id INT AUTO_INCREMENT NOT NULL, hero1 VARCHAR(255) NOT NULL, hero2 VARCHAR(255) NOT NULL, main_image VARCHAR(255) NOT NULL, about_text LONGTEXT NOT NULL, about_video VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_file (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kitchen (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, main_image VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, details LONGTEXT NOT NULL, image1 VARCHAR(100) NOT NULL, image2 VARCHAR(100) DEFAULT NULL, image3 LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navbar_content (id INT AUTO_INCREMENT NOT NULL, menu1 VARCHAR(100) NOT NULL, menu1_url VARCHAR(100) NOT NULL, menu2 VARCHAR(100) NOT NULL, menu2_url VARCHAR(100) NOT NULL, menu3 VARCHAR(100) NOT NULL, menu3_url VARCHAR(100) NOT NULL, menu4 VARCHAR(100) NOT NULL, menu4_url VARCHAR(100) NOT NULL, logo_image VARCHAR(100) NOT NULL, phone_number_title1 VARCHAR(100) DEFAULT NULL, phone_number1 VARCHAR(10) NOT NULL, phone_number_title2 VARCHAR(100) DEFAULT NULL, phone_number2 VARCHAR(10) DEFAULT NULL, phone_number_title3 VARCHAR(100) DEFAULT NULL, phone_number3 VARCHAR(10) DEFAULT NULL, address VARCHAR(255) NOT NULL, adress_title VARCHAR(100) NOT NULL, adress2 VARCHAR(255) DEFAULT NULL, adress_title2 VARCHAR(100) DEFAULT NULL, opening_hours LONGTEXT NOT NULL, email VARCHAR(100) NOT NULL, facebook VARCHAR(100) DEFAULT NULL, signature VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_offer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, image1 VARCHAR(100) DEFAULT NULL, image2 VARCHAR(100) DEFAULT NULL, image3 VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bandeau_promo');
        $this->addSql('DROP TABLE homepage');
        $this->addSql('DROP TABLE image_file');
        $this->addSql('DROP TABLE kitchen');
        $this->addSql('DROP TABLE navbar_content');
        $this->addSql('DROP TABLE product_offer');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
