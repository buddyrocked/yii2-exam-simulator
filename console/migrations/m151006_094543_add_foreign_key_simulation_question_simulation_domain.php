<?php

use yii\db\Schema;
use yii\db\Migration;

class m151006_094543_add_foreign_key_simulation_question_simulation_domain extends Migration
{
    public function up()
    {        
        $this->addColumn('simulation_question', 'simulation_domain_id', 'INTEGER NOT NULL');
        //$this->addForeignKey('fk_simulation_question_simulation_domain_id', 'simulation_question', 'simulation_domain_id', 'simulation_domain', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        echo "m151006_094543_add_foreign_key_simulation_question_simulation_domain cannot be reverted.\n";

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
