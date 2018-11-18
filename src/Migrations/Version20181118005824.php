<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181118005824 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ipfs_file_metadata (id INT AUTO_INCREMENT NOT NULL, ipfs_file_id INT DEFAULT NULL, file_size INT NOT NULL, file_name VARCHAR(255) NOT NULL, file_mimetype VARCHAR(255) NOT NULL, file_ext VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_E1390755A77A0E5A (ipfs_file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ipfs_file (id INT AUTO_INCREMENT NOT NULL, source_user_id INT DEFAULT NULL, hash VARCHAR(255) NOT NULL, INDEX IDX_C8D10567EEB16BFD (source_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ipfs_file_metadata ADD CONSTRAINT FK_E1390755A77A0E5A FOREIGN KEY (ipfs_file_id) REFERENCES ipfs_file (id)');
        $this->addSql('ALTER TABLE ipfs_file ADD CONSTRAINT FK_C8D10567EEB16BFD FOREIGN KEY (source_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ipfs_file DROP FOREIGN KEY FK_C8D10567EEB16BFD');
        $this->addSql('ALTER TABLE ipfs_file_metadata DROP FOREIGN KEY FK_E1390755A77A0E5A');
        $this->addSql('DROP TABLE ipfs_file_metadata');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ipfs_file');
    }
}
