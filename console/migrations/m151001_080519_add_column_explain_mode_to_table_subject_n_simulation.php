<?php

use yii\db\Schema;
use yii\db\Migration;

class m151001_080519_add_column_explain_mode_to_table_subject_n_simulation extends Migration
{
    public function up()
    {
        $this->addColumn('subject', 'explain_mode', 'INTEGER NULL');
        $this->addColumn('simulation', 'explain_mode', 'INTEGER NULL');
    }

    public function down()
    {
        echo "m151001_080519_add_column_explain_mode_to_table_subject_n_simulation cannot be reverted.\n";

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
