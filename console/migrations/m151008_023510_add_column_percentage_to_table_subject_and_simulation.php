<?php

use yii\db\Schema;
use yii\db\Migration;

class m151008_023510_add_column_percentage_to_table_subject_and_simulation extends Migration
{
    public function up()
    {
        $this->addColumn('subject', 'minimum_score', 'INTEGER NOT NULL');
        $this->addColumn('simulation', 'minimum_score', 'INTEGER NOT NULL');
    }

    public function down()
    {
        echo "m151008_023510_add_column_percentage_to_table_subject_and_simulation cannot be reverted.\n";

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
