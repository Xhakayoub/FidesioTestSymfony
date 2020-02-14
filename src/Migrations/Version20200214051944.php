<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214051944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gare (id INT AUTO_INCREMENT NOT NULL, gare_id INT NOT NULL, gare_nom VARCHAR(255) NOT NULL, long_nom VARCHAR(255) NOT NULL, nom_iv VARCHAR(255) NOT NULL, num_mod INT NOT NULL, mode_ VARCHAR(255) NOT NULL, fer TINYINT(1) DEFAULT NULL, train TINYINT(1) DEFAULT NULL, rer TINYINT(1) DEFAULT NULL, metro TINYINT(1) DEFAULT NULL, tramway TINYINT(1) DEFAULT NULL, navette TINYINT(1) DEFAULT NULL, val TINYINT(1) DEFAULT NULL, geo_point VARCHAR(255) NOT NULL, geo_shape VARCHAR(255) NOT NULL, id_ref_zdl INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne (id INT AUTO_INCREMENT NOT NULL, ligne VARCHAR(255) NOT NULL, code_ligf DOUBLE PRECISION NOT NULL, indice_lig VARCHAR(255) NOT NULL, reseau VARCHAR(255) NOT NULL, res_com VARCHAR(255) NOT NULL, res_stif DOUBLE PRECISION NOT NULL, exploitant VARCHAR(255) NOT NULL, x DOUBLE PRECISION NOT NULL, y DOUBLE PRECISION NOT NULL, principal INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation (id INT AUTO_INCREMENT NOT NULL, gare_id VARCHAR(255) DEFAULT NULL, ligne VARCHAR(255) DEFAULT NULL, terminus TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE gare');
        $this->addSql('DROP TABLE ligne');
        $this->addSql('DROP TABLE relation');
    }
}
