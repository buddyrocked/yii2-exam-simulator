<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_015109_create_table_domain_strength extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('simulation_domain_strength', [
            'id' => Schema::TYPE_PK,
            'simulation_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'name'=> Schema::TYPE_STRING.' NOT NULL',
            'min' => Schema::TYPE_INTEGER.' NOT NULL',
            'max' => Schema::TYPE_INTEGER.' NOT NULL',
            'created' => Schema::TYPE_DATETIME,
            'updated' => Schema::TYPE_DATETIME
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151005_015109_create_table_domain_strength cannot be reverted.\n";

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
