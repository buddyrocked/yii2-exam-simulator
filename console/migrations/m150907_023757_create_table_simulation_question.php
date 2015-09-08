<?php

use yii\db\Schema;
use yii\db\Migration;

class m150907_023757_create_table_simulation_question extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('simulation_question', [
            'id'=>Schema::TYPE_PK,
            'simulation_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'question_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'status'=>Schema::TYPE_INTEGER.' NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('fk_simulation_question_simulation_id', 'simulation_question', 'simulation_id', 'simulation', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_simulation_question_question_id', 'simulation_question', 'question_id', 'question', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150907_023757_create_table_simulation_question cannot be reverted.\n";

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
