<?php

use yii\db\Schema;
use yii\db\Migration;

class m151008_032600_add_column_is_dummy_to_table_simulation extends Migration
{
    public function up()
    {
        $this->addColumn('simulation', 'is_dummy', 'BOOLEAN NOT NULL');
    }

    public function down()
    {
        echo "m151008_032600_add_column_is_dummy_to_table_simulation cannot be reverted.\n";

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
