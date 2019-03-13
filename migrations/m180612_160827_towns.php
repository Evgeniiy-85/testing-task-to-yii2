<?php

use yii\db\Migration;

/**
 * Class m180612_160827_towns
 */
class m180612_160827_towns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('towns', [
            'town_id' => $this->primaryKey(),
            'town_name' => $this->string(32)->notNull()->unique(),
            'town_region' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180612_160827_towns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180612_160827_towns cannot be reverted.\n";

        return false;
    }
    */
}
