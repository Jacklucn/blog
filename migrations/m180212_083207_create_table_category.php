<?php

use yii\db\Migration;

/**
 * Class m180212_083207_create_table_category
 */
class m180212_083207_create_table_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->defaultValue('')->comment('分类名字'),
            'created_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('创建时间'),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180212_083207_create_table_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180212_083207_create_table_category cannot be reverted.\n";

        return false;
    }
    */
}
