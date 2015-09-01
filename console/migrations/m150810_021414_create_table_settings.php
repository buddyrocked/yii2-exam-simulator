<?php

use yii\db\Schema;
use yii\db\Migration;

class m150810_021414_create_table_settings extends Migration
{
    public function up()
    {
        $this->createTable('settings', [
            'id'=>Schema::TYPE_PK,
            'key'=>Schema::TYPE_STRING.' NOT NULL',
            'value'=>Schema::TYPE_STRING.' NOT NULL',
        ]);

        $this->createIndex('key', 'settings', 'key', true);
    }

    public function down()
    {
        echo "m150810_021414_create_table_settings cannot be reverted.\n";

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
