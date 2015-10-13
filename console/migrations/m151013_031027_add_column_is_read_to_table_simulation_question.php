<?php

use yii\db\Schema;
use yii\db\Migration;

class m151013_031027_add_column_is_read_to_table_simulation_question extends Migration
{
    public function up()
    {
        $this->addColumn('simulation_question', 'is_read', 'BOOLEAN NOT NULL');
    }

    public function down()
    {
        echo "m151013_031027_add_column_is_read_to_table_simulation_question cannot be reverted.\n";

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
