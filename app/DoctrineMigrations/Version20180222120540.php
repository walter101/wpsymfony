<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222120540 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE processor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, processor_speed VARCHAR(255) NOT NULL, processor_type VARCHAR(255) NOT NULL, cores INT NOT NULL, socket INT NOT NULL, poweruse VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD processor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A637BAC19A FOREIGN KEY (processor_id) REFERENCES processor (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A637BAC19A ON computer (processor_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A637BAC19A');
        $this->addSql('DROP TABLE processor');
        $this->addSql('DROP INDEX IDX_A298A7A637BAC19A ON computer');
        $this->addSql('ALTER TABLE computer DROP processor_id');
    }
}
