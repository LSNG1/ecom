<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230807095803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, type VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, psu VARCHAR(255) DEFAULT NULL, side_panel VARCHAR(255) DEFAULT NULL, external_525_bays BIGINT NOT NULL, internal_35_bays BIGINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cpu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, core_count BIGINT NOT NULL, core_clock INT NOT NULL, boost_clock INT NOT NULL, tdp BIGINT NOT NULL, graphics INT NOT NULL, smt TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cpu_cooler (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, rpm VARCHAR(255) DEFAULT NULL, noise_level VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gpu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(1024) NOT NULL, price DOUBLE PRECISION NOT NULL, chipset VARCHAR(1024) DEFAULT NULL, memory DOUBLE PRECISION DEFAULT NULL, core_clock BIGINT DEFAULT NULL, boost_clock BIGINT DEFAULT NULL, color VARCHAR(1024) DEFAULT NULL, length BIGINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gpus (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hard_drive (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, capacity INT NOT NULL, price_per_gb INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, cache BIGINT DEFAULT NULL, form_factor VARCHAR(255) NOT NULL, interface VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE headphones (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, type VARCHAR(255) NOT NULL, frequency_response JSON DEFAULT NULL, microphone TINYINT(1) NOT NULL, wireless TINYINT(1) NOT NULL, enclosure_type VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memory (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, speed VARCHAR(255) NOT NULL, modules JSON NOT NULL, price_per_gb INT DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, first_word_latency INT NOT NULL, cas_latency INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motherboard (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, socket VARCHAR(255) NOT NULL, form_factor VARCHAR(255) NOT NULL, max_memory BIGINT NOT NULL, memory_slots BIGINT NOT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mouse (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, tracking_method VARCHAR(255) NOT NULL, connection_type VARCHAR(255) DEFAULT NULL, max_dpi BIGINT DEFAULT NULL, hand_orientation VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power_supply (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT DEFAULT NULL, type VARCHAR(255) NOT NULL, efficiency VARCHAR(255) DEFAULT NULL, wattage BIGINT NOT NULL, modular VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) DEFAULT NULL, ADD lastname VARCHAR(255) DEFAULT NULL, ADD birthdate DATE DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL, ADD region VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE box');
        $this->addSql('DROP TABLE cpu');
        $this->addSql('DROP TABLE cpu_cooler');
        $this->addSql('DROP TABLE gpu');
        $this->addSql('DROP TABLE gpus');
        $this->addSql('DROP TABLE hard_drive');
        $this->addSql('DROP TABLE headphones');
        $this->addSql('DROP TABLE memory');
        $this->addSql('DROP TABLE motherboard');
        $this->addSql('DROP TABLE mouse');
        $this->addSql('DROP TABLE power_supply');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE user DROP name, DROP lastname, DROP birthdate, DROP country, DROP region');
    }
}
