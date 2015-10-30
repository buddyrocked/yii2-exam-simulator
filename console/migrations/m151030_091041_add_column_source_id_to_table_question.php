<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_091041_add_column_source_id_to_table_question extends Migration
{
    public function up()
    {
        $this->addColumn('question', 'source_id', 'INTEGER NULL');
    }

    public function down()
    {
        echo "m151030_091041_add_column_source_id_to_table_question cannot be reverted.\n";

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
