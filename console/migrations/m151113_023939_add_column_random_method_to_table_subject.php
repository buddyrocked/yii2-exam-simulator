<?php

use yii\db\Schema;
use yii\db\Migration;

class m151113_023939_add_column_random_method_to_table_subject extends Migration
{
    public function up()
    {
        $this->addColumn('subject', 'random_method', 'INTEGER NULL');
    }

    public function down()
    {
        echo "m151113_023939_add_column_random_method_to_table_subject cannot be reverted.\n";

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
