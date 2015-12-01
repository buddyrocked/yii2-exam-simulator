<?php

use yii\db\Schema;
use yii\db\Migration;

class m151201_064005_add_column_event_id_to_table_event_registration extends Migration
{
    public function up()
    {
        $this->addColumn('event_registration', 'event_id', 'INTEGER AFTER id');
    }

    public function down()
    {
        echo "m151201_064005_add_column_event_id_to_table_event_registration cannot be reverted.\n";

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
