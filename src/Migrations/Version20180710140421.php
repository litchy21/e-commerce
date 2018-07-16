<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180710140421 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_details_variant_options (product_details_id INT NOT NULL, variant_options_id INT NOT NULL, INDEX IDX_12D4BAD0287D5809 (product_details_id), INDEX IDX_12D4BAD0C85AF964 (variant_options_id), PRIMARY KEY(product_details_id, variant_options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variant_options (id INT AUTO_INCREMENT NOT NULL, variant_id INT DEFAULT NULL, detail VARCHAR(255) NOT NULL, INDEX IDX_BF90D7C13B69A9AF (variant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variants (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_details_variant_options ADD CONSTRAINT FK_12D4BAD0287D5809 FOREIGN KEY (product_details_id) REFERENCES product_details (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_details_variant_options ADD CONSTRAINT FK_12D4BAD0C85AF964 FOREIGN KEY (variant_options_id) REFERENCES variant_options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE variant_options ADD CONSTRAINT FK_BF90D7C13B69A9AF FOREIGN KEY (variant_id) REFERENCES variants (id)');
        $this->addSql('DROP TABLE products_categories');
        $this->addSql('DROP TABLE products_sub_categories');
        $this->addSql('ALTER TABLE product_details DROP size, DROP color, CHANGE weight product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_details ADD CONSTRAINT FK_A3FF103A4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_A3FF103A4584665A ON product_details (product_id)');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A287D5809');
        $this->addSql('DROP INDEX IDX_B3BA5A5A287D5809 ON products');
        $this->addSql('ALTER TABLE products ADD category_id INT DEFAULT NULL, CHANGE product_details_id sub_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_categories (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5AF7BFE87C ON products (sub_category_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A12469DE2 ON products (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details_variant_options DROP FOREIGN KEY FK_12D4BAD0C85AF964');
        $this->addSql('ALTER TABLE variant_options DROP FOREIGN KEY FK_BF90D7C13B69A9AF');
        $this->addSql('CREATE TABLE products_categories (products_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_E8ACBE766C8A81A9 (products_id), INDEX IDX_E8ACBE76A21214B7 (categories_id), PRIMARY KEY(products_id, categories_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_sub_categories (products_id INT NOT NULL, sub_categories_id INT NOT NULL, INDEX IDX_48D725026C8A81A9 (products_id), INDEX IDX_48D725026DBFD369 (sub_categories_id), PRIMARY KEY(products_id, sub_categories_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_categories ADD CONSTRAINT FK_E8ACBE766C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_categories ADD CONSTRAINT FK_E8ACBE76A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_sub_categories ADD CONSTRAINT FK_48D725026C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_sub_categories ADD CONSTRAINT FK_48D725026DBFD369 FOREIGN KEY (sub_categories_id) REFERENCES sub_categories (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE product_details_variant_options');
        $this->addSql('DROP TABLE variant_options');
        $this->addSql('DROP TABLE variants');
        $this->addSql('ALTER TABLE product_details DROP FOREIGN KEY FK_A3FF103A4584665A');
        $this->addSql('DROP INDEX IDX_A3FF103A4584665A ON product_details');
        $this->addSql('ALTER TABLE product_details ADD size VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD color VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE product_id weight INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AF7BFE87C');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A12469DE2');
        $this->addSql('DROP INDEX IDX_B3BA5A5AF7BFE87C ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A12469DE2 ON products');
        $this->addSql('ALTER TABLE products ADD product_details_id INT DEFAULT NULL, DROP sub_category_id, DROP category_id');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A287D5809 FOREIGN KEY (product_details_id) REFERENCES product_details (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A287D5809 ON products (product_details_id)');
    }
}
