<?php

use yii\db\Schema;
use yii\db\Migration;

class m150902_043020_create_table_question extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('question', [
            'id'=>Schema::TYPE_PK,
            'subject_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'id_question'=>Schema::TYPE_STRING.' NOT NULL',
            'passage_id'=>Schema::TYPE_INTEGER.' NULL',
            'question'=>Schema::TYPE_TEXT.' NULL',
            'level'=>Schema::TYPE_INTEGER.' NOT NULL',
            'time'=>Schema::TYPE_INTEGER.' NULL',
            'is_random'=>Schema::TYPE_BOOLEAN.' NOT NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME,
        ], $tableOptions);

        $this->addForeignKey('fk_question_subject_id', 'question', 'subject_id', 'subject', 'id', 'CASCADE', 'CASCADE');
        //$this->addForeignKey('fk_question_passage_id', 'question', 'passage_id', 'pasaage', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150902_043020_create_table_question cannot be reverted.\n";

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
