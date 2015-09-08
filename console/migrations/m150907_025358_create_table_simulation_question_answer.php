<?php

use yii\db\Schema;
use yii\db\Migration;

class m150907_025358_create_table_simulation_question_answer extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('simulation_question_answer', [
            'id'=>Schema::TYPE_PK,
            'simulation_question_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'question_option_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'status'=>Schema::TYPE_INTEGER.' NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('fk_simulation_question_answer_simulation_question_id', 'simulation_question_answer', 'simulation_question_id', 'simulation_question', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_simulation_question_question_option_id', 'simulation_question_answer', 'question_option_id', 'question_option', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150907_025358_create_table_simulation_question_answer cannot be reverted.\n";

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
