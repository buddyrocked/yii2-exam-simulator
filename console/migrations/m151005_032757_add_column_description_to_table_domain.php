<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_032757_add_column_description_to_table_domain extends Migration
{
    public function up()
    {
        $this->addColumn('domain', 'desc', 'TEXT NULL');
    }

    public function down()
    {
        echo "m151005_032757_add_column_description_to_table_domain cannot be reverted.\n";

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
