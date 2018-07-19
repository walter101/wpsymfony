<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180221150529 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer ADD graphic_card_id INT DEFAULT NULL, DROP graphic_card');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6B6FFD4B FOREIGN KEY (graphic_card_id) REFERENCES graphic_card (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A6B6FFD4B ON computer (graphic_card_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6B6FFD4B');
        $this->addSql('DROP INDEX IDX_A298A7A6B6FFD4B ON computer');
        $this->addSql('ALTER TABLE computer ADD graphic_card VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP graphic_card_id');
    }
}
