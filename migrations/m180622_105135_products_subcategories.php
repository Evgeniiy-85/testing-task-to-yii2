<?php

use yii\db\Migration;

/**
 * Class m180622_105135_products_subcategories
 */
class m180622_105135_products_subcategories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_subcategories', [
            'id' => $this->primaryKey(),
            'pc_product_id' => $this->integer()->unique()->notNull(),
            'pc_category_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180622_105135_products_subcategories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180622_105135_products_subcategories cannot be reverted.\n";

        return false;
    }
    */
}
