<?php

use yii\db\Migration;

/**
 * Class m180612_155038_regions
 */
class m180612_155038_regions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('regions', [
            'region_id' => $this->primaryKey(),
            'region_name' => $this->string(32)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180612_155038_regions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180612_155038_regions cannot be reverted.\n";

        return false;
    }
    */
}
