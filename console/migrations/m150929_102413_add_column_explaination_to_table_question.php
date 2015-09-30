<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_102413_add_column_explaination_to_table_question extends Migration
{
    public function up()
    {
        $this->addColumn('question', 'explaination', 'TEXT NULL');
    }

    public function down()
    {
        echo "m150929_102413_add_column_explaination_to_table_question cannot be reverted.\n";

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
