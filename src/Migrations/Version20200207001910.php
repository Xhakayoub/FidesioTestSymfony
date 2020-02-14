<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200207001910 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gare (id INT AUTO_INCREMENT NOT NULL, gare_id INT NOT NULL, gare_nom VARCHAR(255) NOT NULL, long_nom VARCHAR(255) NOT NULL, nom_iv VARCHAR(255) NOT NULL, num_mod INT NOT NULL, mode_ VARCHAR(255) NOT NULL, fer TINYINT(1) DEFAULT NULL, train TINYINT(1) DEFAULT NULL, rer TINYINT(1) DEFAULT NULL, metro TINYINT(1) DEFAULT NULL, tramway TINYINT(1) DEFAULT NULL, navette TINYINT(1) DEFAULT NULL, val TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne (id INT AUTO_INCREMENT NOT NULL, ligne_id INT NOT NULL, ligne VARCHAR(255) NOT NULL, code_ligf DOUBLE PRECISION NOT NULL, indice_lig VARCHAR(255) NOT NULL, reseau VARCHAR(255) NOT NULL, res_com VARCHAR(255) NOT NULL, res_stif DOUBLE PRECISION NOT NULL, exploitant VARCHAR(255) NOT NULL, x DOUBLE PRECISION NOT NULL, y DOUBLE PRECISION NOT NULL, principal INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation (id INT AUTO_INCREMENT NOT NULL, gare_id_id INT NOT NULL, ligne_id_id INT NOT NULL, terminus TINYINT(1) DEFAULT NULL, INDEX IDX_62894749E8ECC45F (gare_id_id), INDEX IDX_628947497CE87467 (ligne_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_62894749E8ECC45F FOREIGN KEY (gare_id_id) REFERENCES gare (id)');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_628947497CE87467 FOREIGN KEY (ligne_id_id) REFERENCES ligne (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_62894749E8ECC45F');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_628947497CE87467');
        $this->addSql('DROP TABLE gare');
        $this->addSql('DROP TABLE ligne');
        $this->addSql('DROP TABLE relation');
    }
}
