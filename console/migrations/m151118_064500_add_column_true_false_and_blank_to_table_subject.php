<?php

use yii\db\Schema;
use yii\db\Migration;

class m151118_064500_add_column_true_false_and_blank_to_table_subject extends Migration
{
    public function up()
    {
        $this->addColumn('subject', 'true', 'INTEGER NULL');
        $this->addColumn('subject', 'false', 'INTEGER NULL');
        $this->addColumn('subject', 'blank', 'INTEGER NULL');
    }

    public function down()
    {
        echo "m151118_064500_add_column_true_false_and_blank_to_table_subject cannot be reverted.\n";

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
