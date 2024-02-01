<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201121547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products CHANGE brand brand VARCHAR(50) NOT NULL, CHANGE model model VARCHAR(50) NOT NULL, CHANGE engine_capacity engine_capacity VARCHAR(20) NOT NULL, CHANGE color color VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products CHANGE brand brand VARCHAR(50) DEFAULT NULL, CHANGE model model VARCHAR(50) DEFAULT NULL, CHANGE engine_capacity engine_capacity VARCHAR(20) DEFAULT NULL, CHANGE color color VARCHAR(20) DEFAULT NULL');
    }
}
