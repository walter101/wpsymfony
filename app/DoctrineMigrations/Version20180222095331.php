<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222095331 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_board ADD memory_max_id INT DEFAULT NULL, DROP memory_max');
        $this->addSql('ALTER TABLE main_board ADD CONSTRAINT FK_FB0A9801D2924DE6 FOREIGN KEY (memory_max_id) REFERENCES memory_list (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FB0A9801D2924DE6 ON main_board (memory_max_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_board DROP FOREIGN KEY FK_FB0A9801D2924DE6');
        $this->addSql('DROP INDEX UNIQ_FB0A9801D2924DE6 ON main_board');
        $this->addSql('ALTER TABLE main_board ADD memory_max VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP memory_max_id');
    }
}
