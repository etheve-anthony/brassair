<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204040129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE homepage ADD button_text VARCHAR(100) NOT NULL, ADD title_section2_small VARCHAR(100) NOT NULL, ADD title_section2_big VARCHAR(100) NOT NULL, ADD promise1 VARCHAR(100) NOT NULL, ADD promise2 VARCHAR(100) NOT NULL, ADD promise3 VARCHAR(100) NOT NULL, ADD promise4 VARCHAR(100) NOT NULL, ADD promise1_image VARCHAR(100) NOT NULL, ADD promise2_image VARCHAR(100) NOT NULL, ADD promise3_image VARCHAR(100) NOT NULL, ADD promise4_image VARCHAR(100) NOT NULL, ADD title_section3 VARCHAR(100) NOT NULL, ADD about_text2 LONGTEXT NOT NULL, DROP about_video, CHANGE about_text about_text1 LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE homepage ADD about_text LONGTEXT NOT NULL, ADD about_video VARCHAR(255) NOT NULL, DROP button_text, DROP title_section2_small, DROP title_section2_big, DROP promise1, DROP promise2, DROP promise3, DROP promise4, DROP promise1_image, DROP promise2_image, DROP promise3_image, DROP promise4_image, DROP title_section3, DROP about_text1, DROP about_text2');
    }
}
