<?php

use yii\db\Migration;

/**
 * Class m180612_124545_manufacturers
 */
class m180612_124545_manufacturers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('manufacturers', [
            'manufacture_id' => $this->primaryKey(),
            'manufacture_name' => $this->string(32)->notNull()->unique(),
            'manufacture_town' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180612_124545_manufacturers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180612_124545_manufacturers cannot be reverted.\n";

        return false;
    }
    */
}
