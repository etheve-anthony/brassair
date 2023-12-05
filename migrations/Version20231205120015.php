<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231205120015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bandeau_promo');
        $this->addSql('DROP TABLE navbar_content');
        $this->addSql('ALTER TABLE contact_infos ADD logo_image VARCHAR(150) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bandeau_promo (id INT AUTO_INCREMENT NOT NULL, promo_text1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, promo_text2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, promo_text3 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, promo_text4 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, background_color VARCHAR(7) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, text_color VARCHAR(7) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, link VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, link_text VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE navbar_content (id INT AUTO_INCREMENT NOT NULL, menu1 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu1_url VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu2 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu2_url VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu3 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu3_url VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu4 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu4_url VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, logo_image VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone_number_title1 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone_number1 VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone_number_title2 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone_number2 VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone_number_title3 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone_number3 VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adress_title VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adress2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, adress_title2 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, opening_hours LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, facebook VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, signature VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE contact_infos DROP logo_image');
    }
}
