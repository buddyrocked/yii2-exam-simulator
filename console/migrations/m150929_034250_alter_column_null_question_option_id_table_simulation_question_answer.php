<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_034250_alter_column_null_question_option_id_table_simulation_question_answer extends Migration
{
    public function up()
    {
        $this->alterColumn('simulation_question_answer', 'question_option_id', 'INTEGER(11) NULL');
    }

    public function down()
    {
        echo "m150929_034250_alter_column_null_question_option_id_table_simulation_question_answer cannot be reverted.\n";

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
