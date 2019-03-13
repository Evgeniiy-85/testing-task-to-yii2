<?php

use yii\db\Migration;

/**
 * Class m180613_114622_categories
 */
class m180613_114622_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'category_id' => $this->primaryKey(),
            'category_name' => $this->string(32)->notNull(),
            'category_parent' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180613_114622_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180613_114622_categories cannot be reverted.\n";

        return false;
    }
    */
}
