<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222105032 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_board ADD memory_types_id INT DEFAULT NULL, DROP memory_types');
        $this->addSql('ALTER TABLE main_board ADD CONSTRAINT FK_FB0A980198EDBBEC FOREIGN KEY (memory_types_id) REFERENCES memory_type_list (id)');
        $this->addSql('CREATE INDEX IDX_FB0A980198EDBBEC ON main_board (memory_types_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_board DROP FOREIGN KEY FK_FB0A980198EDBBEC');
        $this->addSql('DROP INDEX IDX_FB0A980198EDBBEC ON main_board');
        $this->addSql('ALTER TABLE main_board ADD memory_types VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP memory_types_id');
    }
}
