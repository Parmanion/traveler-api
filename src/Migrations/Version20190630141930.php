<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190630141930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Place (id VARCHAR(17) NOT NULL, parent_id VARCHAR(17) DEFAULT NULL, level INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, datetimeStartUtc DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', datetimeStartLocal DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', timezoneStart VARCHAR(50) DEFAULT \'Europe/Paris\' NOT NULL, datetimeEndUtc DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', datetimeEndLocal DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', timezoneEnd VARCHAR(50) DEFAULT \'Europe/Paris\' NOT NULL, createdAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', updatedAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', INDEX IDX_B5DC7CC9727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PlaceClosure (id INT AUTO_INCREMENT NOT NULL, ancestor VARCHAR(17) NOT NULL, descendant VARCHAR(17) NOT NULL, depth INT NOT NULL, INDEX IDX_C4768F5FB4465BB (ancestor), INDEX IDX_C4768F5F9A8FAD16 (descendant), INDEX IDX_4161FDCB3DA80586 (depth), UNIQUE INDEX IDX_B1705A3C209A5FF5 (ancestor, descendant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ext_translations (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(8) NOT NULL, object_class VARCHAR(255) NOT NULL, field VARCHAR(32) NOT NULL, foreign_key VARCHAR(64) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX translations_lookup_idx (locale, object_class, foreign_key), UNIQUE INDEX lookup_unique_idx (locale, object_class, field, foreign_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB ROW_FORMAT = DYNAMIC');
        $this->addSql('CREATE TABLE ext_log_entries (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(8) NOT NULL, logged_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', object_id VARCHAR(64) DEFAULT NULL, object_class VARCHAR(255) NOT NULL, version INT NOT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', username VARCHAR(255) DEFAULT NULL, INDEX log_class_lookup_idx (object_class), INDEX log_date_lookup_idx (logged_at), INDEX log_user_lookup_idx (username), INDEX log_version_lookup_idx (object_id, object_class, version), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB ROW_FORMAT = DYNAMIC');
        $this->addSql('CREATE TABLE photo (id VARCHAR(17) NOT NULL, place VARCHAR(17) DEFAULT NULL, name VARCHAR(50) NOT NULL, description TINYTEXT DEFAULT NULL, datetime_utc DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', datetime_local DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', timezone VARCHAR(50) DEFAULT \'Europe/Paris\' NOT NULL, createdAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', updatedAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime)\', INDEX place (place), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Place ADD CONSTRAINT FK_B5DC7CC9727ACA70 FOREIGN KEY (parent_id) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE PlaceClosure ADD CONSTRAINT FK_C4768F5FB4465BB FOREIGN KEY (ancestor) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE PlaceClosure ADD CONSTRAINT FK_C4768F5F9A8FAD16 FOREIGN KEY (descendant) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418741D53CD FOREIGN KEY (place) REFERENCES Place (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Place DROP FOREIGN KEY FK_B5DC7CC9727ACA70');
        $this->addSql('ALTER TABLE PlaceClosure DROP FOREIGN KEY FK_C4768F5FB4465BB');
        $this->addSql('ALTER TABLE PlaceClosure DROP FOREIGN KEY FK_C4768F5F9A8FAD16');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418741D53CD');
        $this->addSql('DROP TABLE Place');
        $this->addSql('DROP TABLE PlaceClosure');
        $this->addSql('DROP TABLE ext_translations');
        $this->addSql('DROP TABLE ext_log_entries');
        $this->addSql('DROP TABLE photo');
    }
}
