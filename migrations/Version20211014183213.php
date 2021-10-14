<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014183213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles_users (articles_id SMALLINT UNSIGNED NOT NULL, users_id INT NOT NULL, INDEX IDX_FC618D1D1EBAF6CC (articles_id), INDEX IDX_FC618D1D67B3B43D (users_id), PRIMARY KEY(articles_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_article (id INT AUTO_INCREMENT NOT NULL, articleId SMALLINT UNSIGNED DEFAULT NULL, userId INT DEFAULT NULL, INDEX fk_authors_1_idx (articleId), INDEX fk_authors_2_idx (userId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_users ADD CONSTRAINT FK_FC618D1D1EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_users ADD CONSTRAINT FK_FC618D1D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_article ADD CONSTRAINT FK_5A37106CFEA2A0EE FOREIGN KEY (articleId) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE user_article ADD CONSTRAINT FK_5A37106C64B64DCC FOREIGN KEY (userId) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE articles_users');
        $this->addSql('DROP TABLE user_article');
    }
}
