<?php

use yii\db\Migration;

/**
 * Class m180612_141815_products
 */
class m180612_141815_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'product_id' => $this->primaryKey(),
            'product_name' => $this->string(32)->notNull()->unique(),
            'product_manufacture' => $this->integer()->notNull(),
            'product_date' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180612_141815_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180612_141815_products cannot be reverted.\n";

        return false;
    }
    */
}
