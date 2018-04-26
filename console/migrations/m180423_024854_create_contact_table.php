<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m180423_024854_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(11)->unsigned(),
            'nickname' => $this->string('255')->notNull()->defaultValue('')->comment('昵称'),
            'email' => $this->string('255')->notNull()->defaultValue('')->comment('邮箱地址'),
            'url' => $this->string(255)->notNull()->defaultValue('')->comment('网址'),
            'content' => $this->string(255)->notNull()->defaultValue('')->comment('内容'),
            'created_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('发布时间'),
            'updated_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('最后修改时间'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contact');
    }
}
