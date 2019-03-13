<?php

use yii\db\Migration;

/**
 * Class m180614_094431_products_categories
 */
class m180614_094431_products_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_categories', [
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
        echo "m180614_094431_products_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180614_094431_products_categories cannot be reverted.\n";

        return false;
    }
    */
}
