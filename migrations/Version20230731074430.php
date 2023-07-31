<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230731074430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE motherboard (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, socket VARCHAR(255) NOT NULL, form_factor VARCHAR(255) NOT NULL, max_memory BIGINT NOT NULL, memory_slots BIGINT NOT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE motherboard');
        $this->addSql('ALTER TABLE gpu CHANGE price price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu CHANGE price price INT DEFAULT NULL, CHANGE boost_clock boost_clock INT DEFAULT NULL, CHANGE graphics graphics VARCHAR(255) DEFAULT NULL');
    }
}
