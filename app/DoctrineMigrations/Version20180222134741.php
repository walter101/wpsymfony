<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222134741 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE housing_list ADD color_id INT DEFAULT NULL, DROP color');
        $this->addSql('ALTER TABLE housing_list ADD CONSTRAINT FK_91FAC37F7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color_list (id)');
        $this->addSql('CREATE INDEX IDX_91FAC37F7ADA1FB5 ON housing_list (color_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE housing_list DROP FOREIGN KEY FK_91FAC37F7ADA1FB5');
        $this->addSql('DROP INDEX IDX_91FAC37F7ADA1FB5 ON housing_list');
        $this->addSql('ALTER TABLE housing_list ADD color VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP color_id');
    }
}
