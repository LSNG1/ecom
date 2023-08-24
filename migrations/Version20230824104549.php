<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230824104549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gpus');
        $this->addSql('ALTER TABLE box ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL, CHANGE price price INT DEFAULT NULL, CHANGE boost_clock boost_clock BIGINT DEFAULT NULL, CHANGE graphics graphics VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu_cooler ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gpu ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE hard_drive ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE headphones ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE memory ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE motherboard ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mouse ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE power_supply ADD status VARCHAR(255) DEFAULT NULL, ADD stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD username VARCHAR(255) DEFAULT NULL, ADD lastname VARCHAR(255) DEFAULT NULL, ADD birthdate DATE DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL, ADD region VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gpus (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE motherboard DROP status, DROP stock');
        $this->addSql('ALTER TABLE cpu_cooler DROP status, DROP stock');
        $this->addSql('ALTER TABLE mouse DROP status, DROP stock');
        $this->addSql('ALTER TABLE gpu DROP status, DROP stock, CHANGE price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE power_supply DROP status, DROP stock');
        $this->addSql('ALTER TABLE cpu DROP status, DROP stock, CHANGE price price INT NOT NULL, CHANGE boost_clock boost_clock INT NOT NULL, CHANGE graphics graphics INT NOT NULL');
        $this->addSql('ALTER TABLE hard_drive DROP status, DROP stock');
        $this->addSql('ALTER TABLE user DROP username, DROP lastname, DROP birthdate, DROP country, DROP region');
        $this->addSql('ALTER TABLE memory DROP status, DROP stock');
        $this->addSql('ALTER TABLE box DROP status, DROP stock');
        $this->addSql('ALTER TABLE headphones DROP status, DROP stock');
    }
}
