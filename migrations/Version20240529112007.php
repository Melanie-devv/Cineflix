<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529112007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dvd ADD producer_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_8325C1DF89B658FE ON dvd (producer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dvd DROP FOREIGN KEY FK_8325C1DF89B658FE');
        $this->addSql('DROP INDEX IDX_8325C1DF89B658FE ON dvd');
        $this->addSql('ALTER TABLE dvd DROP producer_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955797185F6');
    }
}
