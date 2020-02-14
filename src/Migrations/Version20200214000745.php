<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214000745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_628947495A438E76');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_62894749E8ECC45F');
        $this->addSql('DROP INDEX IDX_62894749E8ECC45F ON relation');
        $this->addSql('DROP INDEX IDX_628947495A438E76 ON relation');
        $this->addSql('ALTER TABLE relation ADD gare_id VARCHAR(255) NOT NULL, ADD ligne VARCHAR(255) NOT NULL, DROP gare_id_id, DROP ligne_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE relation ADD gare_id_id INT NOT NULL, ADD ligne_id INT NOT NULL, DROP gare_id, DROP ligne');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_628947495A438E76 FOREIGN KEY (ligne_id) REFERENCES ligne (id)');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_62894749E8ECC45F FOREIGN KEY (gare_id_id) REFERENCES gare (id)');
        $this->addSql('CREATE INDEX IDX_62894749E8ECC45F ON relation (gare_id_id)');
        $this->addSql('CREATE INDEX IDX_628947495A438E76 ON relation (ligne_id)');
    }
}
