<?php

use yii\db\Schema;
use yii\db\Migration;

class m150917_070501_add_column_correct_to_table_simulation_question extends Migration
{
    public function up()
    {
        $this->addColumn('simulation_question', 'correct', 'BOOLEAN NULL');
    }

    public function down()
    {
        echo "m150917_070501_add_column_correct_to_table_simulation_question cannot be reverted.\n";

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
