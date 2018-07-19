<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222094007 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE main_board (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, pclex16 INT NOT NULL, pclex1 INT NOT NULL, memory_slots INT NOT NULL, memory_max VARCHAR(255) NOT NULL, memory_types VARCHAR(255) NOT NULL, usb2_0 INT NOT NULL, usb3_0 INT NOT NULL, usb3_1 INT NOT NULL, hdmi_inputs INT NOT NULL, dvi_inputs INT NOT NULL, bluetooth TINYINT(1) NOT NULL, wlan TINYINT(1) NOT NULL, microphone_in TINYINT(1) NOT NULL, line_in TINYINT(1) NOT NULL, line_out TINYINT(1) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD memory_id INT DEFAULT NULL, DROP memory');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6CCC80CB3 FOREIGN KEY (memory_id) REFERENCES memory_list (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A298A7A6CCC80CB3 ON computer (memory_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE main_board');
        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6CCC80CB3');
        $this->addSql('DROP INDEX UNIQ_A298A7A6CCC80CB3 ON computer');
        $this->addSql('ALTER TABLE computer ADD memory VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP memory_id');
    }
}
