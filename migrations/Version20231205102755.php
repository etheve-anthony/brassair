<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231205102755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE homepage CHANGE promise1_image promise1_image VARCHAR(150) NOT NULL, CHANGE promise2_image promise2_image VARCHAR(150) NOT NULL, CHANGE promise3_image promise3_image VARCHAR(150) NOT NULL, CHANGE promise4_image promise4_image VARCHAR(150) NOT NULL');
        $this->addSql('ALTER TABLE product_offer CHANGE image1 image1 VARCHAR(150) DEFAULT NULL, CHANGE image2 image2 VARCHAR(150) DEFAULT NULL, CHANGE image3 image3 VARCHAR(150) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE homepage CHANGE promise1_image promise1_image VARCHAR(100) NOT NULL, CHANGE promise2_image promise2_image VARCHAR(100) NOT NULL, CHANGE promise3_image promise3_image VARCHAR(100) NOT NULL, CHANGE promise4_image promise4_image VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE product_offer CHANGE image1 image1 VARCHAR(100) DEFAULT NULL, CHANGE image2 image2 VARCHAR(100) DEFAULT NULL, CHANGE image3 image3 VARCHAR(100) DEFAULT NULL');
    }
}
