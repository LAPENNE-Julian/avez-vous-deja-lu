<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026133030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favorite (user_id INT NOT NULL, anecdote_id INT NOT NULL, INDEX IDX_68C58ED9A76ED395 (user_id), INDEX IDX_68C58ED962922701 (anecdote_id), PRIMARY KEY(user_id, anecdote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upVote (user_id INT NOT NULL, anecdote_id INT NOT NULL, INDEX IDX_C8992858A76ED395 (user_id), INDEX IDX_C899285862922701 (anecdote_id), PRIMARY KEY(user_id, anecdote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE downVote (user_id INT NOT NULL, anecdote_id INT NOT NULL, INDEX IDX_A73E4C37A76ED395 (user_id), INDEX IDX_A73E4C3762922701 (anecdote_id), PRIMARY KEY(user_id, anecdote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE known (user_id INT NOT NULL, anecdote_id INT NOT NULL, INDEX IDX_7AC61E02A76ED395 (user_id), INDEX IDX_7AC61E0262922701 (anecdote_id), PRIMARY KEY(user_id, anecdote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unknown (user_id INT NOT NULL, anecdote_id INT NOT NULL, INDEX IDX_AD26A7C7A76ED395 (user_id), INDEX IDX_AD26A7C762922701 (anecdote_id), PRIMARY KEY(user_id, anecdote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED962922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE upVote ADD CONSTRAINT FK_C8992858A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE upVote ADD CONSTRAINT FK_C899285862922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE downVote ADD CONSTRAINT FK_A73E4C37A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE downVote ADD CONSTRAINT FK_A73E4C3762922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE known ADD CONSTRAINT FK_7AC61E02A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE known ADD CONSTRAINT FK_7AC61E0262922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE unknown ADD CONSTRAINT FK_AD26A7C7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE unknown ADD CONSTRAINT FK_AD26A7C762922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE anecdote ADD writer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE anecdote ADD CONSTRAINT FK_A5051EEC1BC7E6B6 FOREIGN KEY (writer_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A5051EEC1BC7E6B6 ON anecdote (writer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP TABLE upVote');
        $this->addSql('DROP TABLE downVote');
        $this->addSql('DROP TABLE known');
        $this->addSql('DROP TABLE unknown');
        $this->addSql('ALTER TABLE anecdote DROP FOREIGN KEY FK_A5051EEC1BC7E6B6');
        $this->addSql('DROP INDEX IDX_A5051EEC1BC7E6B6 ON anecdote');
        $this->addSql('ALTER TABLE anecdote DROP writer_id');
    }
}
