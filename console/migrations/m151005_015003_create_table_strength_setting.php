<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_015003_create_table_strength_setting extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('strength_setting', [
            'id' => Schema::TYPE_PK,
            'subject_id' => Schema::TYPE_INTEGER.' NULL',
            'name'=> Schema::TYPE_STRING.' NOT NULL',
            'min' => Schema::TYPE_INTEGER.' NOT NULL',
            'max' => Schema::TYPE_INTEGER.' NOT NULL',
            'created' => Schema::TYPE_DATETIME,
            'updated' => Schema::TYPE_DATETIME
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151005_015003_create_table_strength_setting cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
