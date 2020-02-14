<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213231859 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne DROP ligne_id');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_628947497CE87467');
        $this->addSql('DROP INDEX IDX_628947497CE87467 ON relation');
        $this->addSql('ALTER TABLE relation CHANGE ligne_id_id ligne_id INT NOT NULL');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_628947495A438E76 FOREIGN KEY (ligne_id) REFERENCES ligne (id)');
        $this->addSql('CREATE INDEX IDX_628947495A438E76 ON relation (ligne_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne ADD ligne_id INT NOT NULL');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_628947495A438E76');
        $this->addSql('DROP INDEX IDX_628947495A438E76 ON relation');
        $this->addSql('ALTER TABLE relation CHANGE ligne_id ligne_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_628947497CE87467 FOREIGN KEY (ligne_id_id) REFERENCES ligne (id)');
        $this->addSql('CREATE INDEX IDX_628947497CE87467 ON relation (ligne_id_id)');
    }
}
