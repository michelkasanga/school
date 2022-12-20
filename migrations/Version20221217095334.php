<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221217095334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `form` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `section` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `statut` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `student` (id INT AUTO_INCREMENT NOT NULL, form_id INT DEFAULT NULL, statut_id INT DEFAULT NULL, section_id INT NOT NULL, option_student_id INT DEFAULT NULL, name VARCHAR(80) NOT NULL, last_name VARCHAR(80) NOT NULL, first_name VARCHAR(80) NOT NULL, register INT NOT NULL, date_of_birth DATE DEFAULT NULL, place_birth VARCHAR(180) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B723AF335FF69B7D (form_id), INDEX IDX_B723AF33F6203804 (statut_id), INDEX IDX_B723AF33D823E37A (section_id), INDEX IDX_B723AF3326FD572A (option_student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `student` ADD CONSTRAINT FK_B723AF335FF69B7D FOREIGN KEY (form_id) REFERENCES `form` (id)');
        $this->addSql('ALTER TABLE `student` ADD CONSTRAINT FK_B723AF33F6203804 FOREIGN KEY (statut_id) REFERENCES `statut` (id)');
        $this->addSql('ALTER TABLE `student` ADD CONSTRAINT FK_B723AF33D823E37A FOREIGN KEY (section_id) REFERENCES `section` (id)');
        $this->addSql('ALTER TABLE `student` ADD CONSTRAINT FK_B723AF3326FD572A FOREIGN KEY (option_student_id) REFERENCES `option` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `student` DROP FOREIGN KEY FK_B723AF335FF69B7D');
        $this->addSql('ALTER TABLE `student` DROP FOREIGN KEY FK_B723AF33F6203804');
        $this->addSql('ALTER TABLE `student` DROP FOREIGN KEY FK_B723AF33D823E37A');
        $this->addSql('ALTER TABLE `student` DROP FOREIGN KEY FK_B723AF3326FD572A');
        $this->addSql('DROP TABLE `form`');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE `section`');
        $this->addSql('DROP TABLE `statut`');
        $this->addSql('DROP TABLE `student`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
