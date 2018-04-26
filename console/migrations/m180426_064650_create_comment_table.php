<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180426_064650_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(11)->unsigned(),
            'nickname' => $this->string('255')->notNull()->defaultValue('')->comment('昵称'),
            'email' => $this->string('255')->notNull()->defaultValue('')->comment('邮箱地址'),
            'url' => $this->string(255)->notNull()->defaultValue('')->comment('网址'),
            'content' => $this->string(255)->notNull()->defaultValue('')->comment('评论内容'),
            'article_id' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('文章ID'),
            'reply_to' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('回复/@某人，某人的ID'),
            'created_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('发布时间'),
            'updated_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('最后修改时间'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment');
    }
}
