<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_085126_add_column_question_domain_id_to_table_simulation_question extends Migration
{
    public function up()
    {
        $this->addColumn('simulation_question', 'question_domain_id', 'INTEGER NULL');
    }

    public function down()
    {
        echo "m151005_085126_add_column_question_domain_id_to_table_simulation_question cannot be reverted.\n";

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
