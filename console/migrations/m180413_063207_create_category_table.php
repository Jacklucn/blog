<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180413_063207_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->defaultValue('')->comment('名字'),
            'created_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('创建时间'),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
