<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230107165454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE electric_vehicle_population_data_entity (id INT AUTO_INCREMENT NOT NULL, vin VARCHAR(255) NOT NULL, county VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, postal_code INT NOT NULL, model_year INT NOT NULL, make VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, electric_vehicle_type VARCHAR(255) NOT NULL, clean_alternative_fuel_vehicle_eligibility VARCHAR(255) NOT NULL, electric_range INT NOT NULL, base_msrp INT NOT NULL, legislative_district VARCHAR(255) DEFAULT NULL, dol_vehicle_id INT NOT NULL, vehicle_location VARCHAR(255) NOT NULL, electric_utility VARCHAR(255) DEFAULT NULL, census_tract INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE electric_vehicle_population_data_entity');
    }
}
