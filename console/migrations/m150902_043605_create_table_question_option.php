<?php

use yii\db\Schema;
use yii\db\Migration;

class m150902_043605_create_table_question_option extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('question_option', [
            'id'=>Schema::TYPE_PK,
            'question_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'option'=>Schema::TYPE_TEXT.' NULL',
            'is_correct'=>Schema::TYPE_BOOLEAN.' NOT NULL',
            'answer'=>Schema::TYPE_TEXT.' NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME,
        ], $tableOptions);

        $this->addForeignKey('fk_option_question_id', 'question_option', 'question_id', 'question', 'id', 'CASCADE', 'CASCADE');
        
    }

    public function down()
    {
        echo "m150902_043605_create_table_question_option cannot be reverted.\n";

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
