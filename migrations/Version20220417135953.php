<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417135953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, season INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_league (race_id INT NOT NULL, league_id INT NOT NULL, INDEX IDX_54E2DDCB6E59D40D (race_id), INDEX IDX_54E2DDCB58AFC4DE (league_id), PRIMARY KEY(race_id, league_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE race_league ADD CONSTRAINT FK_54E2DDCB6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE race_league ADD CONSTRAINT FK_54E2DDCB58AFC4DE FOREIGN KEY (league_id) REFERENCES league (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE race_league DROP FOREIGN KEY FK_54E2DDCB6E59D40D');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE race_league');
    }
}
