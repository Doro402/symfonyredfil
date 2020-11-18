<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201116152331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apprenant ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C4EB462EA76ED395 ON apprenant (user_id)');
        $this->addSql('ALTER TABLE cm ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cm ADD CONSTRAINT FK_3C0A377EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C0A377EA76ED395 ON cm (user_id)');
        $this->addSql('ALTER TABLE formateurs ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formateurs ADD CONSTRAINT FK_FD80E574A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD80E574A76ED395 ON formateurs (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462EA76ED395');
        $this->addSql('DROP INDEX UNIQ_C4EB462EA76ED395 ON apprenant');
        $this->addSql('ALTER TABLE apprenant DROP user_id');
        $this->addSql('ALTER TABLE cm DROP FOREIGN KEY FK_3C0A377EA76ED395');
        $this->addSql('DROP INDEX UNIQ_3C0A377EA76ED395 ON cm');
        $this->addSql('ALTER TABLE cm DROP user_id');
        $this->addSql('ALTER TABLE formateurs DROP FOREIGN KEY FK_FD80E574A76ED395');
        $this->addSql('DROP INDEX UNIQ_FD80E574A76ED395 ON formateurs');
        $this->addSql('ALTER TABLE formateurs DROP user_id');
    }
}
