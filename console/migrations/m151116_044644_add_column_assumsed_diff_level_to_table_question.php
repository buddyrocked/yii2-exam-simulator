<?php

use yii\db\Schema;
use yii\db\Migration;

class m151116_044644_add_column_assumsed_diff_level_to_table_question extends Migration
{
    public function up()
    {
        $this->addColumn('question', 'assumsed_diff_level', 'INTEGER NOT NULL default 3');
    }

    public function down()
    {
        echo "m151116_044644_add_column_assumsed_diff_level_to_table_question cannot be reverted.\n";

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
