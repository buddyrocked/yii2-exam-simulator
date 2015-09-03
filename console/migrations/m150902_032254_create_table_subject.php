<?php

use yii\db\Schema;
use yii\db\Migration;

class m150902_032254_create_table_subject extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('subject', [
            'id'=>Schema::TYPE_PK,
            'id_subject'=>Schema::TYPE_STRING.' NOT NULL',
            'name'=>Schema::TYPE_STRING.' NOT NULL',
            'desc'=>Schema::TYPE_TEXT.' NULL',
            'question_number'=>Schema::TYPE_INTEGER.' NOT NULL',
            'time'=>Schema::TYPE_INTEGER.' NOT NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m150902_032254_create_table_subject cannot be reverted.\n";

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
