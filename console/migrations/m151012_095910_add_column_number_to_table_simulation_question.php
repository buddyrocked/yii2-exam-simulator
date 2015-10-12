<?php

use yii\db\Schema;
use yii\db\Migration;

class m151012_095910_add_column_number_to_table_simulation_question extends Migration
{
    public function up()
    {
        $this->addColumn('simulation_question', 'number', 'INTEGER NOT NULL AFTER id');
    }

    public function down()
    {
        echo "m151012_095910_add_column_number_to_table_simulation_question cannot be reverted.\n";

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
