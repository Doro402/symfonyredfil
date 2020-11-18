<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201117121703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cm');
        $this->addSql('DROP TABLE formateurs');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462EA76ED395');
        $this->addSql('DROP INDEX UNIQ_C4EB462EA76ED395 ON apprenant');
        $this->addSql('ALTER TABLE apprenant DROP user_id');
        $this->addSql('ALTER TABLE user ADD type VARCHAR(255) NOT NULL, ADD profil VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cm (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, profil VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_3C0A377EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE formateurs (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, profil VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_FD80E574A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cm ADD CONSTRAINT FK_3C0A377EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formateurs ADD CONSTRAINT FK_FD80E574A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE apprenant ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C4EB462EA76ED395 ON apprenant (user_id)');
        $this->addSql('ALTER TABLE user DROP type, DROP profil');
    }
}
