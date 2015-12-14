<?php

use yii\db\Schema;
use yii\db\Migration;

class m151214_023231_add_column_timer_to_table_simulation_and_table_simulation_question extends Migration
{
    public function up()
    {
        $this->addColumn('simulation', 'timer', 'VARCHAR(255) NULL');
        $this->addColumn('simulation_question', 'timer', 'VARCHAR(255) NULL');
    }

    public function down()
    {
        echo "m151214_023231_add_column_timer_to_table_simulation_and_table_simulation_question cannot be reverted.\n";

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
