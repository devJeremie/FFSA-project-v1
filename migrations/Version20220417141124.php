<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417141124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE race_score (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, position INT DEFAULT NULL, INDEX IDX_D4A71640591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE race_score ADD CONSTRAINT FK_D4A71640591CC992 FOREIGN KEY (course_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE user ADD race_score_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64942F1CBB8 FOREIGN KEY (race_score_id) REFERENCES race_score (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64942F1CBB8 ON user (race_score_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64942F1CBB8');
        $this->addSql('DROP TABLE race_score');
        $this->addSql('DROP INDEX IDX_8D93D64942F1CBB8 ON user');
        $this->addSql('ALTER TABLE user DROP race_score_id');
    }
}
