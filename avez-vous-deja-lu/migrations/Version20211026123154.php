<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026123154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anecdote_category (anecdote_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_8656A2BD62922701 (anecdote_id), INDEX IDX_8656A2BD12469DE2 (category_id), PRIMARY KEY(anecdote_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_anecdote (user_id INT NOT NULL, anecdote_id INT NOT NULL, INDEX IDX_4588FAECA76ED395 (user_id), INDEX IDX_4588FAEC62922701 (anecdote_id), PRIMARY KEY(user_id, anecdote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anecdote_category ADD CONSTRAINT FK_8656A2BD62922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE anecdote_category ADD CONSTRAINT FK_8656A2BD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_anecdote ADD CONSTRAINT FK_4588FAECA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_anecdote ADD CONSTRAINT FK_4588FAEC62922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE anecdote ADD writer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE anecdote ADD CONSTRAINT FK_A5051EEC1BC7E6B6 FOREIGN KEY (writer_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A5051EEC1BC7E6B6 ON anecdote (writer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE anecdote_category');
        $this->addSql('DROP TABLE user_anecdote');
        $this->addSql('ALTER TABLE anecdote DROP FOREIGN KEY FK_A5051EEC1BC7E6B6');
        $this->addSql('DROP INDEX IDX_A5051EEC1BC7E6B6 ON anecdote');
        $this->addSql('ALTER TABLE anecdote DROP writer_id');
    }
}
