<?php

use yii\db\Schema;
use yii\db\Migration;

class m151118_064515_add_column_true_false_and_blank_to_table_simulation extends Migration
{
    public function up()
    {
        $this->addColumn('simulation', 'true', 'INTEGER NULL');
        $this->addColumn('simulation', 'false', 'INTEGER NULL');
        $this->addColumn('simulation', 'blank', 'INTEGER NULL');
    }

    public function down()
    {
        echo "m151118_064515_add_column_true_false_and_blank_to_table_simulation cannot be reverted.\n";

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
