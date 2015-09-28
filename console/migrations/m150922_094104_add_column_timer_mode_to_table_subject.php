<?php

use yii\db\Schema;
use yii\db\Migration;

class m150922_094104_add_column_timer_mode_to_table_subject extends Migration
{
    public function up()
    {
        $this->addColumn('subject', 'timer_mode', 'INTEGER NULL');
    }

    public function down()
    {
        echo "m150922_094104_add_column_timer_mode_to_table_subject cannot be reverted.\n";

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
