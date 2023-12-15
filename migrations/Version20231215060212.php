<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215060212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitchen CHANGE main_image main_image VARCHAR(200) NOT NULL, CHANGE image1 image1 VARCHAR(200) NOT NULL, CHANGE image2 image2 VARCHAR(200) DEFAULT NULL, CHANGE image3 image3 VARCHAR(200) DEFAULT NULL, CHANGE image4 image4 VARCHAR(200) DEFAULT NULL, CHANGE image5 image5 VARCHAR(200) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitchen CHANGE main_image main_image VARCHAR(100) NOT NULL, CHANGE image1 image1 VARCHAR(100) NOT NULL, CHANGE image2 image2 VARCHAR(100) DEFAULT NULL, CHANGE image3 image3 LONGTEXT DEFAULT NULL, CHANGE image4 image4 VARCHAR(100) DEFAULT NULL, CHANGE image5 image5 LONGTEXT DEFAULT NULL');
    }
}
