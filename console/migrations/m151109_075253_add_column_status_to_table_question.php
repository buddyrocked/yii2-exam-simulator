<?php

use yii\db\Schema;
use yii\db\Migration;

class m151109_075253_add_column_status_to_table_question extends Migration
{
    public function up()
    {
        $this->addColumn('question', 'status', 'BOOLEAN NOT NULL default 1');
    }

    public function down()
    {
        echo "m151109_075253_add_column_status_to_table_question cannot be reverted.\n";

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
