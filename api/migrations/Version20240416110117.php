<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416110117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE "bookmark_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "student_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "bookmark" (id INT NOT NULL, student_id INT NOT NULL, company_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DA62921DCB944F1A ON "bookmark" (student_id)');
        $this->addSql('CREATE TABLE "student" (id INT NOT NULL, name VARCHAR(255) NOT NULL, sur_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE "bookmark" ADD CONSTRAINT FK_DA62921DCB944F1A FOREIGN KEY (student_id) REFERENCES "student" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE greeting');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "bookmark_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "student_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "bookmark" DROP CONSTRAINT FK_DA62921DCB944F1A');
        $this->addSql('DROP TABLE "bookmark"');
        $this->addSql('DROP TABLE "student"');
        $this->addSql('DROP TABLE "user"');
    }
}
