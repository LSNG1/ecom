<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230731075916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE power_supply (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, type VARCHAR(255) NOT NULL, efficency VARCHAR(255) DEFAULT NULL, wattage BIGINT NOT NULL, modular VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cpu CHANGE price price INT NOT NULL, CHANGE boost_clock boost_clock INT NOT NULL, CHANGE graphics graphics INT NOT NULL');
        $this->addSql('ALTER TABLE gpu CHANGE price price DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE power_supply');
        $this->addSql('ALTER TABLE gpu CHANGE price price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu CHANGE price price INT DEFAULT NULL, CHANGE boost_clock boost_clock INT DEFAULT NULL, CHANGE graphics graphics VARCHAR(255) DEFAULT NULL');
    }
}
