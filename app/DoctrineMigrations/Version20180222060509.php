<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222060509 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP INDEX IDX_A298A7A6B6FFD4B, ADD UNIQUE INDEX UNIQ_A298A7A6B6FFD4B (graphic_card_id)');
        $this->addSql('ALTER TABLE graphic_card DROP computer');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP INDEX UNIQ_A298A7A6B6FFD4B, ADD INDEX IDX_A298A7A6B6FFD4B (graphic_card_id)');
        $this->addSql('ALTER TABLE graphic_card ADD computer VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
