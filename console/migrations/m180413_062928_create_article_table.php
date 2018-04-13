<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m180413_062928_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(11)->unsigned(),
            'cover_image' => $this->string('255')->notNull()->defaultValue('')->comment('封面图片'),
            'title' => $this->string('255')->notNull()->defaultValue('')->comment('标题'),
            'summary' => $this->string(255)->notNull()->defaultValue('')->comment('摘要'),
            'content' => $this->text()->notNull()->comment('内容'),
            'category_id' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('分类ID'),
            'read_count' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('阅读数'),
            'sort' => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(99)->comment('排序1-99，小的在前面'),
            'status' => $this->boolean()->notNull()->unsigned()->defaultValue(1)->comment('状态 1正常，0禁用'),
            'created_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('发布时间'),
            'updated_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('最后修改时间'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }
}
