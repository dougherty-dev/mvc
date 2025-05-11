<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250511080031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE community (id INTEGER PRIMARY KEY NOT NULL, status SMALLINT NOT NULL, deck CLOB --(DC2Type:simple_array)
            , discarded CLOB --(DC2Type:simple_array)
            , hand CLOB --(DC2Type:simple_array)
            , pot INTEGER NOT NULL, raises SMALLINT NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE log (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, event VARCHAR(255) NOT NULL, time DATETIME NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE players (id INTEGER PRIMARY KEY NOT NULL, handle SMALLINT NOT NULL, hand CLOB --(DC2Type:simple_array)
            , cash INTEGER NOT NULL, bet INTEGER NOT NULL, latest_action SMALLINT NOT NULL, dealer BOOLEAN NOT NULL, small_blind BOOLEAN NOT NULL, big_blind BOOLEAN NOT NULL)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE community
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE log
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE players
        SQL);
    }
}
