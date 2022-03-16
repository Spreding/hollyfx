<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301122344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maquillage_image (id INT AUTO_INCREMENT NOT NULL, maquillage_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_655F27DB9C40D701 (maquillage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maquillage_image ADD CONSTRAINT FK_655F27DB9C40D701 FOREIGN KEY (maquillage_id) REFERENCES maquillage_product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE maquillage_image');
    }
}
