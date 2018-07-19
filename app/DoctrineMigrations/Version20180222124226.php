<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222124226 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE operating_system_list (id INT AUTO_INCREMENT NOT NULL, operating_system_name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD operating_system_list_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6B3D13296 FOREIGN KEY (operating_system_list_id) REFERENCES operating_system_list (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A6B3D13296 ON computer (operating_system_list_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6B3D13296');
        $this->addSql('DROP TABLE operating_system_list');
        $this->addSql('DROP INDEX IDX_A298A7A6B3D13296 ON computer');
        $this->addSql('ALTER TABLE computer DROP operating_system_list_id');
    }
}
