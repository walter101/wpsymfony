<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222134356 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE housing_list (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, shape VARCHAR(255) NOT NULL, lenght VARCHAR(255) NOT NULL, height VARCHAR(255) NOT NULL, width VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD housing_list_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A684537543 FOREIGN KEY (housing_list_id) REFERENCES housing_list (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A684537543 ON computer (housing_list_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A684537543');
        $this->addSql('DROP TABLE housing_list');
        $this->addSql('DROP INDEX IDX_A298A7A684537543 ON computer');
        $this->addSql('ALTER TABLE computer DROP housing_list_id');
    }
}
