<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230903203611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE box ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu_cooler ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE gpu ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE hard_drive ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE headphones ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE memory ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE motherboard ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE mouse ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE power_supply ADD reduction_amount DOUBLE PRECISION DEFAULT NULL, ADD shipment_fee BIGINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE box DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE cpu DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE cpu_cooler DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE gpu DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE hard_drive DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE headphones DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE memory DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE motherboard DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE mouse DROP reduction_amount, DROP shipment_fee');
        $this->addSql('ALTER TABLE power_supply DROP reduction_amount, DROP shipment_fee');
    }
}
