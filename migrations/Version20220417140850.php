<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417140850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD ligue_id INT DEFAULT NULL, ADD club_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL, ADD name VARCHAR(255) DEFAULT NULL, ADD lastname VARCHAR(255) DEFAULT NULL, ADD phone INT DEFAULT NULL, ADD age INT DEFAULT NULL, ADD media VARCHAR(255) DEFAULT NULL, ADD alt VARCHAR(255) DEFAULT NULL, ADD num_license INT DEFAULT NULL, ADD num_transpondeur INT DEFAULT NULL, ADD points INT DEFAULT NULL, ADD titre VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494D7328E5 FOREIGN KEY (ligue_id) REFERENCES league (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64961190A32 FOREIGN KEY (club_id) REFERENCES clubs (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BCF5E72D FOREIGN KEY (categorie_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494D7328E5 ON user (ligue_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64961190A32 ON user (club_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649BCF5E72D ON user (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494D7328E5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64961190A32');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BCF5E72D');
        $this->addSql('DROP INDEX IDX_8D93D6494D7328E5 ON user');
        $this->addSql('DROP INDEX IDX_8D93D64961190A32 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649BCF5E72D ON user');
        $this->addSql('ALTER TABLE user DROP ligue_id, DROP club_id, DROP categorie_id, DROP name, DROP lastname, DROP phone, DROP age, DROP media, DROP alt, DROP num_license, DROP num_transpondeur, DROP points, DROP titre');
    }
}
