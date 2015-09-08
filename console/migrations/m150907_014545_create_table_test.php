<?php

use yii\db\Schema;
use yii\db\Migration;

class m150907_014545_create_table_test extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('simulation', [
            'id'=>Schema::TYPE_PK,
            'user_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'subject_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'duration'=>Schema::TYPE_INTEGER.' NOT NULL',
            'timer_mode'=>Schema::TYPE_INTEGER.' NOT NULL',
            'start'=>Schema::TYPE_TIME.' NULL',
            'finish'=>Schema::TYPE_TIME.' NULL',
            'status'=>Schema::TYPE_INTEGER.' NOT NULL',
            'score'=>Schema::TYPE_DECIMAL.' NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME,
        ], $tableOptions);

        $this->addForeignKey('fk_simulation_user_id', 'simulation', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_simulation_subject_id', 'simulation', 'subject_id', 'subject', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150907_014545_create_table_test cannot be reverted.\n";

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
