<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115160959 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE administrator (idA INT AUTO_INCREMENT NOT NULL, firstName TINYTEXT NOT NULL, lastName TINYTEXT NOT NULL, login TINYTEXT NOT NULL, password TINYTEXT NOT NULL, PRIMARY KEY(idA)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (idB INT AUTO_INCREMENT NOT NULL, numberOfPoints INT NOT NULL, PRIMARY KEY(idB)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_degree (earnDate DATE DEFAULT NULL, idB INT NOT NULL, idD INT NOT NULL, INDEX IDX_8E7466EE2104A7A2 (idB), INDEX IDX_8E7466EEC8670297 (idD), PRIMARY KEY(idB, idD)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE degree (idD INT AUTO_INCREMENT NOT NULL, name TINYTEXT NOT NULL, requiredPointsAmount INT NOT NULL, PRIMARY KEY(idD)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ksiazeczka_weryfikowana (id_k INT NOT NULL, id_p INT NOT NULL, data_weryfikacji DATE DEFAULT NULL, PRIMARY KEY(id_k, id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mountain_group (idG INT AUTO_INCREMENT NOT NULL, name TINYTEXT NOT NULL, groupCode TINYTEXT NOT NULL, PRIMARY KEY(idG)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point (idP INT AUTO_INCREMENT NOT NULL, name TINYTEXT NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(idP)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE przodownik_got (id_p INT AUTO_INCREMENT NOT NULL, imie TINYTEXT NOT NULL, nazwisko TINYTEXT NOT NULL, login TINYTEXT NOT NULL, haslo TINYTEXT NOT NULL, id_a INT NOT NULL, PRIMARY KEY(id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE przodownik_grupy (id_p INT NOT NULL, id_g INT NOT NULL, data_pg DATE DEFAULT NULL, PRIMARY KEY(id_p, id_g)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (idS INT AUTO_INCREMENT NOT NULL, pointsGOT INT DEFAULT NULL, sectionLength DOUBLE PRECISION DEFAULT NULL, elevationGain DOUBLE PRECISION DEFAULT NULL, isOutOfBase TINYINT(1) DEFAULT NULL, startPoint INT NOT NULL, endPoint INT NOT NULL, idG INT NOT NULL, INDEX IDX_2D737AEF14F8C1F9 (startPoint), INDEX IDX_2D737AEF583207F (endPoint), INDEX IDX_2D737AEF516E532D (idG), PRIMARY KEY(idS)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_trail (section_no INT NOT NULL, idT INT NOT NULL, idS INT NOT NULL, INDEX IDX_253FE2EBD5D012F3 (idT), INDEX IDX_253FE2EB4BB48750 (idS), PRIMARY KEY(idT, idS)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tourist (idTu INT AUTO_INCREMENT NOT NULL, firstName TINYTEXT NOT NULL, lastName TINYTEXT NOT NULL, login TINYTEXT NOT NULL, password TINYTEXT NOT NULL, idB INT DEFAULT NULL, UNIQUE INDEX UNIQ_9891FEDE2104A7A2 (idB), PRIMARY KEY(idTu)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trail (idT INT AUTO_INCREMENT NOT NULL, sumOfPointsGOT INT NOT NULL, hasSectionsOutOfBase TINYINT(1) NOT NULL, isVerified TINYINT(1) NOT NULL, trailDate DATE DEFAULT NULL, idBook INT NOT NULL, INDEX IDX_B268858FB818FDAF (idBook), PRIMARY KEY(idT)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book_degree ADD CONSTRAINT FK_8E7466EE2104A7A2 FOREIGN KEY (idB) REFERENCES book (idB)');
        $this->addSql('ALTER TABLE book_degree ADD CONSTRAINT FK_8E7466EEC8670297 FOREIGN KEY (idD) REFERENCES degree (idD)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF14F8C1F9 FOREIGN KEY (startPoint) REFERENCES point (idP)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF583207F FOREIGN KEY (endPoint) REFERENCES point (idP)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF516E532D FOREIGN KEY (idG) REFERENCES mountain_group (idG)');
        $this->addSql('ALTER TABLE section_trail ADD CONSTRAINT FK_253FE2EBD5D012F3 FOREIGN KEY (idT) REFERENCES trail (idT)');
        $this->addSql('ALTER TABLE section_trail ADD CONSTRAINT FK_253FE2EB4BB48750 FOREIGN KEY (idS) REFERENCES section (idS)');
        $this->addSql('ALTER TABLE trail ADD CONSTRAINT FK_B268858FB818FDAF FOREIGN KEY (idBook) REFERENCES book (idB)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book_degree DROP FOREIGN KEY FK_8E7466EE2104A7A2');
        $this->addSql('ALTER TABLE trail DROP FOREIGN KEY FK_B268858FB818FDAF');
        $this->addSql('ALTER TABLE book_degree DROP FOREIGN KEY FK_8E7466EEC8670297');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF516E532D');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF14F8C1F9');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF583207F');
        $this->addSql('ALTER TABLE section_trail DROP FOREIGN KEY FK_253FE2EB4BB48750');
        $this->addSql('ALTER TABLE section_trail DROP FOREIGN KEY FK_253FE2EBD5D012F3');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_degree');
        $this->addSql('DROP TABLE degree');
        $this->addSql('DROP TABLE ksiazeczka_weryfikowana');
        $this->addSql('DROP TABLE mountain_group');
        $this->addSql('DROP TABLE point');
        $this->addSql('DROP TABLE przodownik_got');
        $this->addSql('DROP TABLE przodownik_grupy');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE section_trail');
        $this->addSql('DROP TABLE tourist');
        $this->addSql('DROP TABLE trail');
    }
}
