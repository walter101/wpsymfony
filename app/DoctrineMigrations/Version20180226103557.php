<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180226103557 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE search_filters ADD filter_processor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE search_filters ADD CONSTRAINT FK_F5A68817C617210D FOREIGN KEY (filter_processor_id) REFERENCES processor (id)');
        $this->addSql('CREATE INDEX IDX_F5A68817C617210D ON search_filters (filter_processor_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE search_filters DROP FOREIGN KEY FK_F5A68817C617210D');
        $this->addSql('DROP INDEX IDX_F5A68817C617210D ON search_filters');
        $this->addSql('ALTER TABLE search_filters DROP filter_processor_id');
    }
}
