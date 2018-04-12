<?php

use yii\db\Migration;

/**
 * Class m180212_081625_create_table_article
 */
class m180212_081625_create_table_article extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(11)->unsigned(),
            'cover_image' => $this->string('255')->notNull()->defaultValue('')->comment('封面图片'),
            'title' => $this->string('255')->notNull()->defaultValue('')->comment('文章标题'),
            'summary' => $this->string(255)->notNull()->defaultValue('')->comment('文章摘要'),
            'content' => $this->text()->notNull()->comment('文章内容'),
            'category_id' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('文章分类ID'),
            'read_count' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('文章阅读数'),
            'sort' => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(99)->comment('文章排序1-99，小的在前面'),
            'status' => $this->boolean()->notNull()->unsigned()->defaultValue(1)->comment('文章状态 1正常，0禁用'),
            'created_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('文章发布时间'),
            'updated_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('文章发布时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180212_081625_create_table_article cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180212_081625_create_table_article cannot be reverted.\n";

        return false;
    }
    */
}
