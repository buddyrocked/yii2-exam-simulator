<?php

use yii\db\Schema;
use yii\db\Migration;

class m150628_062521_alter_table_marital extends Migration
{
    public function up()
    {
        $this->createTable('marital', [
            'id'=>Schema::TYPE_PK,
            'name'=>Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    public function down()
    {
        echo "m150628_062521_alter_table_marital cannot be reverted.\n";

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
