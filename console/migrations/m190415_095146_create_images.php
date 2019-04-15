<?php

use yii\db\Migration;

/**
 * Class m190415_095146_create_images
 */
class m190415_095146_create_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB COMMENT="图片表"';
        }
        $this->createTable('images', [
            'id' => $this->primaryKey(11)->unsigned(),
            'url' => $this->string(255)->notNull()->defaultValue('')->comment('图片路径'),
            'module' => $this->string(20)->notNull()->defaultValue('')->comment('模块'),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('数据状态'),
            'created_at' => $this->integer(11)->notNull()->unsigned()->defaultValue(0)->comment('创建时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190415_095146_create_images cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_095146_create_images cannot be reverted.\n";

        return false;
    }
    */
}
