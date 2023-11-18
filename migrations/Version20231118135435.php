<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118135435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, level_id INT NOT NULL, name VARCHAR(50) NOT NULL, attack INT NOT NULL, life INT NOT NULL, shield INT NOT NULL, experience INT NOT NULL, INDEX IDX_937AB034A76ED395 (user_id), INDEX IDX_937AB0345FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fight (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, character_id INT NOT NULL, monster_id INT NOT NULL, lvl_monster INT NOT NULL, is_victory TINYINT(1) NOT NULL, exp_win INT NOT NULL, INDEX IDX_21AA4456A76ED395 (user_id), INDEX IDX_21AA44561136BE75 (character_id), INDEX IDX_21AA4456C5FF1223 (monster_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, exp_to_next_lvl INT NOT NULL, base_experience INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, attack INT NOT NULL, life INT NOT NULL, shield INT NOT NULL, lvl_min INT NOT NULL, lvl_max INT NOT NULL, base_exp_reward INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(50) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0345FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE fight ADD CONSTRAINT FK_21AA4456A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fight ADD CONSTRAINT FK_21AA44561136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE fight ADD CONSTRAINT FK_21AA4456C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034A76ED395');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0345FB14BA7');
        $this->addSql('ALTER TABLE fight DROP FOREIGN KEY FK_21AA4456A76ED395');
        $this->addSql('ALTER TABLE fight DROP FOREIGN KEY FK_21AA44561136BE75');
        $this->addSql('ALTER TABLE fight DROP FOREIGN KEY FK_21AA4456C5FF1223');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE fight');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE user');
    }
}
