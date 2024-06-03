<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603094253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (
          id INT AUTO_INCREMENT NOT NULL,
          name_bg VARCHAR(255) NOT NULL,
          name_en VARCHAR(255) NOT NULL,
          description_en LONGTEXT DEFAULT NULL,
          description_bg LONGTEXT DEFAULT NULL,
          color_en VARCHAR(100) NOT NULL,
          color_bg VARCHAR(100) NOT NULL,
          price NUMERIC(10, 2) NOT NULL,
          quantity INT NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          created_by BIGINT NOT NULL,
          updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          updated_by BIGINT NOT NULL,
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD surname VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE `user` DROP name, DROP surname');
    }
}
