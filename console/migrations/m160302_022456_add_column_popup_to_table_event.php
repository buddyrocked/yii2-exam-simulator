<?php

use yii\db\Schema;
use yii\db\Migration;

class m160302_022456_add_column_popup_to_table_event extends Migration
{
    public function up()
    {
        $this->addColumn('event', 'popup', 'INTEGER NOT NULL AFTER id');
    }

    public function down()
    {
        echo "m160302_022456_add_column_popup_to_table_event cannot be reverted.\n";

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
