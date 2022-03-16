<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220228110357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_colors (id INT AUTO_INCREMENT NOT NULL, colors VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_colors_product (product_colors_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_4C2B710932A096B4 (product_colors_id), INDEX IDX_4C2B71094584665A (product_id), PRIMARY KEY(product_colors_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_image (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_64617F034584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_colors_product ADD CONSTRAINT FK_4C2B710932A096B4 FOREIGN KEY (product_colors_id) REFERENCES product_colors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_colors_product ADD CONSTRAINT FK_4C2B71094584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F034584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE maquillage_product CHANGE description description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_colors_product DROP FOREIGN KEY FK_4C2B71094584665A');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F034584665A');
        $this->addSql('ALTER TABLE product_colors_product DROP FOREIGN KEY FK_4C2B710932A096B4');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_colors');
        $this->addSql('DROP TABLE product_colors_product');
        $this->addSql('DROP TABLE product_image');
        $this->addSql('ALTER TABLE maquillage_product CHANGE description description VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
