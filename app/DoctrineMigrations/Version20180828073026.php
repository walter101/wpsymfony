<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180828073026 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, department_number VARCHAR(255) NOT NULL, department_name VARCHAR(255) NOT NULL, department_parent VARCHAR(255) NOT NULL, company_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE werknemer (id INT AUTO_INCREMENT NOT NULL, voornaam VARCHAR(255) NOT NULL, achternaam VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE current_dept_emp');
        $this->addSql('DROP TABLE departments');
        $this->addSql('DROP TABLE dept_emp');
        $this->addSql('DROP TABLE dept_manager');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE salaries');
        $this->addSql('ALTER TABLE search_filters CHANGE price_from price_from INT DEFAULT NULL, CHANGE price_to price_to INT DEFAULT NULL');
        $this->addSql('ALTER TABLE search_filters ADD CONSTRAINT FK_F5A68817C617210D FOREIGN KEY (filter_processor_id) REFERENCES processor (id)');
        $this->addSql('ALTER TABLE search_filters ADD CONSTRAINT FK_F5A688171A23C05E FOREIGN KEY (filter_memory_id) REFERENCES memory_list (id)');
        $this->addSql('CREATE INDEX IDX_F5A68817C617210D ON search_filters (filter_processor_id)');
        $this->addSql('CREATE INDEX IDX_F5A688171A23C05E ON search_filters (filter_memory_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE current_dept_emp (id INT UNSIGNED AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, dept_no INT NOT NULL, from_date DATE NOT NULL, to_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departments (id INT UNSIGNED AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, dept_no INT NOT NULL, dept_name VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, dept_parent INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dept_emp (id INT UNSIGNED AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, dept_no INT NOT NULL, from_date DATE DEFAULT NULL, to_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dept_manager (id INT UNSIGNED AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, dept_no INT NOT NULL, from_date DATE NOT NULL, to_date DATE NOT NULL, company_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees (id INT UNSIGNED AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, firstname VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, lastname VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, birthdate DATE NOT NULL, hiredate DATE NOT NULL, company_id INT DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salaries (id INT UNSIGNED AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, salary INT NOT NULL, from_Date DATE NOT NULL, to_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE werknemer');
        $this->addSql('ALTER TABLE search_filters DROP FOREIGN KEY FK_F5A68817C617210D');
        $this->addSql('ALTER TABLE search_filters DROP FOREIGN KEY FK_F5A688171A23C05E');
        $this->addSql('DROP INDEX IDX_F5A68817C617210D ON search_filters');
        $this->addSql('DROP INDEX IDX_F5A688171A23C05E ON search_filters');
        $this->addSql('ALTER TABLE search_filters CHANGE price_from price_from INT NOT NULL, CHANGE price_to price_to INT NOT NULL');
    }
}
