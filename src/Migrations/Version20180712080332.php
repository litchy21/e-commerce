<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180712080332 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(190) NOT NULL, lastname VARCHAR(190) NOT NULL, username VARCHAR(190) NOT NULL, email VARCHAR(190) NOT NULL, password VARCHAR(190) NOT NULL, verify_token VARCHAR(190) DEFAULT NULL, active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, phone INT NOT NULL, address VARCHAR(190) NOT NULL, city VARCHAR(190) NOT NULL, state VARCHAR(190) NOT NULL, country VARCHAR(190) NOT NULL, postal_code INT NOT NULL, discount INT DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEB8B5B102 FOREIGN KEY (international_shipping_id) REFERENCES international_shippings (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE4C3A3BB FOREIGN KEY (payment_id) REFERENCES payments (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE4887F3F8 FOREIGN KEY (shipping_id) REFERENCES shipping_address (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sub_categories ADD CONSTRAINT FK_1638D5A512469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE variant_options ADD CONSTRAINT FK_BF90D7C13B69A9AF FOREIGN KEY (variant_id) REFERENCES variants (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE6BF700BD');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEB8B5B102');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE4C3A3BB');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE4887F3F8');
        $this->addSql('ALTER TABLE sub_categories DROP FOREIGN KEY FK_1638D5A512469DE2');
        $this->addSql('ALTER TABLE variant_options DROP FOREIGN KEY FK_BF90D7C13B69A9AF');
    }
}
