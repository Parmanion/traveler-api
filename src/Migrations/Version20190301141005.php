<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190301141005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER SCHEMA `sandbox`  DEFAULT CHARACTER SET utf8mb4  DEFAULT COLLATE utf8mb4_unicode_ci ;');
        $this->write('alter schema to set utf8mb4 as default');

        $this->addSql('create table place
            (
                id varchar(17) not null,
                kind varchar(6) not null,
                name varchar(50) not null,
                description tinytext null,
                datetime_start_utc datetime not null,
                datetime_start_local datetime not null,
                timezone_start varchar(50) default "Europe/Paris" not null,
                datetime_end_utc datetime not null,
                datetime_end_local datetime not null,
                timezone_end varchar(50) default "Europe/Paris" not null,
                created_at timestamp default NOW() not null,
                updated_at timestamp default NOW() on update NOW() not null,
                constraint place_pk
                    primary key (id)
            ) ENGINE INNODB;'
        );

        $this->write('table place created');

        $this->addSql('create table photo
            (
                id varchar(17) not null,
                name varchar(50) not null,
                description tinytext null,
                datetime_utc datetime not null,
                datetime_local datetime not null,
                timezone varchar(50) default "Europe/Paris" not null,
                place varchar(17) not null,
                created_at timestamp default NOW() not null,
                updated_at timestamp default NOW() on update NOW() not null,
                constraint photo_pk
                    primary key (id),
                index (place),
                constraint photo_place_id_fk
                    foreign key (place) references place (id)
                        on delete cascade
            ) ENGINE INNODB;'
        );

        $this->write('table photo created');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
