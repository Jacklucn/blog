<?php

use yii\db\Migration;

/**
 * Class m180417_053810_update_article_table
 */
class m180417_053810_update_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        {$this->dropColumn('article', 'category_id');}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180417_053810_update_article_table cannot be reverted.\n";

        return false;
    }
    */
}
