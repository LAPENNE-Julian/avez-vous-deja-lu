<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026133830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anecdote_category (anecdote_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_8656A2BD62922701 (anecdote_id), INDEX IDX_8656A2BD12469DE2 (category_id), PRIMARY KEY(anecdote_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anecdote_category ADD CONSTRAINT FK_8656A2BD62922701 FOREIGN KEY (anecdote_id) REFERENCES anecdote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE anecdote_category ADD CONSTRAINT FK_8656A2BD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE anecdote_category');
    }
}
