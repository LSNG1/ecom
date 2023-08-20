<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820212852 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE box ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu_cooler ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE gpu ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hard_drive ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE headphones ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE memory ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE motherboard ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE mouse ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE power_supply ADD status VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE box DROP status');
        $this->addSql('ALTER TABLE cpu DROP status');
        $this->addSql('ALTER TABLE cpu_cooler DROP status');
        $this->addSql('ALTER TABLE gpu DROP status');
        $this->addSql('ALTER TABLE hard_drive DROP status');
        $this->addSql('ALTER TABLE headphones DROP status');
        $this->addSql('ALTER TABLE memory DROP status');
        $this->addSql('ALTER TABLE motherboard DROP status');
        $this->addSql('ALTER TABLE mouse DROP status');
        $this->addSql('ALTER TABLE power_supply DROP status');
    }
}
