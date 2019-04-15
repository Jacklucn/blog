<?php

use yii\db\Migration;

/**
 * Class m190415_100413_drop_cover_image_from_article
 */
class m190415_100413_drop_cover_image_from_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('article', 'cover_image');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190415_100413_drop_cover_image_from_article cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_100413_drop_cover_image_from_article cannot be reverted.\n";

        return false;
    }
    */
}
