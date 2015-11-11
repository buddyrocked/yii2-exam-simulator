<?php

use yii\db\Schema;
use yii\db\Migration;

class m151111_034846_add_column_type_and_file_to_table_question extends Migration
{
    public function up()
    {
        $this->addColumn('question', 'type_file', 'INTEGER NOT NULL default 1');
        $this->addColumn('question', 'file', 'VARCHAR NULL');
    }

    public function down()
    {
        echo "m151111_034846_add_column_type_and_file_to_table_question cannot be reverted.\n";

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
