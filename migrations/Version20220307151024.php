<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307151024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE postal_adress ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE postal_adress ADD CONSTRAINT FK_83CB073FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_83CB073FA76ED395 ON postal_adress (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE postal_adress DROP FOREIGN KEY FK_83CB073FA76ED395');
        $this->addSql('DROP INDEX IDX_83CB073FA76ED395 ON postal_adress');
        $this->addSql('ALTER TABLE postal_adress DROP user_id');
    }
}
