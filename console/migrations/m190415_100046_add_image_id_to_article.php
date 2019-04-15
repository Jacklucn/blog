<?php

use yii\db\Migration;

/**
 * Class m190415_100046_add_image_id_to_article
 */
class m190415_100046_add_image_id_to_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'image_id', $this->string(255)->notNull()->defaultValue('')->comment('关联图片ID'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190415_100046_add_image_id_to_article cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_100046_add_image_id_to_article cannot be reverted.\n";

        return false;
    }
    */
}
