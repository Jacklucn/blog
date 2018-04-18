<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_category_access`.
 */
class m180417_053548_create_article_category_access_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_category_access', [
            'id' => $this->primaryKey(11)->unsigned(),
            'article_id' => $this->integer(11)->notNull()->defaultValue(0)->comment(' 文章ID'),
            'category_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('分类标签ID'),
            'created_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('创建时间'),
            'updated_at' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article_category_access');
    }
}
